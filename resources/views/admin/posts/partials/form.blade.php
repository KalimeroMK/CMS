{!! csrf_field() !!}
@include('admin.layouts.notify')
<div class="row">
    <div class="col-md-8">
        <label for="title" class="form-group control-label">{{trans('messages.title')}}</label>
        {{Form::text("title",
             old("title") ? old("title") : (!empty($post) ? $post->title : null),
             [
                "class" => "form-control",
                "id" => "title",
             ])
        }}
    </div>
    <div class="form-group col-4">

        <label for="tags" class="col-sm-3 control-label">{{trans('messages.category')}}</label>

        <div class="form-group">
            <select class="form-control js-example-basic-multiple" id="category" name="category[]" multiple="multiple">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">@for ($i = 0; $i < $category->depth; $i++)
                            - @endfor {{ $category->title }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-8 form-group">
        <label for="description"
               class="control-label">{{trans('messages.description')}}</label>
        <textarea class="ckeditor" id="editor"
                  name="description">{{ old('title', $post->description ?? null) }}</textarea>
    </div>


    <div class="col-4">
        <h4 class="title"></h4>
        <div class="fileinput text-center fileinput-new col-12" data-provides="fileinput">
            <div class="fileinput-new thumbnail img-circle">
                <img src="@if(empty($post->featured_image)){{ asset('images/image_placeholder.jpg')}}@else {{ old('featured_image', $post->imageUrl ?? null) }}@endif"
                     alt="image">

            </div>
            <div class="fileinput-preview fileinput-exists thumbnail img-circle" style=""></div>
            <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Add Photo</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden" value="" name="featured_image"><input type="file"
                                                                                       name="featured_image">
                          <div class="ripple-container"></div></span>
                <br>
                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                    <i class="fa fa-times"></i> Remove
                    <div class="ripple-container">
                        <div class="ripple-decorator ripple-on ripple-out"
                             style="left: 62px; top: 25.6719px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="form-group col-8">
        <label for="rating_desc"
               class="col-sm-3 control-label">{{trans('messages.rating_desc')}}</label>

        <div>
             <textarea id="meta_description" class="form-control" name="meta_description"
                       placeholder="{{trans('messages.meta_description')}}">{{ old('meta_description', $post->meta_description ?? null) }}</textarea>
        </div>
    </div>

    <div class="form-group col-4">

        <label for="tags" class="col-sm-3 control-label">{{trans('messages.select_tags')}}</label>

        <div class="form-group">
            <select class="form-control select2-multiple" id="tags" name="tags[]" multiple="multiple">
                @foreach($tag as $tags)
                    <option value='{{ $tags->id }}'>{!! $tags->title !!} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-8">
        <label for="status" class="control-label">{{trans('messages.status')}}</label>

        <div>
            <select id="status" class="form-control" name="status">
                <option value="{{config('constants.STATUS_PUBLISHED')}}">{{trans('messages.published')}}</option>
                <option value="{{config('constants.STATUS_HIDDEN')}}">{{trans('messages.hidden')}}</option>
            </select>
        </div>
    </div>
</div>{{--row--}}


<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {{ Form::submit(trans('messages.save'), ['name' => 'submit', 'class'=>'btn purple' ]) }}
        </div>
    </div>
</div>
<input type="hidden" name="author_id" value="{{ Auth::user()->id  }}">

@section('scripts')
    <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('editor', options);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <!-- select2 -->
    <script type="text/javascript">
        $('#tags').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
        $('#category').select2().val({!! json_encode($post->categories()->allRelatedIds()) !!}).trigger('change');

    </script>
@endsection
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endsection