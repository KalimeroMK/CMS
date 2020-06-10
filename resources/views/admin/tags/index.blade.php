@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.tag')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a> -> <a
                                href="{{route('tags.index')}}">{{trans('messages.tag')}}</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>{{trans('messages.id')}}</th>
                                <th>{{trans('messages.title')}}</th>
                                <th>{{trans('messages.slug')}}</th>
                                <th>{{trans('messages.view')}}</th>
                                <th>{{trans('messages.posts_count')}}</th>
                                <th>{{trans('messages.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="fixed-plugin">
                                <div class="dropdown show-dropdown">
                                    <a href="{{ route('tags.create') }}">
                                        <i class="fa fa-cog fa-2x"> </i>
                                    </a>
                                </div>
                            </div>
                            @foreach($tags as $t)
                                <tr>
                                    <td> {{$t->id}} </td>
                                    <td> {{$t->title}} </td>
                                    <td> {{$t->slug}} </td>
                                    <td> {{$t->views}} </td>
                                    <td> {{$t->post_count}} </td>
                                    <td>   {{ Form::model('tag',['route' => ['tags.destroy', $t], 'method' => 'DELETE'])}}
                                        {!! csrf_field() !!}

                                        <button type="submit" data-toggle="modal"
                                                data-target="#confirm-delete"
                                                class="btn btn-danger btn-sm">{{trans('messages.delete')}}</button>

                                        {{ Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection