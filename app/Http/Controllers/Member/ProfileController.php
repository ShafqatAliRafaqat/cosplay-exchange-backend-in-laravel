<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
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
        return view('member.pages.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5',
            'phone_no'=>'numeric|min:7|unique:profiles',
            'address'=>'string|min:10',
            'bio'=>'string|min:2',
            'username'=>'string|required|max:15|unique:profiles',
        ]);
        $profile=Profile::where('user_id','=',Auth::id())->first();
        $profile->name=$request->name;
        $profile->username=$request->username;
        $profile->phone_no=$request->phone_no;
        $profile->address=$request->address;
        $profile->bio=$request->bio;
        $filename = $request->image->getClientOriginalName();
        $tmpname = time() . $filename;
        $profile->img_name=$filename;
        $profile->img = $request->image->storeAs("profilepictures", $tmpname, "uploads");
        $profile->complete=1;
        $profile->save();
        Alert::Success('Success!','Profile Completed!');
        return redirect('/member/area');
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
    public function edit(Profile $profile)
    {
        return view('member.pages.profile.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request,$id)
    {
        $request->validate([
            'password'=>'string|min:8|confirmed',
        ]);
        $user=User::find($id);
        $user->password=Hash::make($request->password);
        $user->save();
        /*Email*/
        $request->session()->invalidate();
        return redirect('login');

    }
    public function updateEmail(Request $request, $id)
    {
        $request->validate([
            'email'=>'email|max:255|unique:users',
        ]);
        $user=User::find($id);
        $user->email=$request->email;
        $user->save();
        /*Email*/
        $request->session()->invalidate();
        return redirect('login');
    }
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name'=>'required|min:5',
            'phone_no'=>'numeric|min:7',
            'address'=>'string|min:10',
            'bio'=>'string|min:2',
        ]);
        $profile->name=$request->name;
        $profile->phone_no=$request->phone_no;
        $profile->address=$request->address;
        $profile->bio=$request->bio;
        if ($request->has('image')){
            Storage::disk('uploads')->delete($profile->img);
            $filename = $request->image->getClientOriginalName();
            $tmpname = time() . $filename;
            $profile->img_name=$filename;
            $profile->img = $request->image->storeAs("profilepictures", $tmpname, "uploads");
            $profile->save();
        }
        else{
            $profile->save();
        }
        Alert::toast('Profile Updated!','success')->autoClose(1000);
        return back();
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
