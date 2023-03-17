<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Validator\ValidateController;
use App\Http\Controllers\Users\MainController;

use App\Models\User;
use App\Models\Page;
use App\Models\LandingPage;
use Shetabit\Visitor\Traits\Visitable;
use DB;

class UsersController extends Controller
{
    use Visitable;
    public function GET_page($page_name = null){
        if($page_name != null){
            $data = LandingPageController::getLandingPagesByURL($page_name);
            if($data !== null){
                if(Auth::id() == null){
                    visitor()->visit($data);
                }

                /* $model = LandingPage::where('landing_page_id', $page_id)->first();
                //dd($model);
                dd($model->visitLogs()->visitor()->count()); */

                return view('styles.'. $data['style_name'], compact('data'));
            }
        }

//        $homeData = SettingController::getAllPageParts('home');
        // get home page content
        $homePage = Page::select('content')->where('slug', '=' , '')->get();
        $homeContent = json_decode($homePage[0]->content, JSON_UNESCAPED_UNICODE);
        return view('index', compact('homeContent'));
    }

    function GET_register(){
        return view('register');
    }

    function POST_register(Request $request){
        $validate = ValidateController::validateRegister($request);

        if ( !empty($validate) ) {
            return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
        } else {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            UserController::createUser($name, $email, $password);
            return view('login');
        }
    }

    function GET_login(){
        return view('login');
    }

