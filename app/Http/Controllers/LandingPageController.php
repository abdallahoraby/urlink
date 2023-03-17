<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;

use App\Http\Controllers\SliderImageController;
use App\Http\Controllers\LandingStyleController;

class LandingPageController extends Controller
{
    public static function createLandingPage($request){

        $validPageName = str_replace(array(" ","/", "\\"), "-", $request['page_name']);
        $url = url(strtolower($validPageName));
        $loop = 0;
        while(true){
            $pageName = LandingPage::where('page_url', $url)->first();
            if($pageName){
                $url .= $loop;
                $loop++;
            }else{
                break;
            }
        }
        $defaultStyleId = LandingStyleController::defaultStyle();
        $newLandingPage = LandingPage::create([
            'page_account_type' => $request['account_type'],
            'page_name' => $request['page_name'],
            'page_title' => $request['page_title'],
            'page_country' => $request['country'],
            'page_city' => $request['city'],
            'page_profile_icon' => '0',
            'page_contact_email' => $request['page_contact_email'],
            'page_contact_phone' => $request['page_contact_phone'],
            'page_brief' => $request['page_brief'],
            'page_desc' => $request['page_desc'],
            'page_url' => $url ,
            'user_id' => $request->user()->user_id,
            'style_id' => $defaultStyleId
        ]);
        $profileIconName = 'profile_icon.' . $request['page_profile_icon']->getClientOriginalExtension();
        $path = '/assets/users/' . $request->user()->user_id . '/' . $newLandingPage->landing_page_id;
        $request['page_profile_icon']->move(public_path(). $path , $profileIconName);
        $newLandingPage->page_profile_icon = $path . '/' . $profileIconName ;
        if($request->has('page_profile_banner') && !empty($request->file('page_profile_banner')) && $request->file('page_profile_banner') != null ){
            $profileBannerName = 'profile_banner.' . $request['page_profile_banner']->getClientOriginalExtension();
            $request['page_profile_banner']->move(public_path().  $path , $profileBannerName);
            $newLandingPage->page_profile_banner = $path . '/' . $profileBannerName;
        }

        $newLandingPage->save();
        //$newLandingPage->update(['page_url' => $newLandingPage->page_url . '-' . $newLandingPage->landing_page_id]);

        $links = $request['links'];
        //dd($links);
        if($links !== null){
            LandingPageLinkController::createLinks($newLandingPage->landing_page_id, $links);
        }

        $sections = $request['sections'];
        if($sections !== null){
            LandingPageSectionController::createSections($newLandingPage->landing_page_id, $request->user()->user_id, $sections);
        }

        return $newLandingPage->page_url;
    }

