<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\UserPermission;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PhpParser\Node\Expr\BinaryOp\Identical;

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
        $permissionLevel = Auth::user()->permission_level;
        if ($permissionLevel == UserPermission::PERMISSION_EDIT) {
            return view('question.new_question', array('quiz_id' => $quiz->id));
        }
        return redirect('/quiz/' . $quiz->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $quizId = $request->get('quiz_id');

        $question = new Question();
        $question->description = $request->input('question_description');
        $question->quiz_id = $quizId;
        $question->answer_key = $request->input('answer_key');
        $question->option_a = $request->input('option_a');
        $question->option_b = $request->input('option_b');
        $question->option_c = $request->input('option_c');
        if ($request->input('option_d')) {
            $question->option_d = $request->input('option_d');
        }
        if ($request->input('option_e')) {
            $question->option_e = $request->input('option_e');
        }
        $question->save();

        return redirect('/quiz/'.$quizId)->with('completed', 'Question has been saved');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Question $question): RedirectResponse
    {
        $quizId = $question->quiz_id;
        $permissionLevel = Auth::user()->permission_level;

        if ($permissionLevel == UserPermission::PERMISSION_EDIT) {
            $question->delete();
            return redirect('/quiz/'.$quizId)->with('success', 'Successfully deleted your question!');
        }
        return redirect('/quiz/'.$quizId)->with('error', 'You are not authorized to delete this question');
    }

    /**
     * Show the form for editing the specified Question.
     *
     * @param  Question  $question
     * @return View|RedirectResponse
     */
    public function edit(Question $question): View
    {
        $permissionLevel = Auth::user()->permission_level;
        $quizId = $question->quiz_id;

        if ($permissionLevel == UserPermission::PERMISSION_EDIT) {
            return View('question.edit_question', array('question' => $question));
        }
        return redirect('/quiz/'.$quizId)->with('error', 'You are not authorized to edit this question');
    }

    // NOTE: below lists all laravel auto-generated controller methods
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
}
