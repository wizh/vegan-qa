<?php

namespace App\Http\Controllers;

use App\Question;

use View;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private static $placeholder_questions = array(
        "Where do you get your protein?",
        "Do you ever miss meat?",
        "What do you eat?"
    );

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return View::make("questions.index")->with(array(
            'questions' => $questions,
            'placeholder_questions' => self::$placeholder_questions
        ));
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
            'question_text' => ['required','min:5','endsWith:?'],
        ]);
        $question = new Question([
            'question_text' => $request->get('question_text'),
            'answers' => [],
        ]);
        $question->save();

        return redirect('/')->with('success', 'Question saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('questions.show', compact('question'));
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
        $request->validate([
            'answer_text' => ['required','min:5'],
        ]);

        $question = Question::where('id', $id)->first();
        $original_answers = $question->answers;
        array_push($original_answers, $request->answer_text);
        $question->answers = $original_answers;
        $question->save();

        return redirect('/questions/'.$id)->with('success', 'Answer saved!');
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
