<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\UserPermission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class QuestionController extends Controller
{
    protected $question;

    public function __construct(Question $question)
    {
        $this->middleware('auth');
        $this->question = $question;
    }

    /**
     * Displays a list of questions by quiz id
     *
     * @param Quiz $quiz
     * @return View
     */
    protected function index(Quiz $quiz): View {
        $permissionLevel = Auth::user()->permission_level;;
        $questions = $this->question->all();

        $questionsByQuizId = $questions->where('quiz_id', $quiz->id);
        return view('quiz.quiz', array('questions' => $questionsByQuizId, 'permissionLevel' => $permissionLevel, 'quiz'=>$quiz));
    }

    /**
     * Show the form for creating a new Question.
     *
     * @param Quiz $quiz
     * @return View|RedirectResponse
     */
    public function create(Quiz $quiz)
    {
        Log::debug("Quiz at QuestionController@create" . $quiz . '\n');
        $permissionLevel = Auth::user()->permission_level;
        if ($permissionLevel == UserPermission::PERMISSION_EDIT) {
            Log::debug("Quiz inside the user check" . $quiz . '\n');
            return view('question.new_question', array('quiz' => $quiz));
        }
        return redirect('/quiz/' . $quiz->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @param Quiz $quiz
     * @return RedirectResponse
     */
    public function store(Request $request, Quiz $quiz): RedirectResponse
    {
        Log::debug("Quiz at QuestionController@store" . $quiz . '\n');
        $question = new Question();
        $question->description = $request->input('question_description');
        $question->quiz_id = $quiz->id;
        //        $question->quiz_id = 1;

//        $question->answer_key = $request->input('answer_key');
//        $question->option_a = $request->input('option_a');
//        $question->option_b = $request->input('option_b');
//        $question->option_c = $request->input('option_c');
//        $question->option_d = $request->input('option_d');
//        $question->option_e = $request->input('option_e');
        $question->save();

        return redirect('/quiz/' . $quiz->id)->with('completed', 'Question has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  Question  $question
     * @return Response
     */
    public function show(Question $question): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Question  $question
     * @return Response
     */
    public function edit(Question $question): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param Question  $question
     * @return Response
     */
    public function update(Request $request, Question $question): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Question  $question
     * @return Response
     */
    public function destroy(Question $question): Response
    {
        //
    }
}
