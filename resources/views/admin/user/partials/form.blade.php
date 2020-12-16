@if(is_null($user))
    {!! Form::model($user, [
        'route' => ['users.update', $user->id],
        'method' => 'PUT',
        'class' => 'form-horizontal'])
    !!}
@else
    {!! Form::open([
        'route' => 'users.store',
        'class' => 'form-horizontal'])
    !!}
@endif
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <strong>Name:</strong>
        {{Form::text("name",
             old("name") ? old("name") : (!empty($user) ? $user->name : null),
             [
                "class" => "form-control",
                "id" => "name",
                "placeholder" =>"name"
             ])
        }}
        <div class="form-group">

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <strong>Email:</strong>
        {{Form::text("email",
             old("email") ? old("email") : (!empty($user) ? $user->email : null),
             [
                "class" => "form-control",
                "id" => "email",
                "placeholder" =>"Email"
             ])
        }}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <strong>Password:</strong>
        <div class="form-group">
            {!! Form::password('password', ['placeholder' => 'Password','class' => 'form-control']) !!}

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <strong>Confirm Password:</strong>
        <div class="form-group">
            {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <strong>Role:</strong>
        <div class="form-group">
            <select data-placeholder="Select a Roles" class="form-control js-example-basic-multiple" name="roles[]"
                    multiple="multiple">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        {{ Form::submit(trans('messages.save'), ['name' => 'submit', 'class'=>'btn purple' ]) }}
    </div>
    {!! Form::close() !!}
</div>
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>$(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection