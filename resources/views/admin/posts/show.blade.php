@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-start ">
  <div class="row d-flex flex-column justify-content-center align-items-start">
    <div>{{ $post->id }}</div>
    <div>{{ $post->title }}</div>
    <div>{{ $post->slug }}</div>
    <div>@if ($post->category)
      {{$post->category->name}}      
    @endif</div>
    <div>
      @foreach ($post->tags as $tag)
        {{$tag->name}}
      @endforeach
    </div>
    <div><a class="btn btn-info btn-sm" href="{{route('admin.posts.index')}}">back</a></div>
  </div>
</div>

@endsection