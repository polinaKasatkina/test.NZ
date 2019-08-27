@extends('layouts.app')

@section('content')
    <div class="col-sm-10 col-sm-offset-1 col-xs-12">

        <h4>Edit blog</h4>
        <div class="col-xs-12">

            @if(session('notice'))
                <div class="alert alert-dismissible alert-success col-xs-12">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <div>
                        <i class="fa fa-info-circle pull-left" aria-hidden="true"></i>
                        <p>{{ session('notice') }}</p>
                    </div>
                </div>
            @endif

            @include('admin.blogs._form')
        </div>

    </div>

@endsection
