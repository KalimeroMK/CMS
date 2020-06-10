<label for="title">Name</label>

<div class="form-group">
    <textarea class="ckeditor" id="title" name="title"></textarea>
</div>

@if ($errors->has('title')) <p
        class="alert alert-danger">{{ $errors->first('title') }}</p> @endif

{{ Form::submit(trans('messages.save'), ['name' => 'submit', 'class'=>'btn purple' ]) }}
