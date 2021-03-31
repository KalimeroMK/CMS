@extends('admin.layouts.master')
@section('content')
    @include('admin.layouts.notify')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.language')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a> -> <a
                            href="{{route('languages.index')}}">{{trans('messages.language')}}</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.language.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

