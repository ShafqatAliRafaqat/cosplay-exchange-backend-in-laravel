<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Costumes;
use App\Models\Picture;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    public function index(){

            $sr=1;
            $statuses=Status::all();
            $costumes=Costumes::where('user_id','=',Auth::id())->where('is_approved',0)->get();
            Alert::toast('Welcome Back ','success')->autoClose(1000);
            return view('member.index',compact('sr','statuses','costumes'));


    }

    public function home(){
            $sr=1;
            $statuses=Status::all();
            $costumes=Costumes::where('user_id','=',Auth::id())->where('is_approved',0)->get();
            $costumes_images = Picture::orderBy('id', 'desc')->take(6)->get();
            Alert::toast('Welcome Back ','success')->autoClose(1000);
            return view('member.pages.home',compact('sr','statuses','costumes','costumes_images'));
    }

    public function editPassword(){
            return view('member.pages.profile.editpassword');
    }
    public function editEmail(){
            return view('member.pages.profile.editemail');
    }

    public function area()
    {
        return view('member.pages.area');
    }


}
