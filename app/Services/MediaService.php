<?php
namespace App\Services;
use App\Music;
use URL;

class MediaService{
    const MEDIA_FOLDER = "sources/media/musics";

    public static function get_all_tracks(){
        return Music::all();
    }

    public static function add_track($request){
        $trackFile = $request->file('track_file');
        $trackTitle = $request->track_title;

        /*Move track file to folder*/
        $ext = $trackFile->getClientOriginalExtension();
        $name = uniqid('track_').'_'.time().'.'.$ext;
        $storedFolder = public_path(MediaService::MEDIA_FOLDER);

        if(!file_exists($storedFolder)){
            mkdir($storedFolder);
        }

        $trackFile->move($storedFolder,$name);

        /*New model*/
        $track = new Music;
        $track->title = $trackTitle;
        $track->source = URL::asset(MediaService::MEDIA_FOLDER.'/'.$name);
        $track->type = $ext;
        $track->save();

        return $track;
    }
}

?>