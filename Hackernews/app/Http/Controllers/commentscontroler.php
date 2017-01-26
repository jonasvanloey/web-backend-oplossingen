<?php

namespace App\Http\Controllers;


use App\article;
use App\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentscontroler extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index']]);
    }

    /**
     * @return string
     */
    public function store(article $article)
    {

        $comment  = new comment();
        $userid = Auth::id();
        $comment->user_ID= $userid;
        $comment->text = request()->text;
        $article->comments()->save($comment);

        return back();

    }
    public function deletecomment(comment $comment,article $article)
    {

            $articleid=$comment->article_ID;
            session()->flash('flash_delete','Are you sure you want to delete this comment.');
            return view('comments.show', compact('comment','article'));


    }
    public function cancelcom(comment $comment){
        $articleid = $comment->article_ID;
        return redirect('comments/'.$articleid);
    }
public function deletecommentconfirm(comment $comment)
    {
        try{
            $articleid = $comment->article_ID;
            $comment->delete();
            session()->flash('flash_message','successfully deleted your comment.');
            return redirect('comments/'.$articleid);
        }
        catch (\Exception $e){
            session()->flash('flash_error', 'Something went wrong while deleting your comment, try again.');
            return back();
        }
    }



    /**
     * @return string
     */
    public function edit(comment $comment)
    {
         if($comment->user_ID===Auth::id()){
                return view('comments.edit',compact('comment'));
            }
            else{
                return redirect()->route('login');
            }



        }

    public function update(Request $request, comment $comment)
    {
        try{
            $comment->update($request->all());
            $article=$comment->article_ID;
            session()->flash('flash_message','successfully edited your comment.');
            return view('comments.edit',compact('comment','article'));
        }
        catch (\Exception $e){
            session()->flash('flash_error', 'Something went wrong while editing your comment, try again.');
            return back();
        }

    }

    /**
     * @return string
     */
    public function back(comment $comment)
    {
        $articleid = $comment->article_ID;
        return redirect('/comments/'.$articleid);
    }
}
