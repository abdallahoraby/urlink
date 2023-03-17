<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPageLink;

class LandingPageLinkController extends Controller
{
    public static function createLinks($pageId, $links){
        foreach($links as $link){
            $newLink = LandingPageLink::create([
                'link_type' => $link['link_name'],
                'link_name' => $link['link_name'],
                'link_url' => $link['link_url'],
                'page_id' => $pageId
            ]);
        }
    }

    public static function updateLinks($pageId, $links){
        $deleteLinks = LandingPageLink::where('page_id', $pageId)->get();
        if($deleteLinks){
            foreach($deleteLinks as $deleteLink){
                $deleteLink->delete();
            }
        }

        if($links !== null){
            self::createLinks($pageId, $links);
        }
    }
}
