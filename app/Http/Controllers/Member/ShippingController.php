<?php

namespace App\Http\Controllers\Member;

use App\Events\ShippingDetailsEvent;
use App\Http\Controllers\Controller;
use App\Models\Costumes;
use App\Models\Shipping;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $shipment=new Shipping();
        $shipment->exchange_id=$request->exchange_id;
        $shipment->tracking_number=$request->tracking_number;
        $shipment->tracking_link=$request->tracking_link;
        $shipment->postal_service=$request->postal_service;
        $shipment->save();
        event(new ShippingDetailsEvent(User::find($shipment->exchange->user_id),$shipment->exchange->costumes->title,$shipment));
        Alert::toast('Shipment details added!','success');
        return redirect('/member/costume');
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
    public function edit(Shipping $shipping)
    {
       return view('member.pages.costume.edit-shipping',compact('shipping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        $shipping->tracking_number=$request->tracking_number;
        $shipping->tracking_link=$request->tracking_link;
        $shipping->postal_service=$request->postal_service;
        $shipping->save();
        Alert::toast('Shipment details Updated!','success');
        return redirect('/member/costume');
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
