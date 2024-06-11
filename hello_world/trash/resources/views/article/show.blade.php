@extends('layout')
@section('content')


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$article->name}}</h5>
    <h5 class="card-text">{{$article->desc}}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <div class ="btn-group">
    <a href="/article/{{$article->id}}/edit" class="btn btn-primary">Edit article</a>
    <form action ="/article/{{$article->id}}" method="post">
        @method("DELETE")
        @csrf
        <button type="submit" class = "btn btn-danger"> Delete acticle</button>
        </form>             
    </div>
  </div>
</div>
<h4>Comments</h4>
<form action="/comments" method="post"> 
    @csrf
    <input type="hidden" name="article_id" value="{{$article->id}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputTitle" name="title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea name="text" class="form-control" id="" cols="30" rows="10"></textarea>
  </div>
  <button type="save" class="btn btn-primary">Create comment</button>
</form>
@foreach($comments as $comment)
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$comment->title}}</h5>
    <h5 class="card-text">{{$comment->text}}</h5>
    @can('comment',$comment)
    <div class ="btn-group">
    <a href="/comments/{{$comment->id}}/edit" class="btn btn-primary">Edit comment</a>
    <form action ="/comments/{{$comment->id}}" method="post">
        @method("DELETE")
        @csrf
        <button type="submit" class = "btn btn-danger"> Delete comment</button>
        </form>             
    </div>
    @endcan
  </div>
</div>
@endforeach
@endsection