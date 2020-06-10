{!! csrf_field() !!}
@if (!empty($categories))
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">{{trans('messages.title')}}</label>
        <div class="col-sm-8">
            <input id="name" class="form-control" type="text" name="title"
                   placeholder="{{trans('messages.enter_category_title')}}"
                   value="{{ old('title', $category->title ?? null) }}"/>
        </div>
    </div>
    <div class="form-group">
        <label for="name"
               class="col-sm-3 control-label">{{trans('messages.sub_category')}}</label>
        <div class="col-sm-8">
            <select name="parent_id" id="parent_id" class="form-control">
                @if (!empty($category->title))
                    <option value="{{ $category->id }}">{{ old('title', $category->title ?? null) }}</option>
                @else
                    <option value="">Select category</option>
                @endif
                @if($categories)
                    @foreach($categories as $categoryList)
                        <option value="{{$categoryList['id']}}">{{ $categoryList['title'] }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
@else
    <div class="form-group">
        <label for="title" class="col-sm-3 control-label">{{trans('messages.title')}}</label>

        <div class="col-sm-8">
            <input id="title" class="form-control" type="text" name="title"
                   placeholder="{{trans('messages.enter_category_title')}}"
                   value="{{ old('title', $category->title ?? null) }}"/>
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-md-offset-3 col-md-8">
        <label>
            {!! Form::checkbox('publish', 1, ($category->publish ==1 ? true:null), ['class' => 'field']) !!}
            {{trans('messages.show_category_in_menu')}}
        </label>
    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {{ Form::submit(trans('messages.save'), ['name' => 'submit', 'class'=>'btn purple' ]) }}

        </div>
    </div>
