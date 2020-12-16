@extends('admin.layouts.master')
@section('content')
    <div class="content" style="margin-top: 7%">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title "> {{trans('messages.tag')}}</h4>
                <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a> -> <a
                            href="{{route('tags.index')}}">{{trans('messages.tag')}}</a></p>
            </div>
            <div class="fixed-plugin">
                <div class="dropdown show-dropdown">
                    <a href="{{ route('languages.create') }}">
                        <i class="fa fa-cog fa-2x"> </i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <tr>
                            <th>@lang('messages.name')</th>
                            <th>@lang('messages.country')</th>
                            <th>@lang('messages.iso')</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($language as $languages)
                            <tr>
                                <td>{{ $languages->name }}</td>
                                <td>{{ $languages->country }}</td>
                                <td>>{{ $languages->iso }}</td>
                                <td class="float-right"><span class="time"><a
                                                href="{{ route('languages.edit',$languages) }}"
                                                class="btn btn-info">@lang('messages.edit')</a></span>
                                </td>
                                <td>   {{ Form::model('language', ['route' => ['languages.destroy', $languages], 'method' => 'DELETE', 'id' => 'delete'])}}
                                    {!! csrf_field() !!}

                                    <button type="submit"
                                            class="btn btn-labeled shiny btn-danger delete float-right"><i
                                                class="btn-label fa fa-trash"></i> @lang('messages.delete')
                                    </button>
                                    {{ Form::close() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
