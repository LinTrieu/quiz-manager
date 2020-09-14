<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false, // Registration Routes
    'reset' => false, // Password Reset Routes
    'verify' => false, // Email Verification Routes
]);

// generic laravel scaffolding, remove if no issues.
//Route::get('/home', 'HomeController@index')->name('home');

// Show Quiz List
Route::get('/quiz', [
    'uses' =>  'QuizController@index',
    'as' => 'quiz.index',
]);

// Create a New Quiz
Route::get('/quiz/create', 'QuizController@create');
Route::post('/quiz/store',[
    'uses' => 'QuizController@store',
    'as' => 'quiz.store',
]);

// Create a New Question
Route::get('/quiz/{quiz_id}/create', [
    'uses' => 'QuestionController@create',
    'as' => 'question.create'
]);
Route::post('/quiz/{quiz_id}/store',[
    'uses' => 'QuestionController@store',
    'as' => 'question.store',
]);


// Delete a Quiz
Route::delete('/quiz/{quiz_id}', [
   'uses' => 'QuizController@destroy',
   'as' => 'quiz.destroy',
]);

// Show Questions in a Quiz
Route::get('/quiz/{quiz}', [
    'uses' => 'QuestionController@index',
    'as' => 'question.show',
]);
