<?php

namespace App\Http\Controllers\Forum;

use App\Models\Comment;
use App\Models\Post;
use ConsoleTVs\Profanity\Facades\Profanity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::where('user_id',Auth::id())->paginate(5);
        return view('forum.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('forum.pages.post.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required',
        ]);
        $post=new Post();
        $post->user_id=Auth::id();
        $post->title=Profanity::blocker($request->title)->filter();
        $post->description=Profanity::blocker($request->description)->filter();
        $post->hashtags=$request->hashtags;
        $post->save();
        Alert::Success('Post Submitted!');
        return redirect('/member/forum');
//        return Profanity::blocker($words)->filter();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if($post->user->id != Auth::id())
        {
            $post->views++;
            $post->save();
        }
        $comments=Comment::where('post_id',$post->id)->orderby('created_at','asc')->get();
        return view('forum.pages.post.index',compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
//        dd($post->hashtags!=null);
        return view('forum.pages.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'description'=>'required',
        ]);
        $post->title=Profanity::blocker($request->title)->filter();
        $post->description=Profanity::blocker($request->description)->filter();
        $post->hashtags=$request->hashtags;
        $post->save();
        Alert::Success('Post Updated!');
        return redirect('/member/forum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if (Post::find($request->post_id)->comments()->count() > 0)
        {
            foreach (Comment::where('post_id',$request->post_id)->get() as $comment)
            {
                $comment->delete();
            }
        }
        Post::find($request->post_id)->delete();
        Alert::Success('Post Removed!');
        return redirect('/member/forum');

    }
}
