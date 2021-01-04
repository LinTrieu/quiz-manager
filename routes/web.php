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

// Show Quiz List
Route::get('/quiz', [
    'uses' =>  'QuizController@index',
    'as' => 'quiz.index',
]);

// Create a New Quiz
Route::get('/quiz/create', [
    'uses' =>  'QuizController@create',
    'as' => 'quiz.create'
]);
Route::post('/quiz', [
    'uses' => 'QuizController@store',
    'as' => 'quiz.store',
]);

// Delete a Quiz
Route::delete('/quiz/{quiz}', [
    'uses' => 'QuizController@destroy',
    'as' => 'quiz.destroy',
]);

// Show Questions in a Quiz
Route::get('/quiz/{quiz}', [
    'uses' => 'QuestionController@index',
    'as' => 'question.show',
]);

// Create a New Question
Route::get('/question/create/{quiz}', [
    'uses' => 'QuestionController@create',
    'as' => 'question.create'
]);
Route::post('/question', [
    'uses' => 'QuestionController@store',
    'as' => 'question.store',
]);

// Delete a Question
Route::delete('/question/{question}', [
    'uses' => 'QuestionController@destroy',
    'as' => 'question.destroy',
]);

// Edit a Question
Route::get('/question/{question}/edit', [
    'uses' => 'QuestionController@edit',
    'as' => 'question.edit'
]);
Route::put('/question/{question}', [
    'uses' => 'QuestionController@update',
    'as' => 'question.update'
]);
