<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class CoinController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.pages.coin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.pages.coin.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = \Stripe\Charge::create(array(
                'amount' => $request->amount *100, // Amount in cents!
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Coin Purchase for Cosplay-Exchange'
            ));
        } catch(\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            Alert::Error('Oops!','An error occurred with the message: '.$e->getError()->message.'');
            return redirect('member/coin');
        } catch (\Stripe\Exception\RateLimitException $e) {
            Alert::Error('Oops!','An error occurred with the message: '.$e->getError()->message.'');
            return redirect('member/coin');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            Alert::Error('Oops!','An error occurred with the message: '.$e->getError()->message.'');
            return redirect('member/coin');
        } catch (\Stripe\Exception\AuthenticationException $e) {
            Alert::Error('Oops!','An error occurred with the message: '.$e->getError()->message.'');
            return redirect('member/coin');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            Alert::Error('Oops!','An error occurred with the message: '.$e->getError()->message.'');
            return redirect('member/coin');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            Alert::Error('Oops!','An error occurred with the message: '.$e->getError()->message.'');
            return redirect('member/coin');
        } catch (Exception $e) {
            Alert::Error('Oops!','An error occurred with the message: '.$e->getError()->message.'');
            return redirect('member/coin');
        }

        $payment=new Payment();
        $payment->payment_id=$charge->id;
        $payment->payer_id=Auth::id();
        $payment->payer_email=Auth::user()->email;
        $payment->amount=$request->amount;
        $payment->currency=$charge->currency;
        $payment->payment_status=$charge->status;
        $payment->save();
        $coin=Coin::where('user_id',Auth::id())->first();
        $coin->purchased_coins+=$request->amount;
        $coin->available_coins+=$request->amount;
        $coin->save();

        Alert::Success('Success!','Your transaction id is:'.$charge->id);
        return redirect('member/coin');
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
