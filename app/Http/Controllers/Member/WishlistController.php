<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Wishlist::where('user_id',Auth::id())->first();
        return view('front.pages.wishlist',compact('items'));
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
        dd($request->all());
        $listExists=Wishlist::where('user_id',Auth::id())->get();
        if($listExists->isEmpty())
        {
            $wishlist=new Wishlist();
            $wishlist->user_id=Auth::id();
            $wishlist->costumes_id=$request->costume_id;
            $wishlist->thumbnail=$request->thumbnail;
            $wishlist->save();
            Alert::toast('Costume Added To Wishlist!','success')->autoclose(800);
            return redirect('/cosplay/costume');
        }
        else
            {
                $oldWishlist=Wishlist::where('user_id',Auth::id())->where('costumes_id',$request->costume_id)->get();
                if ($oldWishlist->isEmpty())
                {
                    $wishlist=new Wishlist();
                    $wishlist->user_id=Auth::id();
                    $wishlist->costumes_id=$request->costume_id;
                    $wishlist->thumbnail=$request->thumbnail;
                    $wishlist->save();
                    Alert::toast('Costume Added To Wishlist!','success')->autoclose(800);
                    return redirect('/cosplay/costume');
                }
                else
                    {
                        Alert::toast('Costume Present In Wishlist!','error')->autoclose(1000);
                        return redirect('/cosplay/costume');
                }
            }

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
        //
    }
}
