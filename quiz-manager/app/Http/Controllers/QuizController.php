<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\UserPermission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * @return View|RedirectResponse
     */
    public function create()
    {
        $permissionLevel = Auth::user()->permission_level;
        if ($permissionLevel == UserPermission::PERMISSION_EDIT) {
            return view('quiz.new_quiz');
        }
        return redirect('/quiz');
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

    /**
     * Delete the specified Quiz from database.
     *
     * @param int $quizId
     * @return Response
     */
    public function destroy(int $quizId): RedirectResponse
    {
        $quiz = Quiz::find($quizId);
        $permissionLevel = Auth::user()->permission_level;

        if ($permissionLevel == UserPermission::PERMISSION_EDIT) {
            $quiz->delete();
            return redirect('/quiz')->with('success', 'Successfully deleted your quiz!');
        }
        return redirect('/quiz')->with('error', 'You are not authorized to delete this quiz');
    }

    // NOTE: below lists all laravel auto-generated controller methods
    /**
     * Display the specified resource.
     *
     * @param  Quiz  $quiz
     * @return Response
     */
    public function show(Quiz $quiz): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Quiz  $quiz
     * @return Response
     */
    public function edit(Quiz $quiz): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Quiz  $quiz
     * @return Response
     */
    public function update(Request $request, Quiz $quiz): Response
    {
        //
    }
}
