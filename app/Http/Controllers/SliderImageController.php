<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderImage;
class SliderImageController extends Controller
{
    public static function createSliderImages($section_id, $user_id, $pageId, $sliderImages){
        foreach($sliderImages as $image){
            $generate = rand(10000,500000);
            $imageName =  time() . $generate . '.' . $image->getClientOriginalExtension();
            $path = '/assets/users/' . $user_id . '/' . $pageId . '/sections/' . $section_id . '/';
            $image->move(public_path(). $path , $imageName);
            $newImage = SliderImage::create([
                'image_url' => $path . $imageName,
                'section_id' => $section_id
            ]);
        }
    }

    public static function deleteSliderImages($section_id, $deleteImages){
        foreach($deleteImages as $deleteImage){
            $image = SliderImage::where('section_id', $section_id)->where('slide_image_id', $deleteImage)->first();
            if($image){
                $deletedPath = public_path($image->image_url);
                if (file_exists($deletedPath)) {
                    unlink($deletedPath);
                }
                $image->forceDelete();
            }


        }
    }

    public static function deleteAllSliderImages($section_id){
        $sliders = SliderImage::where('section_id', $section_id)->get();
        if($sliders){
            foreach($sliders as $image){
                $deletedPath = public_path($image->image_url);
                if (file_exists($deletedPath)) {
                    unlink($deletedPath);
                }
                $image->forceDelete();
            }
        }
    }

    public static function getSliderImagesBySectionId($section_id){
        $urls = SliderImage::where('section_id', $section_id)->get();
        $data = array();
        foreach($urls as $url){
            array_push($data, $url->image_url);
        }
        return $data;
    }
}
