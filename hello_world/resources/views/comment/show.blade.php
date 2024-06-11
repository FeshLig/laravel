@extends('layout')
@section('content')

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

@endsection