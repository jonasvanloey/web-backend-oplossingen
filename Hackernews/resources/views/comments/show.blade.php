@extends('mainpage')
@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
    @elseif(Session::has('flash_error'))
        <div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><em> {!! session('flash_error') !!}</em></div>
    @elseif(Session::has('flash_delete'))
        <div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><em> {!! session('flash_delete') !!}</em><a href="/comments/{{$comment->id}}/deleteconf" class="btn btn-danger btn-xs">confirm delete</a><a href="/comments/{{$comment->id}}/cancelcom" class="btn btn-xs">cancel</a></div>
    @endif
<h2>{{ $article->title }}</h2>
    @foreach($article->comments as $comment)
        <div class="row">
            <div class="col-lg-12">
                <p>{{$comment->text}}</p>
                <p><p>placed on {{$comment->updated_at}} | created by {{$comment->User->name}}
                        @if($comment->user_ID === Auth::id())
                        <a href="/comments/{{$comment->id}}/edit"> <button type="submit" class="btn btn-primary btn-xs"> edit</button></a>
                        <a href="/comments/{{$comment->id}}/delete" class="btn btn-danger btn-xs ">delete</a>
                            @endif

                </p>

            </div>
        </div>


    @endforeach
@if (!Auth::guest())
    <h3>add a comment</h3>
    <form action="/articles/{{$article->id}}/comments" method="POST">
        {{ csrf_field() }}
            <div class="form-group">
            <textarea name="text" id="" cols="60" rows="5" ></textarea>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Add comment</button>
            </div>
    </form>
    @else
    <p>You need to be <a href="/login">logged in</a> to comment</p>
    @endif
    @stop