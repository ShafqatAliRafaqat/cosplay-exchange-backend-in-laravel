<?php

namespace App\Http\Controllers\Member;

use App\Events\NewCostumeEvent;
use App\Events\ShippingDeliveredEvent;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Costumes;
use App\Models\Picture;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        $statuses=Status::all();
        $costumes=Costumes::where('user_id','=',Auth::id())->get();
        return view('member.pages.costume.index',compact('sr','costumes','statuses'));
    }

    public function search(Request $request){
       // dd($request->all());
        if (empty($request->costume)) {
            Alert::toast('Invalid search reference ','error');
            return back();
        }
        $costumes = Costumes::orWhere('title','LIKE',  '%' . $request->costume. '%' )
            ->orWhere('slug','LIKE', '%' . $request->costume. '%' )
            ->orWhere('description','LIKE', '%' . $request->costume. '%' )
            ->orWhere('material','LIKE', '%' . $request->costume. '%' );

        if ($costumes->count() >= 1) {
            $costumes = $costumes->get();
            $sr=1;
            $statuses=Status::all();
            return view('member.pages.costume.search', compact('costumes','sr','statuses'));
        } else {
            Alert::toast('Costume not found!','error');
            return back();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $profile = 1;
        return view('member.pages.costume.create',compact('categories','profile'));
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
            'title'=>'string|min:5|unique:costumes',
            'description'=>'string|required',
            'measurement'=>'string|required',
        ]);
        $costume=new Costumes();
        if($request->has('damaged')){
            $request->validate([
                'damagedPictures'=>'required',
            ]);
            $costume->damage=1;
        }
        $request->material!=null?$costume->material=$request->material:$costume->material='unknown';
        $costume->user_id=Auth::id();
        $costume->title=$request->title;
        $costume->slug=Str::slug($request->title,'-');
        $costume->description=$request->description;
        $costume->measurements=$request->measurement;
        $costume->size=$request->size;
        $costume->status_id=1;
        $costume->condition=$request->condition;
        $costume->price=$request->price;
        $costume->save();
        foreach ($request->file('pictures') as $image){
            $filename = $image->getClientOriginalName();
            $tmpname = time() . $filename;
            $picture=new Picture();
            $picture->costumes_id=$costume->id;
            $picture->img_name=$filename;
            $picture->img = $image->storeAs("costumePictures", $tmpname, "uploads");
            $picture->save();
        }
        if($request->has('damagedPictures')){
            foreach ($request->file('damagedPictures') as $image){
                $filename = $image->getClientOriginalName();
                $tmpname = time() . $filename;
                $picture=new Picture();
                $picture->costumes_id=$costume->id;
                $picture->type=1;
                $picture->img_name=$filename;
                $picture->img = $image->storeAs("costumePictures", $tmpname, "uploads");
                $picture->save();
            }
        }
        $costume->categories()->sync($request->categories);
        Alert::toast('Costume Added!','success');
        event(new NewCostumeEvent());
        return redirect('member/costume');
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
    public function edit(Costumes $costume )
    {
        $categories=Category::all();
        return view('member.pages.costume.edit',compact('costume','categories'));
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
//        dd($request->all());
        if($request->has('damaged')){
            $request->validate([
                'damagedPictures'=>'required',
            ]);
            $costume->damage=1;
        }
        $costume->title=$request->title;
        $costume->slug=Str::slug($request->title,'-');
        $request->material!=null?$costume->material=$request->material:$costume->material='unknown';
        $costume->description=$request->description;
        $costume->measurements=$request->measurement;
        $costume->size=$request->size;
        $costume->condition=$request->condition;
        if($costume->is_approved==0){
        $costume->price=$request->price;
        }
        $costume->save();
        if ($request->has('pictures')){
            foreach (Picture::where('costumes_id',$costume->id)->where('type',0)->get() as $normalImage)
            {
            Storage::disk('uploads')->delete($normalImage->img);
            $normalImage->delete();
            }
            foreach ($request->file('pictures') as $image){
                $filename = $image->getClientOriginalName();
                $tmpname = time() . $filename;
                $picture=new Picture();
                $picture->costumes_id=$costume->id;
                $picture->img_name=$filename;
                $picture->img = $image->storeAs("costumePictures", $tmpname, "uploads");
                $picture->save();
            }
        }
        if($request->has('damagedPictures')){
            foreach (Picture::where('costumes_id',$costume->id)->where('type',1)->get() as $damageImage)
            {
                Storage::disk('uploads')->delete($damageImage->img);
                $damageImage->delete();
            }
            foreach ($request->file('damagedPictures') as $image){
                $filename = $image->getClientOriginalName();
                $tmpname = time() . $filename;
                $picture=new Picture();
                $picture->costumes_id=$costume->id;
                $picture->type=1;
                $picture->img_name=$filename;
                $picture->img = $image->storeAs("costumePictures", $tmpname, "uploads");
                $picture->save();
            }
        }
        $costume->categories()->sync($request->categories);
        Alert::toast('Costume Updated!','success');
        return redirect('member/costume');
    }
    public function updateStatus(Request $request)
    {
        $costume=Costumes::find($request->status_id);
        if($request->status==4)
        {
            $costume->is_delivered=1;
            event(new ShippingDeliveredEvent($costume->title));
        }
        $costume->status_id=$request->status;
        $costume->save();
        Alert::toast('Status Updated!','success');
        return redirect()->back();
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
        Alert::toast('Costume Removed!','success');
        return redirect('/member/costume');
    }
}
