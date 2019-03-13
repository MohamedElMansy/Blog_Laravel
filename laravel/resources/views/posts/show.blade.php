@extends('layouts.app')

@section('content')
    <div class="container">
        <div
            <label>Title</label>
            <label>{{$post->title}}</label>
        </div>
        <div>
            <label>Description</label>
            <label>{{$post->description}}</label>
        </div>
         <a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
    </div>
@endsection