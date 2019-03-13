@extends('layouts.app')

@section('content')

    <div class="container">
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" type="text" class="form-control" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label >Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label >Post Creator</label>
            <select class="form-control" name="user_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
    </form>
    </div>
@endsection