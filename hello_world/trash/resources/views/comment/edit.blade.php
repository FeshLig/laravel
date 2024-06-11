@extends('layout')
@section('content')
<form action="/comments/{{$comment->id}}" method="post">

    @method('PUT')
  @csrf
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" value="{{$comment->title}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Text</label>
    <textarea class="form-control" id="exampleInputPassword1" name="text">{{$comment->text}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Edit</button>
  </form>
  @endsection