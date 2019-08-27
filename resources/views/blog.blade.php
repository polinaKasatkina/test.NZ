@extends('layouts.app')

@section('content')
  <div class="row">
    <h4>{{ $blog->title }}</h4>

    <div>
      @if(\Illuminate\Support\Facades\File::exists("storage/blogs/" . $blog->_id . ".jpg"))
        <img src="{{ asset("storage/blogs/" . $blog->_id . ".jpg") }}" class="blog-img" />
      @endif
      {!! $blog->description !!}
    </div>

    <a href="{{ url("/") }}"><< Back to blogs</a>
  </div>
@endsection
