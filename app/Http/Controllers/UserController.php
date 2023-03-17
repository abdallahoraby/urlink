<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClass\Hashed;
use Hash;
use Auth;
use JWTAuth;
use App\Models\User;

class UserController extends Controller
{
    public static function createUser($name, $email, $password, $rule = 0){
        $newUser = User::create([
            'full_name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        $hashPass = new Hashed();
        $hashPass->set_pass($password,$email);
        $hash = $hashPass->get_hash();
        $newUser->password = Hash::make($hash);

        if($rule == 1){
            $newUser->isAdmin = $rule;
        }
        $newUser->save();

    }

    public static function login($email, $password){
        $email = strtolower($email);
        $hashPass = new Hashed();
        $hashPass->set_pass($password,$email);
        $hash = $hashPass->get_hash();


        if (Auth::attempt(['email' => $email, 'password' => $hash, 'status' => 1]))
        {
            return true;
        }
    }


    public static function getUserDataById($userId){
        $data = User::find($userId, ['user_id', 'full_name', 'email', 'first_name', 'last_name', 'avatar', 'mobile']);
        $data->avatar = ($data->avatar != null) ? $data->avatar : '/assets/img/default_profile_image.png';
        return $data;
    }

    public static function updateAuthData($data){
        $user = auth()->user();
        if( $data->hasFile('avatar')){
            $avatarName = 'user_avatar_' . $data['avatar']->getClientOriginalName();
            $path = '/assets/users/' . $user->user_id . '/';
            if($user->avatar !== null){
                if($user->avatar != $path . $avatarName){
                    $delete = public_path($user->avatar);
                    if (file_exists($delete)) {
                        unlink($delete);
                    }
                    $data['avatar']->move(public_path(). $path , $avatarName);
                    $avatarName = $path . $avatarName;
                    $user->avatar = $avatarName;
                }
            }else{
                $data['avatar']->move(public_path(). $path , $avatarName);
                $avatarName = $path . $avatarName;
                $user->avatar = $avatarName;
            }

        }
        $user->update([
            //'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'mobile' => $data['mobile'],
        ]);
    }


    public static function Token(){
        $token = JWTAuth::getToken();
            $check = strpos($token,"=>");
            $token =substr($token,$check);
            return $token;
    }

    public static function makeToken($user){
        $customClaims = [
            'user_id' => $user->user_id,
            'user_email' => $user->email
        ];
        $token = JWTAuth::claims($customClaims)->fromUser($user);
        return $token;
    }

    public static function getUserByEmail($email){
        $user = User::where('email', $email)->first();
        if($user){
            return $user;
        }else{
            return 0;
        }
    }

    public static function payload(){
        $token = JWTAuth::getToken();
        $payload = JWTAuth::getPayload();
        return $payload;
    }

    public static function getAllUsers(){
        $users = User::select('user_id', 'full_name', 'email', 'mobile', 'subscription', 'status' )
        ->where('isAdmin', 0)->get();

        return $users;
    }

    public static function updateActivity($userId, $status){
        $user = User::find($userId);
        $user->status = $status;
        if($status == 0){
            $user->should_re_login = 1;
        }
        $user->save();
    }

    public static function updateRule($userId, $rule){
        $user = User::find($userId);
        $user->isAdmin = $rule;
        $user->should_re_login = 1;
        $user->save();
    }

    public static function getAllAdmin(){
        $admins = User::select('user_id', 'full_name', 'email', 'mobile', 'subscription', 'status' )
        ->where('isAdmin', 1)->where('user_id', '!=', Auth()->id())->where('user_id', '!=', 1)->get();
        return $admins;
    }

    public static function getAvailableStyles($userId){
        $subscription = User::select('subscription')->where('user_id', $userId)->first();
        $styles = LandingStyleController::getAvailableStyles($subscription->subscription);
        return $styles;
    }



}
