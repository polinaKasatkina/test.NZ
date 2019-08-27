@extends('layouts.app')

@section('content')
    <div class="col-sm-10 col-sm-offset-1 col-xs-12">

        <h4>Add new blog</h4>
        <div class="col-xs-12">
            @include('admin.blogs._form')
        </div>

    </div>

@endsection
