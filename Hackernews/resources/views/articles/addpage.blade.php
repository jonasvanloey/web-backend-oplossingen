@extends('mainpage')
@section('content')
    <div class="col-lg-12">
        <h1>add an article</h1>
    </div>

   <div class="col-lg-12">
       <form action="/article/add" method="POST">
           {{ csrf_field() }}
           <div class="form-group">
               <label for="title">Title:</label><br>
               <input type="text" name="title" id="title" class="form-control"><br>
               <label for="url">Url:</label><br>
               <input type="text" name="url" id="url" class="form-control"><br>

           </div>
           <div class="form-group">
               <button type="submit" class="btn btn-primary">Add article</button>
           </div>
       </form>
   </div>

@endsection