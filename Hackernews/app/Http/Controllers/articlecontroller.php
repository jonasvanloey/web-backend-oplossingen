<?php

namespace App\Http\Controllers;
use App\article;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class articlecontroller extends Controller
{
    //

public function addarticle()
{
    try {
        $article = new article();
        $userid = Auth::id();
        $article->user_ID = $userid;
        $article->title = request()->title;
        $article->url = request()->url;
        $article->save();
        session()->flash('flash_message', 'successfully added ' . $article->title . '.');
        return redirect('home');
    }
    catch (\Exception $e){
        session()->flash('flash_error', 'Something went wrong while adding your article, try again.');
        return redirect('home');
    }

}
public function editarticle(article $article)
{
    if($article->user_ID===Auth::id()){
        return view('articles.edit',compact('article'));
    }
    else{
        return redirect()->route('login');
    }
}
public function updatearticle(Request $request, article $article)
{
    try{
        $article->update($request->all());
        session()->flash('flash_message','successfully updated '.$article->title.'.');
        return back();
    }
    catch (\Exception $e){
        session()->flash('flash_error', 'Something went wrong while updating your article, try again.');
        return back();
    }

}
public function upvote(article $article)
{
    try{
        $article->increment('votes');
        session()->flash('flash_message','successfully upvoted '.$article->title.'.');
        return back();
    }
    catch (\Exception $e){
        session()->flash('flash_error', 'Something went wrong while upvoting your article, try again.');
        return back();
    }

}
public function downvote(article $article)
{
    try{
        $article->decrement('votes');
        session()->flash('flash_message','successfully downvoted '.$article->title.'.');
        return back();
    }
    catch (\Exception $e){
        session()->flash('flash_error', 'Something went wrong while downvoting your article, try again.');
        return back();
    }

}
public function deletearticle(article $article)
{
    session()->flash('flash_delete','Are you sure you want to delete this comment.');
    return view('articles.edit',compact('article'));

}
public function deletearticlecancel(article $article)
{

    return redirect('articles/'.$article->id.'/edit');

}
public function deletearticleconfirm(article $article)
{
    try{
        $article->delete();
        session()->flash('flash_message','successfully deleted '.$article->title);
        return redirect('home');
    }
    catch (\Exception $e){
        session()->flash('flash_error', 'Something went wrong while deleting your article, try again.');
        return redirect('home');
    }

}
}
