@if(is_null($tag))
    {!! Form::model($category, [
        'route' => ['tags.update', $tag->id],
        'method' => 'PUT',
        'class' => 'form-horizontal'])
    !!}
@else
    {!! Form::open([
        'route' => 'tags.store',
        'class' => 'form-horizontal'])
    !!}
@endif
<label for="title">Name</label>
<div class="form-group">
    {{Form::text("title",
                 old("title") ? old("title") : (!empty($tag) ? $tag->title : null),
                 [
                    "class" => "form-control",
                    "id" => "title",
                 ])
     }}
</div>
@if ($errors->has('title')) <p
        class="alert alert-danger">{{ $errors->first('title') }}</p> @endif

{{ Form::submit(trans('messages.save'), ['name' => 'submit', 'class'=>'btn purple' ]) }}