    public static function updateLandingPage($request, $landingPageId){
        //dd($request);

        $landingPage = LandingPage::with('links')->with('sections')->find($landingPageId);
        if($landingPage && $landingPage->user_id == $request->user()->user_id){

            if($request->filled('account_type') !== null && $request->input('account_type') !== $landingPage->page_account_type){
                $landingPage->page_account_type = $request['account_type'];
            }


            if($request['page_name'] !== null && $request->input('page_name') !== $landingPage->page_name){
                $validPageName = str_replace(array(" ","/", "\\"), "-", $request['page_name']);
                $url = url(strtolower($validPageName));
                $landingPage->page_name = $request['page_name'];
            }


            if($request['page_title'] !== null && $request->input('page_title') !== $landingPage->page_title)
                $landingPage->page_title = $request['page_title'];

            if($request['country'] !== null && $request->input('country') !== $landingPage->page_country)
                $landingPage->page_country = $request['country'];

            if($request['city'] !== null && $request->input('city') !== $landingPage->page_city)
                $landingPage->page_city = $request['city'];

            if($request['page_contact_email'] !== null && $request->input('page_contact_email') !== $landingPage->page_contact_email)
                $landingPage->page_contact_email = $request['page_contact_email'];

            if($request['page_contact_phone'] !== null && $request->input('page_contact_phone') !== $landingPage->page_contact_phone)
                $landingPage->page_contact_phone = $request['page_contact_phone'];

          /*   if($request['page_brief'] !== null)
                $landingPage->page_brief = $request['page_brief'];

            if($request['page_desc'] !== null)
                $landingPage->page_desc = $request['page_desc'];
 */
            $profile_icon = $request->file('page_profile_icon');
            if($profile_icon !== null){
                $path = public_path($landingPage->page_profile_icon);
                if (file_exists($path)) {
                    unlink($path);
                }
                $profileIconName = 'profile_icon.' . $request['page_profile_icon']->getClientOriginalExtension();
                $path = '/assets/users/' . $request->user()->user_id . '/' . $landingPage->landing_page_id;
                $request['page_profile_icon']->move(public_path(). $path , $profileIconName);
                $landingPage->page_profile_icon = $path . '/' . $profileIconName;
            }

            $profile_banner = $request->file('page_profile_banner');
            if($profile_banner != null){
                if($landingPage->page_profile_banner != null){
                    $path = public_path($landingPage->page_profile_banner);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
                $bannerPath = '/assets/users/' . $request->user()->user_id . '/' . $landingPage->landing_page_id;
                $profileBannerName = 'profile_banner.' . $request['page_profile_banner']->getClientOriginalExtension();
                $request['page_profile_banner']->move(public_path().  $bannerPath , $profileBannerName);
                $landingPage->page_profile_banner = $bannerPath . '/' . $profileBannerName;
            }elseif($request->input('deleted_banner') == 'true'){
                if($landingPage->page_profile_banner){
                    $path = public_path($landingPage->page_profile_banner);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }

                $landingPage->page_profile_banner = null;
                $landingPage->save();
            }

            LandingPageLinkController::updateLinks($landingPage->landing_page_id, $request['links']);
            /* if($request->filled('links') !== null){

            }else{

            } */

            $sections = $request['sections'];
            $deletedSlider = $request->input('2s');
            LandingPageSectionController::updateSections($landingPage->landing_page_id, $request->user()->user_id, $sections, $deletedSlider);
  /*    if($sections !== null){
                LandingPageSectionController::updateSections($landingPage->landing_page_id, $request->user()->user_id, $sections);
            } */

            $landingPage->save();
        }else{
            return 0;
        }

    }

    public static function getLandingPagesById($userId, $landingPageId = null){
        if($landingPageId === null){
            $data = LandingPage::where('user_id', $userId)->get();
        }else{
            $data = LandingPage::where('landing_page_id', $landingPageId)->where('user_id', $userId)->first();
        }
        return $data;
    }

    public static function getLandingPagesByURL($pageUrl){
        $landingPage = LandingPage::with('links')->with('sections')->where('page_url', url($pageUrl))->first();
        if(!empty($landingPage->sections)){
            $output = array();
            foreach($landingPage->sections as $section){
                $data = array(
                    'section_type' => $section->section_type,
                    'section_title' => $section->section_title
                );
                if($section->section_type == 'slider'){
                    $urls =SliderImageController::getSliderImagesBySectionId($section->section_id);
                    $data['section_url'] = $urls;
                }else if($section->section_type == 'text'){
                    $data['section_content'] = $section->section_content;

                }else if($section->section_type == 'image'){
                    $data['section_url'] = $section->image_url;
                }else if($section->section_type == 'youtube'){
                    $data['section_url'] = $section->youtube_url;
                }else if($section->section_type == 'vimeo'){
                    $data['section_url'] = $section->vimeo_url;
                }else if($section->section_type == 'soundcloud'){
                    $data['section_url'] = $section->soundcloud_url;
                }

                array_push($output, $data);

            }
            $landingPage->sections = $output;
            $landingPage->style_name = $landingPage->style->style_name;
        }
        return $landingPage;
    }

    public static function updateStyle($userId, $page_id, $style_id){
        $data = LandingPage::where('landing_page_id', $page_id)->where('user_id', $userId)->update(['style_id' => $style_id]);
        return 0;
    }

    public static function getPageStatistics($page_id){
        $data = LandingPage::where('landing_page_id', $page_id)->with('user')->first();
        $data['full_name'] = $data->user->full_name;
        $data['avatar'] = ($data->user->avatar != null) ? $data->user->avatar : '/assets/img/default_profile_image.png';
        return $data;
    }
}
