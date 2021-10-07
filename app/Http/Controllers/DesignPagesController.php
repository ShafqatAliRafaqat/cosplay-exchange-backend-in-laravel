<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignPagesController extends Controller
{
    public function subscriptionDashboard(){
        return view('designerPages.dashboard');
    }
    public function profileForm(){
        return view('designerPages.profile');
    }
    public function subscription(){
        return view('designerPages.subscription');
    }
}
