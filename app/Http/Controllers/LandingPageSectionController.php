<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPageSection;
class LandingPageSectionController extends Controller
{
    public static function createSections($pageId, $user_id, $sections){
        foreach($sections as $section){
            $newSection = LandingPageSection::create([
                'section_type' => $section['section_type'],
                'section_title' => $section['section_title'],
                'page_id' => $pageId
            ]);

            if($section['section_type'] == 'text'){
                $newSection->section_content = $section['section_content'];
            }elseif($section['section_type'] == 'youtube'){
                $newSection->youtube_url = $section['section_url'];
            }elseif($section['section_type'] == 'vimeo'){
                $replaced = str_replace('watch?v=', 'embed/', $section['section_url']);
                $newSection->vimeo_url = $replaced;
            }elseif($section['section_type'] == 'soundcloud'){
                //$replaced = str_replace('watch?v=', 'embed/', $section['section_url']);
                $newSection->soundcloud_url = $section['section_url'];
            }elseif($section['section_type'] == 'map'){
                $newSection->map_location = $section['section_url'];
            }elseif($section['section_type'] == 'image'){
                $imageName =  time() . '_' . $newSection->section_id . '.' . $section['section_image']->getClientOriginalExtension();
                $path = '/assets/users/' . $user_id . '/' . $pageId . '/sections';
                $section['section_image']->move(public_path(). $path , $imageName);
                $newSection->image_url = $path . '/' . $imageName;
            }elseif($section['section_type'] == 'slider'){
                SliderImageController::createSliderImages($newSection->section_id, $user_id, $pageId, $section['section_slider_images']);
            }
            $newSection->save();
        }
    }

