<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Bpuig\Subby\Models\Plan;
use App\Models\User;
use Bpuig\Subby\Models\PlanSubscription;
use Groupedesign\TapPayment\Facade\TapPayment;

class PlanSubscriptionController extends Controller
{
    public function removeSubscription($subscription_id){

        // add end date to current subscribe
        $subscription = PlanSubscription::find($subscription_id);
        if( !empty($subscription) ):
            $subscription->ends_at = date('Y-m-d H:i:s');
            $subscription->cancel(true);
            if( !empty($subscription->canceled_at) ):
                return redirect()->back()->withSuccess('تم الغاء الاشتراك بنجاح');
            else:
                return redirect()->back()->withErrors('لم يتم الغاء الاشتراك برجاء المحاولة مرة اخري');
            endif;
        else:
            // redirect back with errors
            return redirect()->back()->withErrors('لا توجد اشتراكات حالية');
        endif;


    }

    public function renewSubscription($subscription_id){
        // get active subscriptions
        $user_subs = PlanSubscriptionController::getActiveUserSubs();
        $userId = Auth::id();
        $user = User::find($userId);
        if( !empty($user_subs) ):
            if( (int) $subscription_id === (int) $user_subs[0]->id ):
                // renew sub
                $tag = $user_subs[0]->tag;
                $renew_sub = $user->subscription($tag)->renew();
                return redirect()->back()->withSuccess('تم تجديد الاشتراك بنجاح');
            else:
                // return with error
                return redirect()->back()->withErrors('لا توجد اشتراكات مفعلة حاليا');
            endif;
        else:
            // return with error
            return redirect()->back()->withErrors('لا توجد اشتراكات مفعلة حاليا');
        endif;

    }
    
    public function checkOut($plan_id){
        if( empty($plan_id) )
            return redirect()->back()->withErrors('يرجي اختيار خطة للمتابعة');

        // get user data from $user_id
        $userId = Auth::id();
        $user = User::find($userId);

        // get plan data
        $plan = Plan::find($plan_id);
        $plan_tag = $plan->tag . '-' . date('Y-m-d-H-i-s');
        $plan_name = $plan->name;

        $user_subs = $user->subscriptions;

        // check if
        foreach ($user_subs as $user_sub):
            if( $user_sub->isActive() === true ):
                return redirect()->back()->withErrors('أنت بالفعل مشترك في خطة مسبقا يمكنك الغاء الاشتراك والمحاولة مرة أخري');
            endif;
        endforeach;

        return view('checkout', compact('plan'));

    }

    public function addSubscription(Request $request){


        $plan_id = $request->input('charge-plan-id');
        $customer_name = $request->input('charge-customer-name');
        $customer_phone = $request->input('charge_phone_num');
        $customer_country_code = $request->input('charge_country_code');
        $charge_desc = $request->input('charge-description');
        $charge_amount = $request->input('charge-amount');
        $charge_email = $request->input('charge-email');
        $charge_country = $request->input('charge-country');
        $charge_city = $request->input('charge-city');

        // create order and set status "pending"


        // payment process
        try {
            // data should be collected from a checkout form
            $invoice_data = [
                'customer_name' => $customer_name,
                'customer_phone' => $customer_phone,
                'customer_country_code' => $customer_country_code,
                'charge_description' => $charge_desc,
                'charge_amount' => $charge_amount,
                'metadata' => [
                    'plan_id' => $plan_id
                ]
            ];

            $invoices = PlanSubscriptionController::payment_process($invoice_data);

        } catch(Error $e) {
            $error_text = "error on line: " . $e->getLine() . "in file " . $e->getFile();
            return redirect()->back()->withErrors($error_text);
        }

    }

    public static function getActiveUserSubs($user_id = null){
        $activeSubs = [];
        // get user data from $user_id
        $userId = empty($user_id) ? Auth::id() : $user_id;
        $user = User::find($userId);
        $user_subs = $user->subscriptions;
        foreach ( $user_subs as $user_sub ):
            if( $user_sub->isActive() ):
                $activeSubs[] = $user_sub;
            endif;
        endforeach;
        return $activeSubs;
    }

    public static function getEndedUserSubs($user_id = null){
        $endedSubs = [];
        // get user data from $user_id
        $userId = empty($user_id) ? Auth::id() : $user_id;
        $user = User::find($userId);
        $user_subs = $user->subscriptions;
        foreach ( $user_subs as $user_sub ):
            if( $user_sub->hasEnded() ):
                $endedSubs[] = $user_sub;
            endif;
        endforeach;
        return $endedSubs;
    }

    public function checkSubscriptionExpire(){

        // get active subscriptions
        $user_subs = PlanSubscriptionController::getActiveUserSubs();

        if( !empty($user_subs) ):
            // check if subscription ends after 1 hour or less send notification
            $ends_at = $user_subs[0]->ends_at;
            if( strtotime($ends_at) - strtotime(date('Y-m-d H:i:s')) <= 3600 ):
                return response()->json(['expire_soon' => true]);
            else:
                return response()->json(['expire_soon' => false]);
            endif;
        else:
            return response()->json(['expire_soon' => false]);
        endif;

    }

    public static function payment_process($invoice_data = []){
        if( empty($invoice_data) )
            return redirect()->back()->withErrors('حدث خطأ اثناء عملية الدفع يرجي المحاولة مرة أخري');

        try{

            $payment = TapPayment::createCharge();

            $payment->setCustomerName( $invoice_data['customer_name'] );

            $payment->setCustomerPhone( $invoice_data['customer_country_code'], $invoice_data['customer_phone'] );

            $payment->setDescription( $invoice_data['charge_description'] );

            $payment->setAmount( $invoice_data['charge_amount'] );

            $payment->setCurrency( "SAR" );

            $payment->setSource( "src_all" );

            $payment->setRedirectUrl( "https://urlink.abdallahoraby.com/payment-verify");

            //$payment->setPostUrl( "https://urlink.abdallahoraby.com" ); // if you are using post request to handle payment updates

            $invoice = $payment->pay();

            if( !empty($invoice) ):
                $pay_redirect = $invoice->getPaymetUrl();
                header("Location: $pay_redirect");
                die();
            else:
                return false;
            endif;

        } catch( \Exception $exception ){
            // your handling of request failure
            return false;
        }
    }

    public static function verifyPayment(){
        $charge_id = $_GET['tap_id'];
        if( !empty($charge_id) ):
            $charge_data = TapPayment::findCharge($charge_id);
            if( !empty($charge_data) ):
                if($charge_data->isSuccess() === true):
                    // set order status to 'completed'

                    // get plan id from order data
                    $plan_id = 14;

                    // subscribe user to new plan

                    // create user subscription
                    // get user data from $user_id
                    $userId = Auth::id();
                    $user = User::find($userId);

                    // get plan data
                    $plan = Plan::find($plan_id);
                    $plan_tag = $plan->tag . '-' . date('Y-m-d-H-i-s');
                    $plan_name = $plan->name;
                    $user->newSubscription($plan_tag, $plan, $plan_name, "user $userId has been subscribed to plan $plan_name");
                    return redirect('/user/profile/pages')->withSuccess('تم الاشتراك بنجاح');
                else:
                    return redirect()->back()->withErrors('حدث خطأ اثناء عملية الدفع يرجي المحاولة مرة أخري');
                endif;
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }

   

}