    function POST_login(Request $request){
        $validate = ValidateController::validateLogin($request);
        if (!empty($validate)) {
            return redirect('login')
                        ->withErrors($validate)
                        ->withInput();
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $login = UserController::login($email, $password);
        if($login == true){
            return self::checkUserHasSub();
        }else{
            return view('404');
        }
    }

    public function GET_forget_password(){
        return view('forget-pass');
    }


    public function GET_profile(){
        $userId = Auth::id();
        $dataOfUser = UserController::getUserDataById($userId);
        return view('profile_1_info', compact('dataOfUser'));
    }

    public function GET_password(){
        $userId = Auth::id();
        $dataOfUser = UserController::getUserDataById($userId);
        return view('profile_2_password');
    }

    public function UPDATE_password(){
        dd('tt');
        $userId = Auth::id();
        $validate = ValidateController::validateUpdatePassword($request);
        if(!empty($validate)){
            return redirect()->back()->withErrors($validate)
            ->withInput();
        }
        $dataOfUser = UserController::getUserDataById($userId);
        return view('profile_2_password');
    }

    public function GET_pages(){

        $userId = Auth::id();

        $data = LandingPageController::getLandingPagesById($userId);
        $userData = UserController::getUserDataById($userId);
        //$data['user'] = $userData;
        return view('profile_3_my_pages', compact(['data', 'userData']));
    }

    public function UPDATE_profile(Request $request){
        $validate = ValidateController::validateUpdateProfile($request);
        if(!empty($validate)){
            return redirect()->back()->withErrors($validate)
            ->withInput();
        }
        $updateAuthData = UserController::updateAuthData($request);
        $userId = Auth::id();
        $dataOfUser = UserController::getUserDataById($userId);
        return redirect()->back()->withInput();
    }


    public function GET_CREATE_landing_page(){
        return view('create_your_page');
    }

/*     public function CREATE_landing_page_Account_Type($account_type){
        $validate = ValidateController::validateCreateLandingPageAsWebAccountType($account_type);
        if(!empty($validate)){
            return redirect()->back()->withErrors($validate);
        }
        $req = array(
            'account_type' => $account_type
        );
        session()->put('request', $req);
        return redirect()->route('get_create_landing_page_2');
    }

    public function GET_CREATE_landing_page_2(){
        $request = session()->get('request');
        if($request['account_type'] == "individual")
            return view('create_page_step_2_personal');
        else
            return view('create_page_step_2_copmany');
    }

    public function POST_CREATE_landing_page_2(Request $request){
        $req = session()->get('request');
        $request['account_type'] = $req['account_type'];
        $validate = ValidateController::validateCreateLandingPageAsWeb2($request);
        if(!empty($validate)){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $req['page_name'] = $request['page_name'];
        $req['page_title'] = $request['page_title'];
        $req['country'] = $request['country'];
        $req['city'] = $request['city'];
        $req['page_contact_email'] = $request['page_contact_email'];
        $req['page_contact_phone'] = $request['page_contact_phone'];

        session()->put('request', $req);


        return redirect()->route('get_create_landing_page_3');
    }

    public function GET_CREATE_landing_page_3(){
        return view('create_page_step_3');
    }

    public function POST_CREATE_landing_page_3(Request $request){
        $validate = ValidateController::validateCreateLandingPageAsWeb3($request);
        if(!empty($validate)){
            return redirect()->back()->withErrors($validate)->withInput();
        }



        if($request->has('links')){
            $links = $request->input('links');
            $req = session()->get('request');
            $req['links'] = $links;
            session()->put('request', $req);

        }

        return redirect()->route('get_create_landing_page_4');

    }

    public function GET_CREATE_landing_page_4(){
        return view('create_page_step_4');
    }

    public function POST_CREATE_landing_page_4(Request $request){

        $i = 0;
        foreach($request->input('sections') as $section){

            if($section['section_type'] == 'image'){
                if($section['section_title'] != null){
                    if($request->file('sections', $i, 'section_image')){
                        dd('ggg');
                    }

                    if( !empty($section['section_image'])){
                        echo "tttt";
                    }else{
                        echo "hhhhh";
                    }

                }
                dd($request['section_image']);
            }
        }
        $validate = ValidateController::validateCreateLandingPageAsWeb4($request);

        if(!empty($validate)){


            print_r($validate);
            dd();
            return redirect()->back()->withErrors($validate)->withInput();
        }

    } */


    public function POST_CREATE_landing_page(Request $request){
        $validate = ValidateController::validateCreateLandingPageWeb($request);
        if(!empty($validate)){
            return redirect()->back()->withErrors($validate)
            ->withInput();
        }
        $createLandingPage = LandingPageController::createLandingPage($request);

        $data = LandingPageController::getLandingPagesByURL($createLandingPage);

        return view('styles.landing_page_1', compact('data'));

    }

    public function DELETE_landing_page($id){
        $userId = Auth::id();
        $validate = ValidateController::validateDeleteLandingPage($id, $userId);
        if(!empty($validate)){
            dd(false);
            return redirect()->back()->withErrors($validate)
            ->withInput();
        }
        dd(true);
    }

    public function GET_logout(){
        Auth::logout();
        Session::flush();
        session::regenerate();

        return redirect('/');
    }

    public function UPDATE_get_landing_page($page_id){
        $data = LandingPageController::getLandingPagesById(Auth::id(), $page_id);
        if($data != null){
            foreach($data->sections as $item){

                $data[$item->section_type] = $item;
                if($item->section_type == 'slider')
                    $data['slider_images'] = $item->images;


            }
            $styles = UserController::getAvailableStyles(Auth::id());
            if($styles != null){
                $data['styles'] = $styles;
            }
            //dd($data);
            return view('update_your_page',compact(['data', 'page_id']));
        }
    }

    public function UPDATE_get_style($page_id){
        $styles = UserController::getAvailableStyles(Auth::id());
        if($styles != null){
            return view('update_your_page_style',compact(['styles', 'page_id']));
        }
    }

    public function UPDATE_put_style($page_id, $style_id){
        $userId = Auth::id();
        $updateStyle = LandingPageController::updateStyle($userId, $page_id, $style_id);
        return redirect()->route('get_pages');
    }

    public function GET_statistics($page_id){
        $data = LandingPageController::getPageStatistics($page_id);
        $model = LandingPage::where('landing_page_id', $page_id)->first();
        //dd($model);
        $allVisitors = $model->visitLogs()->count();

        //$ldate = date('Y-m-d');
        $test = DB::table('visits')->where('created_at', '>=', date('Y-m-d').' 00:00:00' )->count();
        //TODO
        dd($test);
        /* $test = $allVisitors->where('visitable_id',1 );
        dd($test); */
        return view('profile_4_page_statistics', compact('data'));
        dd($page_id);
    }

    public function UPDATE_put_landing_page(Request $request, $page_id){
        $userId = Auth::id();
        $validate = ValidateController::validateUpdateLandingPageWeb($request);
        if(!empty($validate)){
            return redirect()->back()->withErrors($validate)
            ->withInput();
        }

        $updateLandingPage = LandingPageController::updateLandingPage($request, $page_id);

        $style_id = $request->input('design');
        $updateStyle = LandingPageController::updateStyle($userId, $page_id, $style_id);

        $data = LandingPageController::getLandingPagesById($userId);
        $userData = UserController::getUserDataById($userId);
        //$data['user'] = $userData;
        return view('profile_3_my_pages', compact(['data', 'userData']));
       /*
        return view('home');
        return view('styles.landing_page_1', compact('data')); */

    }

    public function checkUserHasSub(){
        // after register check user has subscription before
        $userId = Auth::id();
        $user = \App\Models\User::find($userId);
        // Get user active subscriptions
        $subscription = $user->subscriptions;

        if( count($subscription) > 0 && $user->isAdmin !== 1 ):
            // check if subscription not expired
            foreach ( $subscription as $sub ):
                $subs_status[] = $sub->isActive();
            endforeach;

            if( in_array(true, $subs_status) ):
                // redirect to index
                $home = url('/');
                return Redirect::to($home);
            else:
                // redirect to plans
                return MainController::getPlans();
            endif;
        elseif( $user->isAdmin === 1 ):
            return redirect('/admin/profile');
        else:
            // redirect to plans
            return MainController::getPlans();
        endif;

    }

    public static function checkUserHasActiveSub(){
        // after register check user has subscription before
        $userId = Auth::id();
        $user = \App\Models\User::find($userId);
        // Get user active subscriptions
        $subscription = $user->subscriptions;

        if( count($subscription) > 0 && $user->isAdmin !== 1 ):
            // check if subscription not expired
            $sub_tag = $subscription[0]->tag;
            $is_active = $user->subscription($sub_tag)->isActive();
            if( $is_active ):
                return $subscription;
            else:
                return false;
            endif;
        elseif( $user->isAdmin === 1 ):
            return false;
        else:
            return false;
        endif;

    }


}
