<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class QuizController extends Controller
{
    protected $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->middleware('auth');
        $this->quiz = $quiz;
    }

    /**
     * Display a list of all Quizzes.
     *
     * @return View
     */
    public function index(): View
    {
        $permissionLevel = Auth::user()->permission_level;
        $quizzes = $this->quiz->all();

        return view('quiz.quiz_list', array( 'quizzes' => $quizzes, 'permissionLevel' => $permissionLevel));
    }

    /**
     * Show the form for creating a new Quiz.
     *
     * @return View
     */
    public function create(): View
    {
        return view('quiz.new_quiz');
    }

    /**
     * Store a newly created Quiz in database.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $quiz = new Quiz();
//        $quiz->title = $request->get('quiz_title');
        $quiz->title = $request->input('quiz_title');
        $quiz->save();

        return redirect('/quiz')->with('completed', 'Quiz has been saved');

    }

    // NOTE: below lists all laravel auto-generated controller methods
    /**
     * Display the specified resource.
     *
     * @param  \App\models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
