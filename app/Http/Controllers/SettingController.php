<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    public static function getAllPageParts($type){
        
        $data = Setting::where('type', $type)->get();
        $output = array();
        $group = array();
        $loop = 0;
        foreach($data as $row){
            if($row['group'] == null){
                $output[$row['key']] = $row['value'];
            }else{
                $group[$loop] = $row['value'];
                $loop++;
                //$output[$row['key'][$loop]]  = $row['value'];


            }
        }
        if($group !== null){
            array_push($output, $group);
        }
        return $output;
    }

    public static function getAllSetting(){
        $data = Setting::get()->groupBy('type');
        return $data;
    }

    public static function getSettingById($settingId){
        $data = Setting::select('setting_id', 'key', 'value', 'type')->where('setting_id', $settingId)->first();
        return $data;
    }

    public static function updateSetting($settingId, $content){
        $setting = Setting::where('setting_id', $settingId)->update(['value' => $content]);
        return 0;
    }

    public static function updateImageSetting($settingId, $image){
        $setting = Setting::where('setting_id', $settingId)->first();
        $oldImage = $setting->value;

        $imageName = time() . $image->getClientOriginalName();
        $newPath = '/assets/img/images/';
        $image->move(public_path(). $newPath , $imageName);
        $imageName = $newPath . $imageName;
        $setting->value = $imageName;
        $setting->save();

        $delete = public_path($oldImage);
        if (file_exists($delete)) {
            unlink($delete);
        }
        return 0;
    }
}
