<?php

namespace App\Http\Controllers\API\Users;

use App\Http\Controllers\API\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Validator\ValidateController;
use App\Models\User;
use App\CustomClass\Hashed;
use Hash;
use JWTAuth;


class UsersController extends Controller
{



    public function __construct()
    {
        $this->token = UserController::Token();
        $this->error = array(
            'code' => 400,
            'message' => 'Failed',
            'token' => $this->token
        );

        return $this->error;
    }

    public function GET_page($page_name = null){
        if($page_name == null){
            return view('index');
        }

        $dataLandingPage = LandingPageController::getLandingPagesByURL($page_name);
        if(empty($dataLandingPage)){
            return view('index');
        }
        $output = array(
            'code' => 200,
            "message" => 'success',
            'data' => $dataLandingPage
        );
        return Response()->json($output);
    }
    ///////////////////////////////////////////////////////////////////////
                    // Register and Login Functions //
    //////////////////////////////////////////////////////////////////////

    /**
     * @SWG\Post(
     * path= "register",
     * tags = {"Users/Auth"},
     * operationId = "register",
     * summary = "Register",
     * @SWG\Parameter(
     * name = "name",
     * description = "user name",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "varchar"),
     * @SWG\Parameter(
     * name = "email",
     * description = "user email",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "email"),
     * @SWG\Parameter(
     * name = "password",
     * description = "user password",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "password"),
     * @SWG\Response(
     * response = 200,
     * description = "success"),
     * @SWG\Response(
     * response = 400,
     * description = "Bad request"),
     * )
     */

    public function POST_register(Request $request){
        $validate = ValidateController::validateRegister($request, true);
        if($validate === 0){
            $name = $request->input('name');
            $email = strtolower($request->input('email'));
            $password = $request->input('password');

            UserController::createUser($name, $email, $password);

            $output = array(
                'code' => 200,
                "message" => 'success'
            );
            return Response()->json($output);

        }else{
            return Response()->json($validate);
        }
    }



    /**
     * @SWG\Post(
     * path= "login",
     * tags = {"Users/Auth"},
     * operationId = "login",
     * summary = "Login",
     * @SWG\Parameter(
     * name = "email",
     * description = "user email",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "email"),
     * @SWG\Parameter(
     * name = "password",
     * description = "user password",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "password"),
     * @SWG\Response(
     * response = 200,
     * description = "success"),
     * @SWG\Response(
     * response = 400,
     * description = "Bad request"),
     * )
     */
    public function POST_login(Request $request){
        $validate = ValidateController::validateLogin($request, true);
        if($validate === 0){
            $email = $request->input('email');
            $password = $request->input('password');
            $login = UserController::login($email, $password);
            if($login == true){
                $user = UserController::GetUserByEmail($email);
                $token = UserController::makeToken($user);

                $output = array(
                    'code' => 200,
                    "message" => 'success',
                    'token' => $token
                );
            }else{
                $output = array(
                    'code' => 400,
                    "message" => 'Email or password is invalid'
                );
            }
            return Response()->json($output);
        }else{
            return Response()->json($validate);
        }

    }
    ///////////////////////////////////////////////////////////////////////
                    // User Profile Functions //
    //////////////////////////////////////////////////////////////////////

    /**
     * @SWG\Get(
     * path= "user/profile/get",
     * tags = {"Users/Data"},
     * operationId = "user profile",
     * summary = "Profile",
     * security = {{"Bearer":{}}},
     * @SWG\Response(
     * response = 200,
     * description = "success"),
     * @SWG\Response(
     * response = 400,
     * description = "Bad request"),
     * )
     */
    public function GET_profile(){
        $userId = Auth::id();
        $dataOfUser = UserController::getUserDataById($userId);
        $output = array(
            'code' => 200,
            'message' => 'success',
            'token' => $this->token,
            'data' => $dataOfUser
        );
       return Response()->json($output);
    }

    /**
     * @SWG\Post(
     * path= "user/profile/update",
     * tags = {"Users/Data"},
     * operationId = "Update Profile",
     * summary = "Profile",
     * security = {{"Bearer":{}}},
     * @SWG\Parameter(
     * name = "name",
     * description = "user name",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "_method",
     * description = "method = PUT",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "first_name",
     * description = "first name",
     * in = "formData",
     * required = true,
     * allowEmptyValue = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "last_name",
     * description = "last name",
     * in = "formData",
     * required = true,
     * allowEmptyValue = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "mobile",
     * description = "mobile",
     * in = "formData",
     * required = true,
     * allowEmptyValue = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "avatar",
     * description = "Profile Pic",
     * in = "formData",
     * required = true,
     * allowEmptyValue = true,
     * type = "file"),
     * @SWG\Response(
     * response = 200,
     * description = "success"),
     * @SWG\Response(
     * response = 400,
     * description = "Bad request"),
     * )
     */
    public function UPDATE_profile(Request $request){
        $validate = ValidateController::validateUpdateProfile($request, true);
        if($validate === 0){
            $updateAuthData = UserController::updateAuthData($request);
        }else{
            $this->error['message'] = $validate;
            return Response()->json($this->error);
        }

        $userId = Auth::id();
        $dataOfUser = UserController::getUserDataById($userId);
        $output = array(
            'code' => 200,
            'message' => 'success',
            'token' => $this->token,
            'data' => $dataOfUser
        );
       return Response()->json($output);
    }

