<?php
namespace App\Services;

use App\Music;
use App\Playlist;
use App\MusicPlaylist;
use App\Media;

use URL;

class MediaService{
    const MEDIA_FOLDER = "sources/media";
    const MUSIC_FOLDER = "musics";
    const PICTURE_FOLDER = "images";

    public static function get_all_tracks(){
        return Music::all();
    }

    public static function get_all_playlists(){
        return Playlist::all();
    }

    public static function add_track($request){
        $trackFile = $request->file('track_file');
        $trackTitle = $request->track_title;

        /*Move track file to folder*/
        $ext = $trackFile->getClientOriginalExtension();
        $name = uniqid('track_').'_'.time().'.'.$ext;
        $storedFolder = public_path(MediaService::MEDIA_FOLDER.'/'.MediaService::MUSIC_FOLDER);

        if(!file_exists($storedFolder)){
            mkdir($storedFolder);
        }

        $trackFile->move($storedFolder,$name);

        /*New model*/
        $track = new Music;
        $track->title = $trackTitle;
        $track->source = URL::asset(MediaService::MEDIA_FOLDER.'/'.MediaService::MUSIC_FOLDER.'/'.$name);
        $track->type = $ext;
        $track->save();

        return $track;
    }

    public static function add_playlist($request){
        $playlist_name = $request->playlist_title;
        $playlist_description = $request->playlist_description;
        $selectedTracks = json_decode($request->selected_tracks);

        $playlist = new Playlist;
        $playlist->name = $playlist_name;
        $playlist->description = $playlist_description;
        $playlist->save();

        foreach($selectedTracks as $track_id){
            $musicPlaylist = new MusicPlaylist;
            $musicPlaylist->playlist_id = $playlist->id;
            $musicPlaylist->music_id = $track_id;
            $musicPlaylist->save();
        }

        return $playlist;
    }

    public static function add_image($imageFile){
        $status = "public";
        $ext = $imageFile->getClientOriginalExtension();
        $name = uniqid('image_').'_'.time().'.'.$ext;
        $storedFolder = public_path(MediaService::MEDIA_FOLDER.'/'.MediaService::PICTURE_FOLDER.'/public');
        
        if(!file_exists($storedFolder)){
            mkdir($storedFolder);
        }

        $imageFile->move($storedFolder,$name);

        $media = new Media;
        $media->url = URL::asset(MediaService::MEDIA_FOLDER.'/'.MediaService::PICTURE_FOLDER.'/public/'.$name);
        $media->type = 'image';
        $media->status = $status;
        $media->save();

        return $media;
    }

    public static function get_all_images(){
        return Media::where('type','image')->where('status','public')->get();
    }
}

?>