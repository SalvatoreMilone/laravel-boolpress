@extends('layouts.app')

@section('content')

<div><a class="btn btn-info btn-sm" href="{{route('admin.posts.index')}}">back</a></div>
<div class="container d-flex justify-content-center align-items-start">


  <div class="row d-flex flex-column justify-content-center align-items-start">
    <div class="col-12">

      <form action="{{route("admin.posts.update", $post->id)}}" method="POST">
        
        @csrf
        @method('PUT')

        <div class="form-group">
          <label>Titolo</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
        </div>
        <div class="form-group">
          <label>Example textarea</label>
          <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
        </div>
        <div class="form-group">
          <label>Categoria</label>
          <select name="category_id" class="form-controll">
            <option value="">categories</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>
                {{$category->name}}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Tag</label>
          @foreach ($tags as $tag)
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" value="{{$tag->id}}" name="tags[]"
                @if($errors->any())
                {{ in_array($tag->id, old('tags', [])) ? " checked" : ""}}
                @else
                {{ $post->tags->contains($tag) ? " checked" : "" }}
                @endif
                >
                <label for="{{$tag->slug}}">{{$tag->name}}</label>
              </div>
          @endforeach
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success"> submit </button>          
        </div>

      </form>

    </div>
  </div>
</div>

@endsection