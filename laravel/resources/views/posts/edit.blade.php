@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{route('posts.update',[ $post->id ])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input name="title" value="{{$post->title}}" type="text" class="form-control" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label >Description</label>
                <textarea name="description" class="form-control"> {{$post->description}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
        </form>
    </div>
@endsection