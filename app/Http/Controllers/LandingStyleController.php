<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingStyle;
class LandingStyleController extends Controller
{
    public static function defaultStyle(){
        $defultSyleId = LandingStyle::where('style_default', 1)->first();
        return $defultSyleId->style_id;
    }

    public static function getAllStyles(){
        $styles = LandingStyle::get();
        return $styles;
    }


    public static function getStyle($style_id){
        $style = LandingStyle::where('style_id', '=', $style_id)->get();
        return $style[0];
    }

    public static function createNewStyle($styleName, $style_fee, $status, $style_image = null){
        $newStyle = LandingStyle::create([
            'style_name' => $styleName,
            'style_fee' => $style_fee,
            'status' => $status,
        ]);
        return 0;
    }

    public static function updateStyleData($style_id, $styleName, $style_fee, $status, $style_image_name){
        $page_update = LandingStyle::where('style_id', $style_id)->update(
            [
                'style_name' => $styleName,
                'style_image' => $style_image_name,
                'style_fee' => $style_fee,
                'status' => $status,
            ]
        );
        return $page_update;
    }

    public static function uploadStyleImage($image){

        $imageName = time() . $image->getClientOriginalName();
        $newPath = '/assets/img/images/';
        $image->move(public_path(). $newPath , $imageName);
        $imageName = $newPath . $imageName;

        return $imageName;
    }

    public static function getAvailableStyles($subscription){
        if($subscription == 'free'){
            $styles = LandingStyle::where('style_fee', 'free')->where('status', 1)->get();
        }else if($subscription == 'paid'){
            $styles = LandingStyle::where('style_fee', 'fee')->where('status', 1)->get();
        }
        return $styles;
    }
}
