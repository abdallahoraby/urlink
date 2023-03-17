<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Bpuig\Subby\Models\Plan;
use App\Models\User;
use Bpuig\Subby\Models\PlanSubscription;


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
                return redirect()->back()->withSuccess('لم يتم الغاء الاشتراك برجاء المحاولة مرة اخري');
            endif;
        else:
            // redirect back with errors
            return redirect()->back()->withErrors('لا توجد اشتراكات حالية');
        endif;


    }


    public function addSubscription($plan_id){

        if( empty($plan_id) )
            return redirect()->back();
        // get user data from $user_id
        $userId = Auth::id();
        $user = User::find($userId);

        // get plan data
        $plan = Plan::find($plan_id);
        $plan_tag = $plan->tag . '-' . date('Y-m-d H:i:s');
        $plan_name = $plan->name;

        $user_subs = $user->subscriptions;

        // check if
        foreach ($user_subs as $user_sub):
            if( $user_sub->isActive() === true ):
                return redirect()->back()->withErrors('أنت بالفعل مشترك في خطة مسبقا يمكنك الغاء الاشتراك والمحاولة مرة أخري');
            endif;
        endforeach;


        try {
            // create user subscription
            $user->newSubscription($plan_tag, $plan, $plan_name, "user $userId has been subscribed to plan $plan_name");
            return redirect('/user/profile/pages')->withSuccess('تم الاشتراك بنجاح');
        } catch(Error $e) {
            $error_text = "error on line: " . $e->getLine() . "in file " . $e->getFile();
            return redirect()->back()->withErrors($error_text);
        }

    }


    public static function getActiveUserSubs(){
        $activeSubs = [];
        // get user data from $user_id
        $userId = Auth::id();
        $user = User::find($userId);
        $user_subs = $user->subscriptions;
        foreach ( $user_subs as $user_sub ):
            if( $user_sub->isActive() ):
                $activeSubs[] = $user_sub;
            endif;
        endforeach;
        return $activeSubs;
    }

    public static function getEndedUserSubs(){
        $endedSubs = [];
        // get user data from $user_id
        $userId = Auth::id();
        $user = User::find($userId);
        $user_subs = $user->subscriptions;
        foreach ( $user_subs as $user_sub ):
            if( $user_sub->hasEnded() ):
                $endedSubs[] = $user_sub;
            endif;
        endforeach;
        return $endedSubs;
    }



}
