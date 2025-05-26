<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestinsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions=Question::latest()->paginate(5);

        return view('Frontend.pages.questions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Frontend.pages.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AskQuestionRequest $request)
    {
//        dd("works");
          $request->user()->questions()->create($request->only('title','body'));
//        $question=new Question();
//        $question->title= $request->title;
//        $question->body= $request->body;
//        $question->save();

        return redirect()->route('questions.index')->with('success','Questions has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
