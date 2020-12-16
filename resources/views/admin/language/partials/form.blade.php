@if(is_null($language))
    {!! Form::model($language, [
        'route' => ['languages.update', $language->id],
        'method' => 'PUT',
        'class' => 'form-horizontal'])
    !!}
@else
    {!! Form::open([
        'route' => 'languages.store',
        'class' => 'form-horizontal'])
    !!}
@endif
<label for="title">@lang('partials.title')</label>
<div class="form-group">
    {{Form::text("name",
             old("name") ? old("name") : (!empty($language) ? $language->name : null),
             [
                "class" => "form-control",
                "id" => "title",
             ])
        }}
</div>
<label for="title">@lang('partials.code')</label>

<div class="form-group">
    {{Form::text("country",
             old("country") ? old("country") : (!empty($language) ? $language->country : null),
             [
                "class" => "form-control",
                "id" => "country",
             ])
        }}
</div>
<label for="title">@lang('partials.iso')</label>
<div class="form-group">
    {{Form::text("iso",
             old("iso") ? old("iso") : (!empty($language) ? $language->iso : null),
             [
                "class" => "form-control",
                "id" => "country",
             ])
        }}
</div>
<!-- Hidden inputs -->
<input type="hidden" name="user_id" value="{{ Auth::user()->id  }}">
{{ Form::submit(trans('partials.create'), ['name' => 'submit', 'class'=>'btn purple' ]) }}
