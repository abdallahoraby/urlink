<?php

namespace App\Http\Controllers\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidateController extends Controller
{

    public static function validateRegister($request, $api = false){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:100|string|unique:users',
            'password' => 'required|min:8|max:50|string|confirmed|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            'name' => 'required|max:50|string'
        ]);

        if($api == true){
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach($errors->all() as $error){
                    $err = $error;
                break;
                }
                $output = array(
                    'code' => 400,
                    'message' => $err
                );
                return $output;
            }
        }else{
            if ($validator->fails()) {
                $errors = $validator->errors();

                return $errors;
            }
        }

        return 0;
    }


    public static function validateUpdatePassword($request, $api = false){
        $validator = Validator::make($request->all(),[
            'old_password' => 'required|min:8|max:50|string|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            'password' => 'required|min:8|max:50|string|confirmed|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/'
        ]);

        if($api == true){
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach($errors->all() as $error){
                    $err = $error;
                break;
                }
                $output = array(
                    'code' => 400,
                    'message' => $err
                );
                return $output;
            }
        }else{
            if ($validator->fails()) {
                $errors = $validator->errors();

                return $errors;
            }
        }

        return 0;
    }

    public static function validateLogin($request, $api = false){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:100|string|exists:users',
            'password' => 'required|min:8|max:50|string|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/'
        ]);
        if($api == true){
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach($errors->all() as $error){
                    $err = $error;
                break;
                }
                $output = array(
                    'code' => 400,
                    'message' => $err
                );
                return $output;
            }
        }else{
            if ($validator->fails()) {
                $errors = $validator->errors();

                return $errors;
            }
        }
        return 0;
    }

    public static function validateUpdateProfile($request, $api = false){
        $validator = Validator::make($request->all(),[
            //'name' => 'required|max:50|string',
            //'email' => 'required|email|max:100|string|unique:users,email,'. $request->user()->user_id. ',user_id',
            'first_name' => 'max:50|string',
            'last_name' => 'max:50|string',
            'mobile' => 'nullable|regex:/[0-9]/|not_regex:/[a-z]/|min:8',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        if($api == true){
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach($errors->all() as $error){
                    $err = $error;
                break;
                }
                return $err;
            }
        }else{
            if ($validator->fails()) {
                $errors = $validator->errors();

                return $errors;
            }
        }
        return 0;
    }

    public static function validateCreateLandingPage($request, $api = false){
        $validator = Validator::make($request->all(),[
            'account_type' => 'required|in:individual,organization',
            'page_name' => 'required|max:50|string',
            'page_title' => 'required|max:50|string',
            'country' => 'required|max:50|string',
            'city' => 'required|max:50|string',
            'page_profile_icon' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'page_profile_banner' => 'present|nullable|image|mimes:jpeg,png,jpg|max:2048',
            'page_contact_email' => 'required|email|max:100|string',
            'page_contact_phone' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:8',
            'page_brief' => 'present|nullable|max:100|string',
            'page_desc' => 'present|nullable|string',
            'links' => 'present|nullable|array',
            'links.*.link_name' => 'required|string|max:50',
            'links.*.link_url' => 'required|string',
            'sections' => 'present|nullable|array',
            'sections.*.section_type' => 'required|in:image,slider,youtube,vimeo,soundcloud,map,text',
            'sections.*.section_title' => 'required|string',
            'sections.*.section_content' => 'required_if:sections.*.section_type,=,text',
            'sections.*.section_url' => 'required_if:sections.*.section_type,map,soundcloud,youtube,vimeo',
            'sections.*.section_image' => 'image|mimes:jpeg,png,jpg|max:2048|required_if:sections.*.section_type,image',
            'sections.*.section_slider_images' => 'array|required_if:sections.*.section_type,slider',
            'sections.*.section_slider_images.*.image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if($api == true){
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach($errors->all() as $error){
                    $err = $error;
                break;
                }
                return $err;
            }
        }else{
            if ($validator->fails()) {
                $errors = $validator->errors();

                return $errors;
            }
        }
        return 0;
    }


    public static function validateCreateLandingPageWeb($request){
        $validator = Validator::make($request->all(),[
            'account_type' => 'required|in:individual,organization',
            'page_name' => 'required|max:50|string',
            'page_title' => 'required|max:50|string',
            'country' => 'required|max:50|string',
            'city' => 'required|max:50|string',
            'page_profile_icon' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'page_profile_banner' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'page_contact_email' => 'required|email|max:100|string',
            'page_contact_phone' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:8',
            'page_brief' => 'nullable|max:100|string',
            'page_desc' => 'nullable|string',
            'links' => 'nullable|array',
            'links.*.link_name' => 'required|string|max:50',
            'links.*.link_url' => 'required|string',
            'sections' => 'nullable|array',
            'sections.*.section_type' => 'required|in:image,slider,youtube,vimeo,soundcloud,map,text',
            'sections.*.section_title' => 'required|string',
            'sections.*.section_content' => 'required_if:sections.*.section_type,=,text',
            'sections.*.section_url' => 'required_if:sections.*.section_type,map,soundcloud,youtube,vimeo',
            'sections.*.section_image' => 'image|mimes:jpeg,png,jpg|max:2048|required_if:sections.*.section_type,image',
            'sections.*.section_slider_images' => 'array|required_if:sections.*.section_type,slider',
            'sections.*.section_slider_images.*.image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();

            return $errors;
        }
        return 0;
    }

    public static function validateUpdateLandingPageWeb($request){
        $validator = Validator::make($request->all(),[
            'account_type' => 'required|in:individual,organization',
            'page_name' => 'required|max:50|string',
            'page_title' => 'required|max:50|string',
            'country' => 'required|max:50|string',
            'city' => 'required|max:50|string',
            'page_profile_icon' => 'image|mimes:jpeg,png,jpg|max:2048',
            'page_profile_banner' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'page_contact_email' => 'required|email|max:100|string',
            'page_contact_phone' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:8',
            'page_brief' => 'nullable|max:100|string',
            'page_desc' => 'nullable|string',
            'links' => 'nullable|array',
            'links.*.link_name' => 'required|string|max:50',
            'links.*.link_url' => 'required|string',
            'sections' => 'nullable|array',
            'sections.*.section_type' => 'required|in:image,slider,youtube,vimeo,soundcloud,map,text',
            'sections.*.section_title' => 'required|string',
            'sections.*.section_content' => 'required_if:sections.*.section_type,=,text',
            'sections.*.section_url' => 'required_if:sections.*.section_type,map,soundcloud,youtube,vimeo',
            'sections.*.section_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'sections.*.section_slider_images' => 'array',
            'sections.*.section_slider_images.*.image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();

            return $errors;
        }
        return 0;
    }


    public static function validateUpdateLandingPage($request, $api = false){
        $validator = Validator::make($request->all(),[
            'account_type' => 'present|nullable|in:individual,organization',
            'page_name' => 'present|nullable|max:50|string',
            'page_title' => 'present|nullable|max:50|string',
            'country' => 'present|nullable|max:50|string',
            'city' => 'present|nullable|max:50|string',
            'page_profile_icon' => 'present|nullable|image|mimes:jpeg,png,jpg|max:2048',
            'page_profile_banner' => 'present|nullable|image|mimes:jpeg,png,jpg|max:2048',
            'page_contact_email' => 'present|nullable|email|max:100|string',
            'page_contact_phone' => 'present|nullable|regex:/[0-9]/|not_regex:/[a-z]/|min:8',
            'page_brief' => 'present|nullable|max:100|string',
            'page_desc' => 'present|nullable|string',
            'links' => 'present|nullable|array',
            'links.*.link_id' => 'required|numeric|exists:landing_page_links,link_id',
            'links.*.link_name' => 'present|nullable|string|max:50',
            'links.*.link_url' => 'present|nullable|string',
            'sections' => 'present|nullable|array',
            'sections.*.section_id' => 'required|numeric|exists:landing_page_sections,section_id',
            'sections.*.section_type' => 'present|required|in:image,slider,youtube,vimeo,soundcloud,map,text',
            'sections.*.section_title' => 'present|nullable|string',
            'sections.*.section_content' => 'nullable|present_if:sections.*.section_type,=,text',
            'sections.*.section_url' => 'nullable|present_if:sections.*.section_type,map,soundcloud,youtube,vimeo',
            'sections.*.section_image' => 'image|mimes:jpeg,png,jpg|max:2048|required_if:sections.*.section_type,image',
            'sections.*.section_slider_images' => 'array|required_if:sections.*.section_type,slider',
            'sections.*.section_slider_images.*.image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if($api == true){
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach($errors->all() as $error){
                    $err = $error;
                break;
                }
                return $err;
            }
        }else{
            if ($validator->fails()) {
                $errors = $validator->errors();

                return $errors;
            }
        }
        return 0;
    }

    public static function validateDeleteLandingPage($id, $userId, $api = false){
        $validator = Validator::make(['id' => $id, 'userId' => $userId],[
            'id' => 'required|exists:landing_pages,landing_page_id,user_id,'.$userId,

        ]);
        if($api == true){
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach($errors->all() as $error){
                    $err = $error;
                break;
                }
                return $err;
            }
        }else{
            if ($validator->fails()) {
                $errors = $validator->errors();

                return $errors;
            }
        }
        return 0;
    }

    public static function validateContactUs($request, $api = false){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:50|string',
            'email' => 'required|email|max:100|string|unique:users',
            'content' => 'required|text',
        ]);
        if($api == true){
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach($errors->all() as $error){
                    $err = $error;
                break;
                }
                return $err;
            }
        }else{
            if ($validator->fails()) {
                $errors = $validator->errors();

                return $errors;
            }
        }
        return 0;
    }

    public static function validateEditSetting($request, $api = false){
        $validator = Validator::make($request->all(),[
            'setting_id' => 'required|numeric|exists:settings,setting_id',
            'type' => 'required|string|in:text,image',
            'content' => 'string|required_if:type,=,text',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048|required_if:type,=,image'
        ]);

        if($api == true){
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach($errors->all() as $error){
                    $err = $error;
                break;
                }
                $output = array(
                    'code' => 400,
                    'message' => $err
                );
                return $output;
            }
        }else{
            if ($validator->fails()) {
                $errors = $validator->errors();
                return $errors;
            }
        }
        return 0;
    }

    public static function validateCreateStyle($request, $api = false){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'fee' => 'required|string|in:free,fee',
            'status' => 'required|numeric|in:0,1',
            'file' => 'required|file|max:2048',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($api == true){
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach($errors->all() as $error){
                    $err = $error;
                break;
                }
                $output = array(
                    'code' => 400,
                    'message' => $err
                );
                return $output;
            }
        }else{
            if ($validator->fails()) {
                $errors = $validator->errors();
                return $errors;
            }
        }
        return 0;
    }

    public static function validateEditPage($request, $api = false){

        $validator = Validator::make($request->all(),[
            'page_id' => 'required|numeric',
            'page_title' => 'required|string',
            'section_1.title' => 'string',
            'section_1.description' => 'string',
            'section_1.button_1_text' => 'string',
            'section_1.button_1_link' => 'string',
            'section_1.button_2_text' => 'string',
            'section_1.button_2_link' => 'string',
        ]);


        if($api == true){
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach($errors->all() as $error){
                    $err = $error;
                    break;
                }
                $output = array(
                    'code' => 400,
                    'message' => $err
                );
                return $output;
            }
        }else{
            if ($validator->fails()) {
                $errors = $validator->errors();
                return $errors;
            }
        }
        return 0;

    }

}