    public static function updateSections($pageId, $user_id, $sections, $deletedSlider = null){
        $vText = $vYoutube = $vVimeo = $vSoundcloud = $vMap = $vImage = $vSlider = false;
        if(isset($sections)){
            foreach($sections as $section){

                if($section['section_type'] == 'text'){
                    $text = LandingPageSection::where('page_id', $pageId)->where('section_type', 'text')->first();
                    if($text){
                        $text->update(['section_title' => $section['section_title'], 'section_content' => $section['section_content']]);
                    }else{
                        $newSection = LandingPageSection::create([
                            'section_type' => $section['section_type'],
                            'section_title' => $section['section_title'],
                            'page_id' => $pageId,
                            'section_content' => $section['section_content']
                        ]);
                    }
                    $vText = true;
                }

                if($section['section_type'] == 'youtube'){
                    $youtube = LandingPageSection::where('page_id', $pageId)->where('section_type', 'youtube')->first();
                    if($youtube){
                        $youtube->update(['section_title' => $section['section_title'], 'youtube_url' => $section['section_url']]);
                    }else{
                        $newSection = LandingPageSection::create([
                            'section_type' => $section['section_type'],
                            'section_title' => $section['section_title'],
                            'page_id' => $pageId,
                            'youtube_url' => $section['section_url']
                        ]);
                    }
                    $vYoutube = true;
                }

                if($section['section_type'] == 'vimeo'){
                    $vimeo = LandingPageSection::where('page_id', $pageId)->where('section_type', 'vimeo')->first();
                    $replaced = str_replace('watch?v=', 'embed/', $section['section_url']);
                    if($vimeo){
                        $vimeo->update(['section_title' => $section['section_title'], 'vimeo_url' => $replaced]);
                    }else{
                        $newSection = LandingPageSection::create([
                            'section_type' => $section['section_type'],
                            'section_title' => $section['section_title'],
                            'page_id' => $pageId,
                            'vimeo_url' => $replaced
                        ]);
                    }
                    $vVimeo = true;
                }

                if($section['section_type'] == 'soundcloud'){

                    $soundcloud = LandingPageSection::where('page_id', $pageId)->where('section_type', 'soundcloud')->first();
                    if($soundcloud){
                        $soundcloud->update(['section_title' => $section['section_title'], 'soundcloud_url' => $section['section_url']]);
                    }else{
                        $newSection = LandingPageSection::create([
                            'section_type' => $section['section_type'],
                            'section_title' => $section['section_title'],
                            'page_id' => $pageId,
                            'soundcloud_url' => $section['section_url']
                        ]);
                    }
                    $vSoundcloud = true;
                }

                if($section['section_type'] == 'map'){
                    $map = LandingPageSection::where('page_id', $pageId)->where('section_type', 'map')->first();
                    if($map){
                        $map->update(['section_title' => $section['section_title'], 'map_location' => $section['section_url']]);
                    }else{
                        $newSection = LandingPageSection::create([
                            'section_type' => $section['section_type'],
                            'section_title' => $section['section_title'],
                            'page_id' => $pageId,
                            'map_location' => $section['section_url']
                        ]);
                    }
                    $vMap = true;
                }

                if($section['section_type'] == 'image'){
                    $image = LandingPageSection::where('page_id', $pageId)->where('section_type', 'image')->first();
                    if($image){
                        if(isset($section['section_image']) ){
                            //&& $section->file('section_image')
                            $deletedPath = public_path($image->image_url);
                            if (file_exists($deletedPath)) {
                                unlink($deletedPath);
                            }
                            $imageName =  time() . '_' . $image->section_id . '.' . $section['section_image']->getClientOriginalExtension();
                            $path = '/assets/users/' . $user_id . '/' . $pageId . '/sections';
                            $section['section_image']->move(public_path(). $path , $imageName);
                            $image->image_url = $path . '/' . $imageName;
                            $image->save();
                            // update


                        }

                        //Nothing to do

                    }else{
                        //create image
                        $newSection = LandingPageSection::create([
                            'section_type' => $section['section_type'],
                            'section_title' => $section['section_title'],
                            'page_id' => $pageId
                        ]);

                        $imageName =  time() . '_' . $newSection->section_id . '.' . $section['section_image']->getClientOriginalExtension();
                        $path = '/assets/users/' . $user_id . '/' . $pageId . '/sections';
                        $section['section_image']->move(public_path(). $path , $imageName);
                        $newSection->image_url = $path . '/' . $imageName;
                        $newSection->save();
                    }
                    $vImage = true;
                }

                if($section['section_type'] == 'slider'){
                    $vSlider = true;
                    $slider = LandingPageSection::where('page_id', $pageId)->where('section_type', 'slider')->first();
                    if($slider){
                        if(isset($section['section_slider_images'])){
                            SliderImageController::createSliderImages($slider->section_id, $user_id, $pageId, $section['section_slider_images']);
                        }

                        if(isset($deletedSlider)){
                            $deleteIDs = json_decode('[' . $deletedSlider . ']', true);
                            SliderImageController::deleteSliderImages($slider->section_id, $deleteIDs);
                        }


                    }else{
                        $newSection = LandingPageSection::create([
                            'section_type' => $section['section_type'],
                            'section_title' => $section['section_title'],
                            'page_id' => $pageId
                        ]);
                        SliderImageController::createSliderImages($newSection->section_id, $user_id, $pageId, $section['section_slider_images']);
                    }
                    $vSlider = true;
                }

            }


            if($vText !== true){
                $text = LandingPageSection::where('page_id', $pageId)->where('section_type', 'text')->first();
                if($text){
                    $text->forceDelete();
                }
            }

            if($vYoutube !== true){
                $youtube = LandingPageSection::where('page_id', $pageId)->where('section_type', 'youtube')->first();
                if($youtube){
                    $youtube->forceDelete();
                }
            }
            if($vVimeo !== true){
                $vimeo = LandingPageSection::where('page_id', $pageId)->where('section_type', 'vimeo')->first();
                if($vimeo){
                    $vimeo->forceDelete();
                }
            }
            if($vSoundcloud !== true){
                $soundcloud = LandingPageSection::where('page_id', $pageId)->where('section_type', 'soundcloud')->first();
                if($soundcloud){
                    $soundcloud->forceDelete();
                }
            }
            if($vMap !== true){
                $map = LandingPageSection::where('page_id', $pageId)->where('section_type', 'map')->first();
                if($map){
                    $map->forceDelete();
                }
            }

            if($vImage !== true){
                $image = LandingPageSection::where('page_id', $pageId)->where('section_type', 'image')->first();
                if($image){
                    $deletedPath = public_path($image->image_url);
                    if (file_exists($deletedPath)) {
                        unlink($deletedPath);
                    }
                    $image->forceDelete();
                }
            }

            if($vSlider !== true){
                $slider = LandingPageSection::where('page_id', $pageId)->where('section_type', 'slider')->first();
                if($slider){
                    SliderImageController::deleteAllSliderImages($slider->section_id);
                    $slider->forceDelete();
                }
            }

        }else{
            // delete all
            $image = LandingPageSection::where('page_id', $pageId)->where('section_type', 'image')->first();
            if($image){
                $deletedPath = public_path($image->image_url);
                if (file_exists($deletedPath)) {
                    unlink($deletedPath);
                }
            }

            $slider = LandingPageSection::where('page_id', $pageId)->where('section_type', 'slider')->first();
            if($slider){
                SliderImageController::deleteAllSliderImages($slider->section_id);
            }

            $deleteAllSections = LandingPageSection::where('page_id', $pageId)->forceDelete();

        }

    }
}
