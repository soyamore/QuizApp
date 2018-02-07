<?php

Route::controllers(['auth' => 'Auth\AuthController']);

Route::group(['middleware' => 'auth'], function() {

    Route::resource('users', 'UserController');
    Route::resource('tests', 'TestController');
    Route::resource('quizzes', 'QuizController');

    Route::get('/quizzes/{quizzes}/delete', [
        'as' => 'quizzes.delete',
        'uses' => 'QuizController@destroy'
    ]);

    Route::get('/quizzes/{quizzes}/examinees', [
        'as'   => 'quizzes.examinees',
        'uses' => 'QuizController@examinees'
    ]);

    Route::post('/quizzes/{quizzes}/examinees/add', [
        'as'   => 'quizzes.examinees.add',
        'uses' => 'QuizController@addExaminee'
    ]);

    Route::get('/tests/{tests}/result', [
        'as'   => 'tests.result',
        'uses' => 'TestController@result'
    ]);

    Route::get('/tests/examinees/all', [
        'as'   => 'tests.examinees',
        'uses' => 'TestController@examinees'
    ]);

    Route::get('/tests/examinees/{examinee}', [
        'as'   => 'tests.examinees.tests',
        'uses' => 'TestController@examineeTests'
    ]);

    Route::get('/question', function() {
        $i = Input::get('question_number');

        return view('partials.question', compact('i'));
    });

    Route::get('/', ['uses' => 'QuizController@index']);
});