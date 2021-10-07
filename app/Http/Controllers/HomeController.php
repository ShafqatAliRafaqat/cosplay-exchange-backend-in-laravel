<?php

namespace App\Http\Controllers;

use App\Models\UserEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*  public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function saveUserEmails(Request $request){
            $userEmails = new UserEmails();
            $userEmails->email = $request->email;
            $userEmails->save();

            return back();
     }

     public function home(){
        return view('newHome.index');
     }
}
