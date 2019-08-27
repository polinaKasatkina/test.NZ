@extends('layouts.app')

@section('content')
    <h4>Blogs <a href="{{ url('admin/blogs/create') }}" class="btn btn-success btn-sm">Add new</a></h4>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Slug</td>
            <td>Description</td>
            <td>Created At</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @if($blogs->isEmpty())
            <tr>
                <td colspan="6">
                    No blogs been added
                </td>
            </tr>
        @else
        @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->slug }}</td>
                <td>{!! substr(strip_tags($blog->description), 0, 70) !!}...</td>
                <td>{{ $blog->created_at->format('d.m.Y H:i') }}</td>

                <td>
                    <a class="btn btn-sm btn-info pull-left"
                       href="{{ url('admin/blogs/' . $blog->id . '/edit') }}">Edit</a>

                    <form method="POST" action="{{ url("admin/blogs/{$blog->id}") }}" accept-charset="UTF-8">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @endif
        </tbody>
    </table>
@endsection
