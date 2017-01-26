@extends('mainpage')
@section('content')
    @if(Session::has('flash_delete'))
        <div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><em> {!! session('flash_delete') !!}</em><a href="/articles/{{$article->id}}/deleteconf" class="btn btn-danger btn-xs">confirm delete</a><a href="/articles/{{$article->id}}/cancel" class="btn btn-xs">cancel</a></div>
    @endif
    <h1>edit your article</h1>
    <div class="col-lg-12">
        <form action="/articles/{{$article->id}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="title">Title:</label><br>
                <input type="text" name="title" id="title" class="form-control" value="{{$article->title}}"><br>
                <label for="url">Url:</label><br>
                <input type="text" name="url" id="url" class="form-control" value="{{$article->url}}"><br>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">edit article</button>

            </div>
        </form>
        <a href="/articles/{{$article->id}}/delete" class="btn btn-danger btn-xs">delete article</a>
    </div>

@stop