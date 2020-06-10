@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.tag')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.source')}}</a> -> <a
                                href="{{route('tags.index')}}">{{trans('messages.tag')}}</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {{ Form::model('tag', ['route' => ['tags.store'], 'method' => 'POST', 'files'=>true]) }}
                        {!! csrf_field() !!}
                        @include('admin.tags.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection