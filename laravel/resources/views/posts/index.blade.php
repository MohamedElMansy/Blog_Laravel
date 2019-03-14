@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('posts.create')}}" class="btn btn-success">add post</a>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">posted by </th>
          <th scope="col">created at</th>
          <th scope="col"> edit</th>
          <th scope="col"> update</th>
          <th scope="col"> delete</th>
        </tr>
      </thead>
      <tbody>
      @foreach($posts as $post)
        <tr>

          <th scope="row"></th>
          <td>{{$post->title}}</td>
          <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
          <td>{{date('d-m-Y', strtotime($post->created_at))}}</td>
          <td><a href="{{route("posts.show",[ $post->id ])}}" class="btn btn-primary">View</a></td>
          <td><a href="{{route("posts.edit",[ $post->id ])}}" class="btn btn-info">update</a></td>

          <td>
            <form action="{{route('posts.destroy', [$post->id])}}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button onclick="return confirm('You want to delete this post ?')" type="submit" class="btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    </div>

    {{ $posts->links() }}
@endsection