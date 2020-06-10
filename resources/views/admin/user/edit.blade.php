@extends('admin.layouts.master')
@section('content')
    @include('admin.layouts.notify')

    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.home')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a> -> <a
                                href="{{route('categories.index')}}">{{trans('messages.pages')}}</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {!! Form::model('user', ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                        @include('admin.user.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection