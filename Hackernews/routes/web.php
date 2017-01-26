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
    Route::get('home', 'PagesController@home');
    Route::get('nothome', 'PagesController@nothome');
    Route::get('notarticle', 'PagesController@notarticle');
    Route::get('comments/{article}','PagesController@showArticle');
    Route::get('article/', 'PagesController@showArticlepage');
    Route::get('articles/{article}/edit', 'articlecontroller@editarticle');
    Route::patch('/articles/{article}','articlecontroller@updatearticle');
    Route::patch('/articles/{article}/up','articlecontroller@upvote');
    Route::patch('/articles/{article}/down','articlecontroller@downvote');
    Route::get('/articles/{article}/delete','articlecontroller@deletearticle');
    Route::get('/articles/{article}/deleteconf','articlecontroller@deletearticleconfirm');
    Route::get('/articles/{article}/cancel','articlecontroller@deletearticlecancel');
    Route::get('/comments/{comment}/delete','commentscontroler@deletecomment');
    Route::get('/comments/{comment}/deleteconf','commentscontroler@deletecommentconfirm');
    Route::get('/comments/{comment}/cancelcom','commentscontroler@cancelcom');


    Route::post('articles/{article}/comments', 'commentscontroler@store');
    Route::post('article/add', 'articlecontroller@addarticle');

    Route::get('/comments/{comment}/edit','commentscontroler@edit');
    Route::patch('/comments/{comment}','commentscontroler@update');
    Route::get('/comments/{comment}/back','commentscontroler@back');




    Auth::routes();

