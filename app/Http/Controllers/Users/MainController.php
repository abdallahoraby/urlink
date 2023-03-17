<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Validator\ValidateController;
use App\CustomClass\Hashed;

use Bpuig\Subby\Models\Plan;
use App\Models\User;
use App\Models\Page;

class MainController extends Controller
{
    function GET_about_us(){
        $aboutUsData = SettingController::getAllPageParts('aboutUs');
        return view('about_us', compact('aboutUsData'));
    }

    function GET_contact_us(){
        return view('contact_us');
    }

    function POST_contact_us(Request $request){
        $validate = ValidateController::validateUpdateProfile($request);
        if(!empty($validate)){
            return redirect()->back()->withErrors($validate)
            ->withInput();
        }
        $userId = Auth::id();
        ContactUsController::createContuctUsMessage($request, $userId);

        return view('index');
    }

    function GET_privacy(){
        $privacyData = SettingController::getAllPageParts('privacy');
        return view('privacy', compact('privacyData'));
    }

    function GET_terms(){
        $termsData = SettingController::getAllPageParts('terms');
        return view('terms', compact('termsData'));
    }

    public static function getPlans(){
        $plans = Plan::select('id', 'tag', 'name', 'description', 'is_active', 'price', 'currency', 'invoice_period', 'invoice_interval')->get();
        return view('plans', compact('plans'));
    }

    function getTest(){



        return 0;
    }
}
