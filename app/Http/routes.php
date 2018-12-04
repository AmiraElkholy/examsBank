<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index');
    
    //
    
    Route::get('/exam', 'ExamsController@generateExam');


    Route::get('/admin/questions', 'QuestionsController@index');

    Route::get('/admin/add-question', 'QuestionsController@addForm');
    Route::post('/admin/add-question', 'QuestionsController@add');

    Route::post('/admin/questions/delete', 'QuestionsController@delete');

    Route::get('/admin/add-answers', 'AnswersController@index');
    Route::post('/admin/add-answers', 'AnswersController@createAnswer');


    Route::get('/questions', 'QuestionsController@viewQuestions');
    Route::get('/questions/{id}', 'QuestionsController@view');

    Route::post('exam/try', 'ExamsController@tryAgain');


    Route::post('score', 'ExamsController@calcScore');

    Route::get('admin/delete-answer','AnswersController@delete');


    
});

