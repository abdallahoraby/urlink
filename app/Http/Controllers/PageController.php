<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{

    public static function updatePage($page_id, $page_data){
        $page_update = Page::where('id', $page_id)->update(
            [
                'title' => $page_data['page_title'],
                'content' => $page_data['page_content'],
            ]
        );

        return $page_update;
    }


    public static function uploadPageImages($image){

        $imageName = time() . $image->getClientOriginalName();
        $newPath = '/assets/img/images/';
        $image->move(public_path(). $newPath , $imageName);
        $imageName = $newPath . $imageName;

        return $imageName;
    }


}