    ///////////////////////////////////////////////////////////////////////
                    // Landing Page Functions //
    //////////////////////////////////////////////////////////////////////

    /**
     * @SWG\Get(
     * path= "user/landing-page/get/{id}",
     * tags = {"Users/LandingPage"},
     * operationId = "user Landing Page",
     * summary = "Landing Page",
     * @SWG\Parameter(name="id",
     * in="path",
     * description="optional,
     * get lading page data by id",type="integer",
     * allowEmptyValue = true),
     * security = {{"Bearer":{}}},
     * @SWG\Response(
     * response = 200,
     * description = "success"),
     * @SWG\Response(
     * response = 400,
     * description = "Bad request"),
     * )
     */
    public function GET_landing_page($landingPageId = null){
        $userId = Auth::id();
        $dataLandingPages = LandingPageController::getLandingPagesById($userId, $landingPageId);
        $output = array(
            'code' => 200,
            'message' => 'success',
            'token' => $this->token,
            'data' => $dataLandingPages
        );
       return Response()->json($output);
    }

    /**
     * @SWG\Post(
     * path= "user/landing-page/create",
     * tags = {"Users/LandingPage"},
     * operationId = "Create Landing page",
     * summary = "Landing Page",
     * security = {{"Bearer":{}}},
     * @SWG\Parameter(
     * name = "account_type",
     * description = "account type",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "page_name",
     * description = "page_name",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "page_title",
     * description = "page title",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "page_contact_email",
     * description = "page contact email",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "email"),
     * @SWG\Parameter(
     * name = "page_contact_phone",
     * description = "page contact phone",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "country",
     * description = "country",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "city",
     * description = "city",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "page_profile_icon",
     * description = "profile icon",
     * in = "formData",
     * required = true,
     * type = "file"),
     * @SWG\Parameter(
     * name = "page_profile_banner",
     * description = "profile banner",
     * in = "formData",
     * required = true,
     * allowEmptyValue = true,
     * type = "file"),
     * @SWG\Parameter(
     * name = "page_brief",
     * description = "page brief",
     * in = "formData",
     * required = true,
     * allowEmptyValue = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "page_desc",
     * description = "page desc",
     * in = "formData",
     * required = true,
     * allowEmptyValue = true,
     * type = "string",
     * format = "string"),
     * @SWG\Response(
     * response = 200,
     * description = "success"),
     * @SWG\Response(
     * response = 400,
     * description = "Bad request"),
     * )
     */
    public function CREATE_landing_page(Request $request){
        $validate = ValidateController::validateCreateLandingPage($request, true);
        if($validate === 0){
            $createLandingPage = LandingPageController::createLandingPage($request);
        }else{
            $this->error['message'] = $validate;
            return Response()->json($this->error);
        }
        $output = array(
            'code' => 200,
            'message' => 'success',
            'token' => $this->token
        );
       return Response()->json($output);
    }

    /**
     * @SWG\Post(
     * path= "user/landing-page/update",
     * tags = {"Users/LandingPage"},
     * operationId = "Update landing page",
     * summary = "landing page",
     * security = {{"Bearer":{}}},
     * @SWG\Parameter(
     * name = "_method",
     * description = "method = PUT",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "account_type",
     * description = "account type",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "page_name",
     * description = "page_name",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "page_title",
     * description = "page title",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "page_contact_email",
     * description = "page contact email",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "email"),
     * @SWG\Parameter(
     * name = "page_contact_phone",
     * description = "page contact phone",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "country",
     * description = "country",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "city",
     * description = "city",
     * in = "formData",
     * required = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "page_profile_icon",
     * description = "profile icon",
     * in = "formData",
     * required = true,
     * type = "file"),
     * @SWG\Parameter(
     * name = "page_profile_banner",
     * description = "profile banner",
     * in = "formData",
     * required = true,
     * allowEmptyValue = true,
     * type = "file"),
     * @SWG\Parameter(
     * name = "page_brief",
     * description = "page brief",
     * in = "formData",
     * required = true,
     * allowEmptyValue = true,
     * type = "string",
     * format = "string"),
     * @SWG\Parameter(
     * name = "page_desc",
     * description = "page desc",
     * in = "formData",
     * required = true,
     * allowEmptyValue = true,
     * type = "string",
     * format = "string"),
     * @SWG\Response(
     * response = 200,
     * description = "success"),
     * @SWG\Response(
     * response = 400,
     * description = "Bad request"),
     * )
     */
    public function UPDATE_landing_page(Request $request, $landingPageId){
        $validate = ValidateController::validateUpdateLandingPage($request, true);
        if($validate === 0){
            $updateLandingPage = LandingPageController::updateLandingPage($request, $landingPageId);
            if($updateLandingPage === 0){
                $this->error['message'] = "Landing page id not found or you don't have permission to edit this landing page.";
                return Response()->json($this->error);
            }
        }else{
            $this->error['message'] = $validate;
            return Response()->json($this->error);
        }
        $output = array(
            'code' => 200,
            'message' => 'success',
            'token' => $this->token
        );
       return Response()->json($output);
    }
}
