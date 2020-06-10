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
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>{{trans('messages.id')}}</th>
                                <th>{{trans('messages.code')}}</th>
                                <th>{{trans('messages.position')}}</th>
                                <th>{{trans('messages.edit')}}</th>
                                <th>{{trans('messages.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="fixed-plugin">
                                <div class="dropdown show-dropdown">
                                    <a href="{{ route('ads.create') }}">
                                        <i class="fa fa-cog fa-2x"> </i>
                                    </a>
                                </div>
                            </div>
                            @foreach($ad as $ads)
                                <tr>
                                    <td> {{$ads->id}} </td>
                                    <td> {{$ads->code}} </td>

                                    @if($ads->position == config('constants.TYPE_INDEX_HEADER'))
                                        <td> {{trans('messages.index_page_header')}} </td>
                                    @endif

                                    @if($ads->position == config('constants.TYPE_INDEX_FOOTER'))
                                        <td> {{trans('messages.index_page_footer')}} </td>
                                    @endif

                                    @if($ads->position == config('constants.TYPE_SIDEBAR'))
                                        <td> {{trans('messages.sidebar')}} </td>
                                    @endif

                                    @if($ads->position == config('constants.TYPE_ABOVE_POST'))
                                        <td> {{trans('messages.above_each_post')}} </td>
                                    @endif

                                    @if($ads->position == config('constants.TYPE_BELOW_POST'))
                                        <td> {{trans('messages.below_each_post')}} </td>
                                    @endif

                                    @if($ads->position == config('constants.TYPE_BETWEEN_CATEGORY_INDEX'))
                                        <td> {{trans('messages.between_category_pages')}} </td>
                                    @endif

                                    @if($ads->position == config('constants.TYPE_BETWEEN_AUTHOR_INDEX'))
                                        <td> {{trans('messages.between_author_pages')}} </td>
                                    @endif

                                    @if($ads->position == config('constants.TYPE_BETWEEN_TAG_INDEX'))
                                        <td> {{trans('messages.between_tag_pages')}} </td>
                                    @endif

                                    @if($ads->position == config('constants.TYPE_BETWEEN_SEARCH_INDEX'))
                                        <td> {{trans('messages.between_search_pages')}} </td>
                                    @endif

                                    @if($ads->position == config('constants.TYPE_ABOVE_PAGE'))
                                        <td> {{trans('messages.above_each_page')}} </td>
                                    @endif

                                    @if($ads->position == config('constants.TYPE_BELOW_PAGE'))
                                        <td> {{trans('messages.below_each_page')}} </td>
                                    @endif

                                    <td><a href="{{ route('ads.edit', $ads) }}"
                                           class="btn btn-warning btn-sm">{{trans('messages.edit')}}</a>
                                    </td>
                                    <td><a data-href="{{ route('ads.destroy', $ads) }}" data-toggle="modal"
                                           data-target="#confirm-delete"
                                           class="btn btn-danger btn-sm">{{trans('messages.delete')}}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
