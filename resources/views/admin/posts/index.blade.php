@extends('layouts.admin')

@section('content')

<h1>Posts</h1>

<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Owner</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>
    </thead>
    <tbody>
      @if($posts)
          @foreach($posts as $post)
              <tr>
                  <td>{{$post->id}}</td>
                  <td><img height="50" src="{{$post->photo!=null ? $post->photo->file : 'https://media.giphy.com/media/20k1punZ5bpmM/giphy.gif'}}" alt=""></td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                  <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                  <td>{{str_limit($post->body,15)}}</td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>
              </tr>
          @endforeach
      @endif

    </tbody>
  </table>

@stop
