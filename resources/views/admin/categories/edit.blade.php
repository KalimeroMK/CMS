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
                        {{ Form::model('category', ['route' => ['categories.update', $category->id], 'id'=>'form-username','class'=>'orm-horizontal form-bordered', 'method' => 'PUT','files'=>true]) }}
                        @include('admin.categories.partials.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop