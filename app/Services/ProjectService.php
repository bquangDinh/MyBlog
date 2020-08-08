<?php
namespace App\Services;

use App\Project;
use App\ProjectMusic;
use App\ProjectState;

use App\Services\MediaService;
use URL;
use Exception;

use Illuminate\Support\Facades\Storage;

class ProjectService{
    const EXPERIMENT_FOLDER = "experiments";

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

        if($request->is_launchable){
            $project->project_source_file = $request->launchable_experiment_id;
        }

        if($request->is_github_url){
            $project->github_url = $request->github_url;
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
                $project_music->single_track_id = $track_id;
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
        $states = ProjectState::where('current_state',$state)->orderBy('updated_at', 'desc')->get();
        foreach($states as $state){
            array_push($projects,$state->project);
        }

        return $projects;
    }
}
?>
