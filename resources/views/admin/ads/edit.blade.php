@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.ads_section')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a> -> <a
                                href="{{route('ads.index')}}">{{trans('messages.ads_section')}}</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.ads.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop