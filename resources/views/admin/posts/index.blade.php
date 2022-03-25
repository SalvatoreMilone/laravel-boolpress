@extends('layouts.app')


@section('content')
<a class="btn btn-info btn-sm" href="{{route('admin.posts.create')}}">create</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titolo</th>
        <th scope="col">Slug</th>
        <th scope="col">Categoria</th>
        <th scope="col">Tag</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->slug }}</td>
            <td>{{ $post->category? $post->category->name : 'none'}}</td>
            <td>
                @foreach ($post->tags as $tag)
                    {{$tag->name}}
                @endforeach
            </td>
            <td>
                <a class="btn btn-info btn-sm" href="{{route('admin.posts.show', ['post' => $post->id])}}">Show</a>
                <a class="btn btn-info btn-sm" href="{{route('admin.posts.edit', ['post' => $post->id])}}">Edit</a>
                <form class="d-inline-block" action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  @endsection