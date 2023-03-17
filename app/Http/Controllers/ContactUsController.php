<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public static function createContuctUsMessage($data, $userId){
        $newMessage = ContactUs::create([
            'sender_name' => $data['name'],
            'sender_email' => $data['email'],
            'message' => $data['content']
        ]);
        if($userId != null){
            $newMessage->user_id = $userId;
            $newMessage->save();
        }
    }
}
