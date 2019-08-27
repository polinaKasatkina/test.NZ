@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- pipe -->

        <div class="col-xs-12 col-sm-6">
            <h3>Last Blogs</h3>
            <hr>
            @if($blogs->isEmpty())
                <p>No blogs been added</p>
            @endif
            @foreach($blogs as $item)
                <p>
                    <a href="{{ url('admin/blogs/' . $item->id . "/edit") }}" class="str-truncated" data-toggle="tooltip" data-placement="top">
                        {{ $item->title }}
                    </a>
                <span class="pull-right">
                    <time class="text-muted">{{ $item->created_at->format('d.m.Y') }}</time>
                </span>
                </p>
            @endforeach
        </div>

        <!-- pipe -->

        <div class="col-xs-12 col-sm-6">
            <h3>Users</h3>
            <hr>
            @if($users->isEmpty())
                <p>No users added</p>
            @endif
            @foreach($users as $item)
                <p>
                    <a href="#" class="str-truncated" data-toggle="tooltip" data-placement="top">
                        {{ $item->name }} | {{ $item->email }}
                    </a>
                <span class="pull-right">
                    <time class="text-muted">{{ $item->created_at->format('d.m.Y') }}</time>
                </span>
                </p>
            @endforeach
        </div>
    </div>

@endsection
