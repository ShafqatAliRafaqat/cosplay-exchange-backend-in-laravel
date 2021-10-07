<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuestionAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class QuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=QuestionAnswer::all();
        $sr=1;
        return view('back.pages.questionanswer.index',compact('questions','sr'));
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
            'question'=>'required',
            'answer'=>'required'
        ]);
        $question=new QuestionAnswer();
        $question->question=$request->question;
        $question->answer=$request->answer;
        $question->save();
        Alert::toast('Question Created!','success');
        return redirect('/admin/questions');
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
        $question=QuestionAnswer::find($id);
        return view('back.pages.questionanswer.edit',compact('question'));
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
        $question=QuestionAnswer::find($id);
        $question->question=$request->question;
        $question->answer=$request->answer;
        $question->save();
        Alert::toast('Question Updated!','success');
        return redirect('/admin/questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        QuestionAnswer::find($request->question_id)->delete();
        Alert::toast('Question Removed!','success');
        return redirect('/admin/questions');
    }
}
