<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Coin;
use App\Models\Costumes;
use App\Models\Exchange;
use App\Models\Picture;
use App\Models\Question;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DeliveredCostumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sr=1;
        $costumes=Costumes::where('is_delivered',1)->get();
        return view('back.pages.costume.delivered.index',compact('sr','costumes'));
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
    public function edit($id)
    {
        $costume=Costumes::find($id);
        $exchange=Exchange::where('costumes_id',$costume->id)->get();
        dd($exchange);
    }
    public function refundBoth($id)
    {
        $questions=Question::where('costumes_id',$id)->get();
        foreach ($questions as $question)
        {
            foreach ($question->answers()->get() as $answer)
            {
                $answer->delete();
            }
            $question->delete();
        }
        $costume=Costumes::find($id);
        Shipping::where('exchange_id',$costume->exchanges()->where('status',2)->first()->id)->first()->delete();
        $exchanges=Exchange::where('costumes_id',$costume->id)->get();
        foreach ($exchanges as $exchange)
        {
            $coin=Coin::where('user_id',$exchange->user_id)->first();
            $coin->available_coins+=$costume->price;
            $coin->save();
            $exchange->delete();
        }
        $coin=Coin::where('user_id',$costume->user_id)->first();
        $coin->locked_coins-=$costume->price;
        $coin->available_coins+=$costume->price;
        $coin->save();
        foreach (Picture::where('costumes_id',$costume->id)->get() as $images){
            Storage::disk('uploads')->delete($images->img);
            $images->delete();
        }
        $costume->categories()->detach();
        $costume->delete();
        Alert::Success('Done!','Success!');
        return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $questions=Question::where('costumes_id',$id)->get();
        foreach ($questions as $question)
        {
            foreach ($question->answers()->get() as $answer)
            {
                $answer->delete();
            }
            $question->delete();
        }
        $costume=Costumes::find($id);
        Shipping::where('exchange_id',$costume->exchanges()->where('status',2)->first()->id)->first()->delete();
        $exchanges=Exchange::where('costumes_id',$costume->id)->get();
        foreach ($exchanges as $exchange){ $exchange->delete();}
        $coin=Coin::where('user_id',$costume->user_id)->first();
        $coin->locked_coins-=$costume->price;
        $coin->available_coins+=$costume->price;
        $coin->save();
        foreach (Picture::where('costumes_id',$costume->id)->get() as $images){
            Storage::disk('uploads')->delete($images->img);
            $images->delete();
        }
        $costume->categories()->detach();
        $costume->delete();
        Alert::Success('Done!','Success!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $costume=Costumes::find($id);
        $costume->is_delivered=0;
        $costume->status_id=2;
        $costume->save();
        Alert::toast('Costume Updated','success');
        return redirect()->back();
    }
}
