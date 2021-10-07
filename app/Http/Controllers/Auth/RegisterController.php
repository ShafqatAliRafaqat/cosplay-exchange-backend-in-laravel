<?php

namespace App\Http\Controllers\Auth;

use App\Events\NewMemberRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Models\Profile as ProfileAlias;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo(){
        if (Auth::user()->role_id==1){
            return 'admin/dashboard';
        }
        else{
           // return 'member/area';
            return 'home/index';
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       /* $this->middleware('guest');*/
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       return Validator::make($data, [
            'username' => ['required', 'string',  'max:255', 'unique:profiles'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
       /* 'bio' => ['required','string'],
            'phone_no' => ['numeric'],
             'photo' => ['mimes:jpeg,jpg,png,gif','max:10000'],*/
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try {
            $user = User::create([
                'email' => $data['email'],
                'ship_receiver_name' => $data['ship_receiver_name'],
                'password' => Hash::make($data['password']),
            ]);
            $address = $data['street_address'] . ',' . $data['city'] . ',' . $data['zip'];
            $filename = $data['photo']->getClientOriginalName();
            $tmpname = time() . $filename;
            $profileimg = $data['photo']->storeAs("profilepictures", $tmpname, "uploads");

            if ($user) {
                ProfileAlias::create([
                    'username' => $data['username'],
                    'user_id' => $user->id,
                    'bio' => $data['bio'],
                    'phone_no' => $data['phone_no'],
                    'img_name' => $filename,
                    'img' => $profileimg,
                    'address' => $address,
                ]);
                Coin::create([
                    'user_id' => $user->id
                ]);
            }
          //  event(new NewMemberRegisteredEvent($user));
            return $user;
        }
        catch (\Exception $e) {
                Log::info("Register user exception.  " . $e->getMessage() . "" . $e->getline() . "" . $e->getFile());
                return redirect($this->redirectPath());
            }
    }
}
