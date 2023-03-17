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


}
