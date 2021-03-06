@extends('layouts.admin')

@section('content')

<h1>Edit post</h1>

<div class="row">

  <div class="col-sm-3">
    <img src="{{$post->photo!=null ? $post->photo->file : 'https://media.giphy.com/media/20k1punZ5bpmM/giphy.gif'}}" alt="" class="img-responsive">
  </div>

  <div class="col-sm-9">
    {!! Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files' => true]) !!}

      <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null,['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('body', 'Description:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 6]) !!}
      </div>

      <div class="form-group">
        {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-5']) !!}
      </div>

      {!! Form::close() !!}

      {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

        <div class="form-group">
          {!! Form::submit('Delete post', ['class'=>'btn btn-danger col-sm-2']) !!}
        </div>

      {!! Form::close() !!}
  </div>


</div>


  @include('includes.form-errors')

@stop
