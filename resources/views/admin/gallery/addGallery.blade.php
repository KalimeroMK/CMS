@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.manage_posts')}}</h4>
                    <p class="card-category"><a href="{{ route('dashboard')}}">{{trans('messages.home')}}</a><a
                                href="{{route('posts.index')}}">{{trans('messages.posts')}}</a></p>
                </div>
                {{ Form::model('gallery', ['route' => ['gallery.store'], 'method' => 'POST', 'files'=>true]) }}
                {!! csrf_field() !!}
                <div class="input-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <div class="input-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <span class="input-group-btn">
                                <span class="btn btn-info shiny btn-file">
                                    Избери... <input type="file" multiple name="image[]">
                                </span>
                            </span>
                    </div>
                </div>
                <br/>
                <!-- Hidden inputs -->
                <input type="hidden" id="product_id" class="form-control" name="post_id"
                       value="{{ $post->id }}">
                <button type="submit" class="btn btn-labeled shiny btn-warning btn-large"><i
                            class="btn-label fa fa-plus"></i> Create
                </button>
                {!! Form::close() !!}
                <div class="col-12">
                    @foreach($gallery as $galleries)
                        {{ Form::model('gallery', ['route' => ['gallery.destroy' , $galleries], 'method' => 'POST', 'files'=>true]) }}
                        {{ method_field('DELETE') }}

                        <img src="{{$galleries->galleryUrl}}" class="rounded col-3" style="margin: 2%">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
