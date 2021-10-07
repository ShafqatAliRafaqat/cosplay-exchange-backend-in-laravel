<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Costumes;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total=0;
        foreach (Cart::instance('shopping')->content() as $items){
            $total+=$items->price;
        }
        return view('front.pages.cart',compact('total'));
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

    public function clearCart()
    {
        Cart::instance('shopping')->destroy();
        Alert::success('Success!', 'Cart Cleared')->autoclose(1500);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $costume=Costumes::find($request->costume_id);
        Cart::instance('shopping')->add([
            'id' => $costume->id,
            'name' => $costume->title,
            'qty' => 1,
            'price' => $costume->price,
            'weight'=>0,
        ])->associate(Costumes::class);
//        Cart::add($request->costume_id, $costume->title, 1, $costume->price,550);
        Alert::toast('Costume Added To Cart!','success')->autoclose(800);
        return redirect('/cosplay/costume');
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
        Cart::instance('shopping')->remove($id);
        Alert::toast('Costume Removed!', 'success')->autoclose(800);
        return redirect('/cosplay/cart');
    }
}
