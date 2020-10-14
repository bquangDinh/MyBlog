<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProjectService;
use Auth;

class ProjectController extends Controller
{
    public function create(Request $request){
        /*
        $emptyContent = "<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>";

        $request->validate([
            'article_name' => 'string|required',
            'description' => 'string',
            'article_content' => 'string|required|not_in:'.$emptyContent
        ]);
            */

        $messageObj = array('header' => '', 'status' => '', 'content' => '');

        if(Auth::check()){
            try{
                $project = ProjectService::create_project($request,Auth::user()->id);

                $msgStatus = "success";
                $msgHeader = "Project  was created successfully";
                $msgContent = "";

                $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
            } catch (Exception $e)
            {
                $msgStatus = "error";
                $msgHeader = "Something went wrong !!!";
                $msgContent = "Please create your project again. ".$e->getMessage();

                $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
            }
        }else{
            $msgStatus = "error";
            $msgHeader = "User is not authorized";
            $msgContent = "Please log in again to continue";

            $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
        }

        return view('mypages/notification_page')->with('message',(object)$messageObj);
    }

    public function update_project(Request $request){
        $emptyContent = "<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>";

        $request->validate([
            'project_name' => 'string|required',
            'description' => 'string',
            'project_content' => 'string|required|not_in:'.$emptyContent
        ]);

        $messageObj = array('header' => '', 'status' => '', 'content' => '');

        if(Auth::check()){
            try{
                $project = ProjectService::update_project($request);

                $msgStatus = "success";
                $msgHeader = "Project was updated successfully";
                $msgContent = "";

                $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
            }catch(Exception $e){
                $msgStatus = "error";
                $msgHeader = "Something went wrong !!!";
                $msgContent = "Please update your project again. ".$e->getMessage();

                $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
            }
            
        }else{
            $msgStatus = "error";
            $msgHeader = "User is not authorized";
            $msgContent = "Please log in again to continue";

            $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
        }

        return view('mypages/notification_page')->with('message',(object)$messageObj);
    }
}
