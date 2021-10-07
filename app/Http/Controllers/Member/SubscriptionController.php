<?php

namespace App\Http\Controllers\Member;

use App\Events\MemberSubscribedEvent;
use App\Events\MemberUnsubscribedEvent;
use App\Models\Coin;
use App\Models\Payment;
use App\Models\Plans;
use Braintree\Gateway;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Stripe\Stripe;

class SubscriptionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.pages.subscription.index');
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

        if (Auth::user()->subscribed('main')){
            Alert::Error('You Are Already Subscribed!','Error!');
            return redirect()->back();
        }
        else{
            try {
                Stripe::setApiKey(env('STRIPE_SECRET'));

                $user = User::find(Auth::id());
                $user->newSubscription('main','plan_GqeJoLNWooQhFm')->trialDays(90)->create($request->stripeToken);

                Alert::Success('Success!','You Have Subscribed!');
                event(new MemberSubscribedEvent(Auth::user()));
                return redirect()->back();
            } catch (\Exception $ex) {
                Alert::Error('Oops!','The following error has occured:'.$ex->getMessage());
                return redirect()->back();
            }
        }
    }
    public function cancel()
    {
        $date=Carbon::now()->addMonths(1);
       Auth::user()->subscription('main')->cancel();
       event(new MemberUnsubscribedEvent(Auth::user()));
        Alert::Success('Success!','Your subscription will end on '.$date->toDateString());
        return redirect()->back();
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
