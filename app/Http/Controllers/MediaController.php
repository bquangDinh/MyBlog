<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MediaService;

class MediaController extends Controller
{
    public function add_track(Request $request){
        $track = MediaService::add_track($request);

        $msgStatus = "success";
        $msgHeader = "Track uploaded successful";
        $msgContent = "";

        $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
        return view('mypages/notification_page')->with('message',(object)$messageObj);
    }
}
