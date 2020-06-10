@extends('admin.layouts.master')

@section('content')
    @include('admin.layouts.notify')

    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.all_categories')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a> -> <a
                                href="{{route('categories.index')}}">{{trans('messages.create_new_category')}}</a></p>
                </div>
                <div class="card-body">
                    <div class="fixed-plugin">
                        <div class="dropdown show-dropdown">
                            <a href="{{ route('categories.create') }}">
                                <i class="fa fa-cog fa-2x"> </i>
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('categories.edit', $category['id'])}}">{{ $category['title']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
