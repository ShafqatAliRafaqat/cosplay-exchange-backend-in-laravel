<?php

namespace App\Http\Controllers\Member;

use App\Events\CostumeRequestStatusEvent;
use App\Events\NewCostumeRequestEvent;
use App\Models\Coin;
use App\Models\Costumes;
use App\Models\Exchange;
use App\Notifications\User\NewCostumeRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchanges=Exchange::where('user_id',Auth::id())->get();
        $sr=1;
        return view('member.pages.requests.index',compact('exchanges','sr'));
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
        $total=0;
        foreach (Cart::instance('shopping')->content() as $item)
        {
            $costume=Costumes::find($item->id);
            $exchange=new Exchange();
            $exchange->user_id=Auth::id();
            $exchange->costumes_id=$item->id;
            $exchange->address=$request->address;
            $exchange->phone_no=$request->phone;
            $exchange->deadline=Carbon::now()->addHours(48);
            $exchange->save();
            $total+=$costume->price;
            event(new NewCostumeRequestEvent($costume->user,$costume->title));
        }
        $coins=Coin::where('user_id',Auth::id())->first();
        $coins->available_coins-=$total;
        $coins->save();
        Cart::instance('shopping')->destroy();
        Alert::Success('Success!','User has been notified');
        return redirect('/cosplay/costume ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exchanges=Exchange::where('costumes_id',$id)->where('status','<',3)->get();
        $sr=1;
        return view('member.pages.costume.exchange',compact('exchanges','sr'));
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
        $exchanges=Exchange::where('costumes_id',$request->costume_id)->get();
        foreach ($exchanges as $exchange)
        {
            if($exchange->id != $id)
            {
                $refund=Coin::where('user_id',$exchange->user_id)->first();
                $refund->available_coins+=$exchange->costumes()->first()->price;
                $refund->save();
                $exchange->status=3;
                $exchange->save();
                event(new CostumeRequestStatusEvent($refund->user,$exchange->costumes->title,'Rejected'));
            }
            else
                {
                    $exchange->status=2;
                    $exchange->save();
                    $user=User::find($exchange->user_id);
                    event(new CostumeRequestStatusEvent($user,$exchange->costumes->title,'Accepted'));
                }
        }
        $costume=Costumes::find($request->costume_id);
        $costume->request_status=1;
        $costume->status_id=2;
        $costume->save();
        Alert::toast('Request Accepted!','success!');
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
        //
    }
}
