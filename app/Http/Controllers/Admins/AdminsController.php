<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingStyleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Validator\ValidateController;
use App\Models\Page;
use Auth;
use DB;
use Bpuig\Subby\Models\Plan;
use App\Models\User;
use Bpuig\Subby\Models\PlanSubscription;


class AdminsController extends Controller
{
    public function GET_profile(){
        $userId = Auth::id();
        $dataOfUser = UserController::getUserDataById($userId);
        return view('admin.admin_profile', compact('dataOfUser'));
    }

    public function getUsers(){
        $users =  UserController::getAllUsers();
        $admins =  UserController::getAllAdmin();
        return view('admin.users.get-users', compact('users', 'admins'));
    }

    public function updateActivity($userId, $active){
        if($active == 0 || $active == 1){
            $users =  UserController::updateActivity($userId, $active);
        }
        return redirect()->back();
    }

    public function updateRule($userId, $rule){
        if($rule == 0 || $rule == 1){
            $users =  UserController::updateRule($userId, $rule);
        }
        return redirect()->back();
    }

    public function createNewUser(Request $request){
        $validate = ValidateController::validateRegister($request);
        if (!empty($validate)) {
            return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $rule = $request->input('rule');
        UserController::createUser($name, $email, $password, $rule);
        return redirect()->back();
    }

    public function getCreateStyle(){
        return view('admin.styles.new-style');
    }

    public function postCreateStyle(Request $request){
        $validate = ValidateController::validateCreateStyle($request);
        if (!empty($validate)) {
            return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
        }

        $extension = $request->file('file')->getClientOriginalExtension();
        $ex = array("html", "php", "txt");
        if (!in_array($extension, $ex)) {
            return redirect()->back()
                        ->withErrors('Error')
                        ->withInput();
        }

        $myfile  = $request->file('file');
        $styleName = $request->input('name');
        $fileName = $myfile->getClientOriginalName();
        $path = public_path() . "../../resources/views/styles/";
        if (file_exists($path . $styleName . '.blade.php') || file_exists($path . $fileName) ) {
            dd('This design already exists.');
        }

        $fileContent = file_get_contents($myfile);
        $arr = array(
            'localhost' => 'localhost',
            'connection'=> env('DB_CONNECTION'),
            'host' => env('DB_HOST'),
            'db' => DB::connection()->getDatabaseName()
        );

        foreach($arr as $key => $val){
            $pattern = preg_quote($val, '/');
            $pattern = "/^.*$pattern.*\$/m";
            if(preg_match_all($pattern, $fileContent, $matches)){
                // TODO Deactivate user
                dd('Error');
            }
        }

        file_put_contents($path . $styleName . ".blade.php" , $fileContent);
        $style_fee = $request->input('fee');
        $status = $request->input('status');
        LandingStyleController::createNewStyle($styleName, $style_fee, $status);
        return redirect()->route('get_styles');
    }

    public function getStyles(){
        $styles = LandingStyleController::getAllStyles();
        return view('admin.styles.get-styles', compact('styles'));
    }

    public function getStyle($style_id){
        $style = LandingStyleController::getStyle($style_id);
        return view('admin.styles.edit-style', compact('style'));
    }

    public function updateStyle(Request $request){
        $validate = ValidateController::validateUpdateStyle($request);
        if (!empty($validate)) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }


        $style_id = $request->input('id');
        $styleName = $request->input('name');
        $style_image  = $request->file('image');
        $style_fee = $request->input('fee');
        $status = $request->input('status');

        // handle image upload
        if( !empty($style_image) ):
            $style_image_name = LandingStyleController::uploadStyleImage($style_image);
        endif;

        $style_image_name = !empty($style_image_name) ? $style_image_name : '';

        $update_style = LandingStyleController::updateStyleData($style_id,$styleName, $style_fee, $status, $style_image_name);

        if( $update_style ):
            return redirect()->route('get_styles')->withSuccess('تم تعديل الستايل بنجاح');
        else:
            return redirect()->back()->withErrors('حدث خطأ اثناء تعديل البيانات');
        endif;


    }

    public function GET_Setting(){
        $setting = SettingController::getAllSetting();
        return view('admin.settings.admin_setting', compact('setting'));
    }

    public function editPages(){
        $pages = Page::select('id', 'title', 'content', 'type', 'slug')->get();
        return view('admin.settings.pages.edit-pages', ['pages' => $pages]);
    }

    public function editSinglePage($pageId){
        $page = Page::select('id', 'title', 'content', 'type', 'slug')->where('id', '=', $pageId)->get();
        return view('admin.settings.pages.edit-single-page', ['page' => $page[0]]);
    }

    public function updateSinglePage(Request $request){
        // validate request
        $validate = ValidateController::validateEditPage($request);

        if (!empty($validate)) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        // handle save data
        $page_id = $request->input('page_id');
        $page_title = $request->input('page_title');

        // handle images
        if( !empty($request->file()) ){
            if( !empty($request->file()['section_1']['image']) ){
                $section_1_image = $request->file()['section_1']['image'];
                $section_1_image_name = PageController::uploadPageImages($section_1_image);
            }
        }




        $section_1 = [
            'title' => $request->input('section_1.title'),
            'description' => $request->input('section_1.description'),
            'button_1_text' => $request->input('section_1.button_1_text'),
            'button_1_link' => $request->input('section_1.button_1_link'),
            'button_2_text' => $request->input('section_1.button_2_text'),
            'button_2_link' => $request->input('section_1.button_2_link'),
            'image' => !empty($section_1_image_name) ? $section_1_image_name : ''
        ];

        $page_content = [
            'section_1' => $section_1
        ];


        $page_data = [
            'page_title' => $page_title,
            'page_content' => json_encode($page_content, JSON_UNESCAPED_UNICODE)
        ];



        $page_update = PageController::updatePage($page_id, $page_data);
        if( $page_update ):
            return redirect()->back()->withSuccess('success');
        else:
            return redirect()->back()->withErrors('update_page_error');
        endif;
    }

