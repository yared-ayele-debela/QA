<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Models\Question;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

        return redirect()->route('questions.index')->with('success','Questions has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
//        dd($question);
//        $question=Question::findOrFail($slug);

        $question->increment('views');
        return view('Frontend.pages.questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {

        return view('Frontend.pages.questions.edit',compact('question'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        try {

            Gate::authorize('update',$question);

        $question->update($request->only('title','body'));

        return redirect()->route('questions.index')->with('success','Questions has been updated successfully!');
        } catch (AuthorizationException $e) {
            // Option 1: Show a custom view
        return response()->view('errors.custom-unauthorized', [], 403);

            // Option 2: Redirect with flash message
            // return redirect()->route('home')->with('error', 'You are not authorized to edit this question.');
        }

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        try {

            Gate::authorize('delete',$question);

        $question->delete();
        return redirect()->route('questions.index')->with('success','Questions has been deleted successfully!');

    } catch (AuthorizationException $e) {
    // Option 1: Show a custom view
return response()->view('errors.custom-unauthorized', [], 403);

    // Option 2: Redirect with flash message
    // return redirect()->route('home')->with('error', 'You are not authorized to edit this question.');
}
    }
}
