<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Costumes;
use Illuminate\Http\Request;

class CostumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumes=Costumes::where('is_approved',1)->where('request_status',0)->get();
        $categories=Category::all();
        return view('front.pages.costume',compact('costumes','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function search(Request $request)
    {
//        dd($request->all());
        if($request->coin==null)
        {
            $costumes = Costumes::where('title', 'LIKE', '%' . $request->name . '%')->where('size', 'LIKE', '%' . $request->size . '%')->where('is_approved',1)->where('request_status',0)->get();
        }
        else
        {
            $costumes = Costumes::where('title', 'LIKE', '%' . $request->name . '%')->where('price', '<=', $request->coin)->where('size', 'LIKE', '%' . $request->size . '%')->where('is_approved',1)->where('request_status',0)->get();

        }
//        dd($costumes);
        $categories = Category::all();
        return view('front.pages.costume',compact('costumes','categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Costumes $costume)
    {
        $allCostumes=Costumes::where('user_id',$costume->user->id)->where('is_approved',1)->get();
        return view('front.pages.costume-single',compact('costume','allCostumes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