    public function GET_EDIT_Setting($settingId){
        $setting = SettingController::getSettingById($settingId);

        return view('admin.settings.edit_setting', compact('setting'));
    }

    public function POST_EDIT_Setting(Request $request){
        $validate = ValidateController::validateEditSetting($request);
        if (!empty($validate)) {
            return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
        }
        $type = $request->input('type');
        $settingId = $request->input('setting_id');
        if($type == 'text'){
            $content = $request->input('content');
            $setting = SettingController::updateSetting($settingId, $content);
        }else{
            $image = $request->file('image');
            $setting = SettingController::updateImageSetting($settingId, $image);
        }



        return redirect()->route('setting');
    }

    public function getAllPlans(){
        $plans = Plan::select('id', 'tag', 'name', 'description', 'is_active', 'price', 'currency', 'invoice_period', 'invoice_interval')->whereNull('deleted_at')->get();
        return view('admin.settings.plans.get-plans', compact('plans'));
    }

    public function editPlan($plan_id){
        $plan_data = Plan::select('id', 'tag', 'name', 'description', 'is_active', 'price', 'currency', 'invoice_period', 'invoice_interval')->where('id', '=', $plan_id)->get();
        if( !empty($plan_data) ):
            $plan = $plan_data[0];
            return view('admin.settings.plans.edit-plan', compact('plan'));
        else:
            return redirect()->back()->withErrors('حدث خطأ يرجي المحاولة مرة أخري');
        endif;
    }

    public function updatePlan(Request $request){
        // validate request
        $validate = ValidateController::validateEditPlan($request);

        if (!empty($validate)) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        // handle save data
        $plan_id = $request->input('plan_id');
        $plan_name = $request->input('plan_name');
        $plan_description = $request->input('plan_description');
        $plan_price = $request->input('plan_price');
        $plan_period = $request->input('plan_period');
        $plan_interval = $request->input('plan_interval');
        $plan_is_active = ($request->input('plan_is_active') === 'on') ? 1 : 0 ;


        $update = Plan::where('id', $plan_id)
            ->update([
                'name' => $plan_name,
                'description' => $plan_description,
                'price' => $plan_price,
                'invoice_period' => $plan_period,
                'invoice_interval' => $plan_interval,
                'is_active' => $plan_is_active
            ]);

        if($update):
            return redirect()->back()->withSuccess('تم تعديل الخطة بنجاح');
        else:
            return redirect()->back()->withErrors('حدث خطأ في تعديل البيانات يرجي المحاولة مرة أخري');
        endif;


    }

    public function deletePlan($plan_id){
        $plan_id = (int) $plan_id;
        $plan = Plan::find($plan_id);
        $delete = $plan->delete();

        if($delete):
            return redirect()->back()->withSuccess('تم حذف الخطة بنجاح');
        else:
            return redirect()->back()->withErrors('حدث خطأ في حذف البيانات يرجي المحاولة مرة أخري');
        endif;


    }

    public function addPlanView(){
        return view('admin.settings.plans.add-plan');
    }

    public function addPlan(Request $request){

        // validate request
        $validate = ValidateController::validateAddPlan($request);

        if (!empty($validate)) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        // handle save data
        $plan_name = $request->input('plan_name');
        $plan_description = $request->input('plan_description');
        $plan_price = $request->input('plan_price');
        $plan_period = $request->input('plan_period');
        $plan_interval = $request->input('plan_interval');
        $plan_is_active = ($request->input('plan_is_active') === 'on') ? 1 : 0 ;

        // send to model
        $add_plan = Plan::create([
            'tag' => strtolower($plan_name) . '-' . rand(1,100),
            'name' => $plan_name,
            'description' => $plan_description,
            'is_active' => $plan_is_active,
            'price' => $plan_price,
            'signup_fee' => 0,
            'currency' => 'ر.س',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'trial_mode' => 'outside',
            'grace_period' => 0,
            'grace_interval' => 'day',
            'invoice_period' => $plan_period,
            'invoice_interval' => $plan_interval,
            'tier' => 1,
        ]);

        if($add_plan):
            $plans = Plan::select('id', 'tag', 'name', 'description', 'is_active', 'price', 'currency', 'invoice_period', 'invoice_interval')->whereNull('deleted_at')->get();
            return redirect('/admin/setting/get-plans')->with(['plans' => $plans])->withSuccess('تم اضافة الخطة بنجاح');
        else:
            return redirect()->back()->withErrors('حدث خطأ في حفظ البيانات يرجي المحاولة مرة أخري');
        endif;



    }

    public function manageUsersSubs($user_id){
        $user_data = User::find($user_id);
        return view('admin.users.manage-subs', compact('user_data'));
    }

}
