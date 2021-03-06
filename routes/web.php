<?php

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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
// Route::get('/contact', 'PagesController@contact');
Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');

Route::get('/ticket', 'TicketsController@index');
Route::get('/ticket/{slug}', 'TicketsController@show');
Route::get('/ticket/{slug}/edit', 'TicketsController@edit');
Route::post('/ticket/{slug}/edit', 'TicketsController@update');
Route::post('/ticket/{slug?}/delete','TicketsController@destroy');

Route::post('/comment', 'CommentsController@newComment');
Route::get('/sendemail', function () {

    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails/welcome', $data, function ($message) {

        $message->from('turkane.sparsh@gmail.com', 'Learning Laravel');

        $message->to('rajaturkane99@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});
