<?php
namespace App\Services;

use App\Project;
use App\ProjectMusic;
use App\ProjectState;

use App\Services\MediaService;
use URL;
use Exception;

class ProjectService{
    public static function create_project($request,$author_id){
        $title = $request->project_name;
        $language_id = $request->project_language;
        $type_id = $request->project_type;
        $cover_id = $request->cover_id;
        $cover_file = $request->file('cover_file');
        $content = $request->project_content;
        $description = $request->description;

        //calculate reading time
        $time = str_word_count($content) / 300;
        $total_seconds = intval($time) * 60 + intval(($time - intval($time)) * 60);
        $duration = $total_seconds;

        $project = new Project;
        $project->title = $title;
        $project->language_id = $language_id;
        $project->type_id = $type_id;
        $project->author_id = $author_id;
        
        if($cover_id != ""){
            $project->cover_id = $cover_id;
        }else if($cover_file != null){
            $image = MediaService::add_image($cover_file);
            $project->cover_id = $image->id;
        }

        $project->content = $content;
        $project->description = $description;
        $project->duration = $duration;

        //add project folder source
        $files = $request->file('project_folder');

        if($request->hasFile('project_folder')){
            $view_folder = resource_path('views');
            $folder_name = $request->project_folder_name;
            $folder_path = $view_folder.'/projects/'.$folder_name;
            $resource_path = public_path('projects').'/'.$folder_name;

            //find the index.blade.php
            $isHasIndex = false;
            foreach($files as $file){
                if($file->getClientOriginalName() == "index.blade.php"){
                    $isHasIndex = true;
                    break;
                }
            }

            if(!file_exists($folder_path)){
                mkdir($folder_path);
            }

            if(!file_exists($resource_path)){
                mkdir($resource_path);
            }

            if($isHasIndex == false){
                throw new Exception('This folder doesnt contain a index blade file');
            }

            foreach($files as $file){
                if($file->getClientOriginalName() == "index.blade.php"){
                    $file->move($folder_path,"index.blade.php");
                }else{
                    $file->move($resource_path, $file->getClientOriginalName());
                }
            }

            $project->project_source_file = $folder_name.'/index';

        }else{
            throw new Exception('File request is empty');
        }

        $project->save();

        $project_state = new ProjectState;
        $project_state->project_id = $project->id;
        
        if($request->submit_btn == "publish"){
            $project_state->current_state = "Published";
        }else{
            $project_state->current_state = "Saved";
        }
        
        $project_state->save();

        //add music 
        $track_id = $request->track_id;
        $playlist_id = $request->playlist_id;

        if($playlist_id != "" || $track_id != ""){
            $project_music = new ProjectMusic;

            $project_music->project_id = $project->id;

            if($playlist_id != ""){
                $project_music->playlist_id = $playlist_id;
            }
            
            if($track_id != ""){
                $article_music->single_track_id = $track_id;
            }

            $project_music->save();
        }

        return $project;
    }

    public static function get_project_by_id($id){
        return Project::find($id);
    }

    public static function get_projects_by_state($state){
        if($state == null){
            return Project::all();
        }

        $projects = array();
        $states = ProjectState::where('current_state',$state)->get();
        foreach($states as $state){
            array_push($projects,$state->project);
        }

        return $projects;
    }
}
?>