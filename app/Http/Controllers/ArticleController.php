<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use Auth;

class ArticleController extends Controller
{
    public function create_article(Request $request){
        $emptyContent = "<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>";

        $request->validate([
            'article_name' => 'string|required',
            'description' => 'string',
            'article_content' => 'string|required|not_in:'.$emptyContent
        ]);

        $messageObj = array('header' => '', 'status' => '', 'content' => '');

        if(Auth::check()){
            try{
                $article = ArticleService::create_article($request,Auth::user()->id);

                $msgStatus = "success";
                $msgHeader = "Article was created successfully";
                $msgContent = "";

                $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
            } catch (Exception $e)
            {
                $msgStatus = "error";
                $msgHeader = "Something went wrong !!!";
                $msgContent = "Please create your article again. ".$e->getMessage();

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

    public function hide_article($id){
        $status = ArticleService::hide_article($id);
        return $status;
    }

    public function unhide_article($id){
        $status = ArticleService::unhide_article($id);
        return $status;
    }

    public function delete_article(Request $request){
        $status = ArticleService::delete_article($request->article_id);
        return $status;
    }

    public function update_article(Request $request){
        $emptyContent = "<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>";

        $request->validate([
            'article_name' => 'string|required',
            'description' => 'string',
            'article_content' => 'string|required|not_in:'.$emptyContent
        ]);

        $messageObj = array('header' => '', 'status' => '', 'content' => '');

        if(Auth::check()){
            try{
                $article = ArticleService::update_article($request);

                $msgStatus = "success";
                $msgHeader = "Article was updated successfully";
                $msgContent = "";

                $messageObj = array('header' => $msgHeader, 'status' => $msgStatus, 'content' => $msgContent);
            }catch(Exception $e){
                $msgStatus = "error";
                $msgHeader = "Something went wrong !!!";
                $msgContent = "Please update your article again. ".$e->getMessage();

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
