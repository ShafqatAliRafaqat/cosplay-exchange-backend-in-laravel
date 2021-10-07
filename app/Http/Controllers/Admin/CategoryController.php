<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sr=1;
        $categories=Category::all();
        return view('back.pages.category.index',compact('sr','categories'));
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
        $request->validate([
            'name'=>'string|max:15|unique:categories',
            'image'=>'required',
        ]);
        $category=new Category();
        $category->name=ucfirst($request->name);
        $image=$request->file('image');
        $filename = $image->getClientOriginalName();
        $tmpname = time() . $filename;
        $category->img_name=$filename;
        $category->img = $image->storeAs("categoryPictures", $tmpname, "uploads");
        $category->save();
        Alert::toast('Category Created!','success');
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
    public function edit(Category $category)
    {
        return view('back.pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'string|max:15|',
        ]);
        $category->name=ucfirst($request->name);
        if ($request->has('image')){
            Storage::disk('uploads')->delete($category->img);
            $image=$request->file('image');
            $filename = $image->getClientOriginalName();
            $tmpname = time() . $filename;
            $category->img_name=$filename;
            $category->img = $image->storeAs("categoryPictures", $tmpname, "uploads");
        }
        $category->save();
        Alert::toast('Category Updated!','success');
        return redirect('admin/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category=Category::find($request->category_id);
        Storage::disk('uploads')->delete($category->img);
        $category->delete();
        Alert:toast('Category Removed!','success')->autoclose(1000);
        return redirect()->back();
    }
}
