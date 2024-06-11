@extends('layout')
@section('content')

    @if($errors->any())
    <div class="alert-danger">
        <ul>
        @foreach($errors->all() as $error)
        <li>
        {{$error}}
    </li>
    @endforeach
    </ul>
    </div>
    @endif

<form action="/article/{{$article->id}}" method="post">
  
    @csrf
    @method("PUT")
<div class="form-group">
    <label for="exampleInputName">Date</label>
    <input type="date" class="form-control" id="exampleInputData" name="date" value="{{$article->date}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputTitle" name="name" value="{{$article->name}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" class="form-control" id="exampleInputDescription" name="desc" value="{{$article->desc}}">
  </div>
  <button type="save" class="btn btn-primary">Save</button>
</form>

@endsection