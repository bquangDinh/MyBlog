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

    public function add_playlist(Request $request){
        $playlist = MediaService::add_playlist($request);

        $msgStatus = "success";
        $msgHeader = "Created playlist successful";
        $msgContent = "Review your playlist in media tab.";

        $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
        return view('mypages/notification_page')->with('message',(object)$messageObj);
    }

    public function get_tracks_as_json(){
        return MediaService::get_all_tracks();
    }

    public function get_images_as_json(){
        return MediaService::get_all_images();
    }

    public function get_playlists_as_json(){
        $playlists = MediaService::get_all_playlists();

        foreach($playlists as $playlist){
            $trackCount = sizeof($playlist->tracks);
            $playlist->trackCount = $trackCount;
        }

        return $playlists;
    }

    public function add_image(Request $request){
        $image = MediaService::add_image($request->file('picture_file'));
        return json_encode($image);
    }
}
