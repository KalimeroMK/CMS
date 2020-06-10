@extends('admin.layouts.master')
@section('content')
    <div class="content" style="margin-top: 7%">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.manage_posts')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a> -> <a
                                href="{{route('posts.index')}}">{{trans('messages.posts')}}</a></p>
                </div>
                <div class="container">
                    <div class="row">
                        {{ Form::model('$post', ['route' => ['posts.store'], 'method' => 'POST','id'=>'form-username','class'=>'form-horizontal form-bordered', 'files'=>true]) }}
                        @include('admin.posts.partials.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop