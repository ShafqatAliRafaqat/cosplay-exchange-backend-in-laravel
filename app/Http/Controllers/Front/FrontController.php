<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coin;
use App\Models\Costumes;
use App\Models\Post;
use App\Models\QuestionAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;

class FrontController extends Controller
{
    public function index()
    {
        // $categories=Category::all();
        // return view('front.index',compact('categories'));
        return view('comming.index');
    }
    public function dev()
    {
        $categories=Category::all();
        return view('front.index',compact('categories'));
        // return view('comming.index');
    }
    public function contact()
    {
          return view('front.pages.contact');
    }
    public function termsAndConditions()
    {
        return view('front.pages.terms-conditions');
    }
    public function faq()
    {
        $questions=QuestionAnswer::all();
        return view('front.pages.faq',compact('questions'));
    }
    public function forum()
    {
        $posts=Post::where('is_approved',1)->orderBy('created_at', 'desc')->paginate(5);
        return view('forum.index',compact('posts'));
    }
    public function forumSearch(Request $request)
    {
        $posts = Post::where('title', 'LIKE', '%' . $request->topic . '%')->paginate(5);
        return view('forum.index',compact('posts'));
    }

    public function notifyMail(Request $request)
    {
        $post = (object)$_POST;
        // print_r($request); die;
        if( !empty($post))
        {
            if( !empty( $post->email ) )
            {
                $to = $post->email;
                $subject = "Notify ". $post->email ." on web Resum";

                $message = "
                <html>
                <head>
                <title>Cosplay</title>
                </head>
                <body>
                <p> Hi, </p>
                <h2>This is and informal mail to tell you that this email '". $post->email."' ask for remindar when site resum.</h2>
                </body>
                </html>
                ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <tradeyourcosplay@gmail.com>' . "\r\n";

                try {
                    mail($to,$subject,$message,$headers);
                } catch (Exception $e) {
                    die(json_encode($e));
                }
                if(mail($to,$subject,$message,$headers))
                    die(json_encode(['status' => 'success', 'message' => 'email send ok']));
            }
        }
        die(json_encode(['status' => 'success', 'message' => 'email send no']));
    }
}
