<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MediaService;

class MediaController extends Controller
{
    public function add_track(Request $request){
        $request->validate([
            'track_title' => 'string|required',
            'track_file' => 'required|file|max:5000'
        ]);

        $messageObj = array('header' => '', 'status' => '', 'content' => '');

        try{
            $track = MediaService::add_track($request);

            $msgStatus = "success";
            $msgHeader = "Track uploaded successful";
            $msgContent = "";

            $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
        }catch(Exception $e){
            $msgStatus = "error";
            $msgHeader = "Failed to upload track";
            $msgContent = "Please reset the page and try again. ".$e->getMessage();

            $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
        }
        
        return view('mypages/notification_page')->with('message',(object)$messageObj);
    }

    public function add_playlist(Request $request){
        $request->validate([
            'playlist_title' => 'string|required',
            'playlist_description' => 'string'
        ]);
        
        $messageObj = array('header' => '', 'status' => '', 'content' => '');

        try{
            $playlist = MediaService::add_playlist($request);

            $msgStatus = "success";
            $msgHeader = "Created playlist successful";
            $msgContent = "Review your playlist in media tab.";

            $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
        }catch(Exception $e){
            $msgStatus = "error";
            $msgHeader = "Failed to create playlist";
            $msgContent = "Something went wrong.".$e->getMessage();

            $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
        }
        
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
        $request->validate([
            'picture_file' => 'required|file|mimes:jpg,jpeg,png,gif'
        ]);
        
        $image = MediaService::add_image($request->file('picture_file'));
        return json_encode($image);
    }

    public function update_playlist(Request $request){
        $request->validate([
            'playlist_title' => 'string|required',
            'playlist_description' => 'string'
        ]);
        
        $messageObj = array('header' => '', 'status' => '', 'content' => '');
        
        try{
            $playlist = MediaService::update_playlist($request);

            $msgStatus = "success";
            $msgHeader = "Successfully updated playlist";
            $msgContent = "";

            $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
            
        }catch(Exception $e){
            $msgStatus = "error";
            $msgHeader = "Failed to update playlist";
            $msgContent = "Please reset the page and try again";

            $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
        } 

        return view('mypages/notification_page')->with('message',(object)$messageObj);
    }
}
