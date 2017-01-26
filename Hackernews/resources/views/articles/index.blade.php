@extends('mainpage')
@section('content')
    <div class="col-lg-12">
        @if(Session::has('flash_message'))
            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
            @elseif(Session::has('flash_error'))
            <div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><em> {!! session('flash_error') !!}</em></div>
        @endif
        <h1>article overview</h1>
    </div>

    @foreach($articles as $article)
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-1">
                    <div class="vote">
                        <form action="/articles/{{$article->id}}/up" method="POST">
                            {{csrf_field()}}
                            {{ method_field('PATCH') }}
                            @if(Auth::user())
                            <button >
                                <i class="glyphicon glyphicon-chevron-up" title="upvote"></i>
                            </button>
                            @else
                                <i class="glyphicon glyphicon-chevron-up" title="you need to be logged in to vote"></i>
                            @endif
                        </form>
                        <form action="/articles/{{$article->id}}/down" method="POST">
                            {{csrf_field()}}
                            {{ method_field('PATCH') }}
                            @if(Auth::user())
                            <button>
                                <i class="glyphicon glyphicon-chevron-down" title="downvote"></i>
                            </button>
                            @else
                                <i class="glyphicon glyphicon-chevron-down" title="you need to be logged in to vote"></i>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="col-lg-10">
                    <h3><a href="{{$article->url}}">{{$article->title}}</a></h3>
                    <p>{{$article->votes}} points | placed on {{$article->updated_at}}| created by <span>{{$article->User->name}}</span>  |
                    @if($article->comments->count()==1)
                        <a href="/comments/{{$article->id}}">{{$article->comments->count()}} comment</a>
                    @else
                        <a href="/comments/{{$article->id}}">{{$article->comments->count()}} comments</a>
                    @endif
                        @if(Auth::id()===$article->user_ID)
                        <a href="/articles/{{$article->id}}/edit"><button type="submit" class="btn btn-primary btn-xs">edit</button></a>
                            @endif
                    </p>
                </div>
            </div>

        </div>
    @endforeach

@endsection