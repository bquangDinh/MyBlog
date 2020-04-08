<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use Auth;

class ArticleController extends Controller
{
    public function create_article(Request $request){
        $messageObj = null;

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
}
