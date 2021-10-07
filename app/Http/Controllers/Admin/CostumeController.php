<?php

namespace App\Http\Controllers\Admin;

use App\Events\NewCostumeStatusEvent;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coin;
use App\Models\Costumes;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CostumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sr=1;
        $costumes=Costumes::all();
        return view('back.pages.costume.costume.index',compact('sr','costumes'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Costumes $costume)
    {
        $categories=Category::all();
        return view('back.pages.costume.costume.edit',compact('costume','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costumes $costume)
    {
        $request->validate([
            'status'=>'required',
            'value'=>'numeric|min:1'
        ]);
        $costume->is_approved=$request->status;
        $costume->price=$request->value;
        $costume->save();
        $coin=Coin::where('user_id',$costume->user->id)->first();
        $coin->locked_coins+=$request->value;
        $coin->save();
        !$request->status?event(new NewCostumeStatusEvent($costume->user,$costume->title,'Rejected')):event(new NewCostumeStatusEvent($costume->user,$costume->title,'Approved'));
        Alert::toast('Costume Updated!','success');
        return redirect('/admin/costume');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $costume=Costumes::find($request->costume_id);
        foreach (Picture::where('costumes_id',$costume->id)->get() as $images){
            Storage::disk('uploads')->delete($images->img);
            $images->delete();
        }
        $costume->categories()->detach();
        $costume->delete();
        event(new NewCostumeStatusEvent($costume->user,$costume->title,'Removed'));
        Alert::toast('Costume Removed!','success');
        return redirect('/admin/costume');
    }
}
