<?php

namespace App\Http\Controllers;

use App\article;
use App\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller{



    public function home(){

       $articles = article::with('User','comments')->orderBy('votes','desc')->get()->values()->all();
        return view('articles.index', compact('articles'));

    }
    public function nothome(){


    session()->flash('flash_error', "This page doesn't exist,please try again.");
    return redirect('home');

}public function notarticle(){


    session()->flash('flash_error', "This page doesn't exist,please try again.");
    return redirect('home');

}
    public function showArticle(article $article){


           return view('comments.show', compact('article'));

}

    public function showArticlepage(){
        if (!Auth::guest()) {
            return view('articles.addpage', compact('articles'));
        }
        else
        {
            return redirect()->route('login');
        }

    }

}
