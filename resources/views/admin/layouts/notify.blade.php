@if(Session::has('success_msg'))
    <div class="alert alert-success">
        <strong>{{trans('messages.success')}}!</strong> {!! Session::get('success_msg') !!}
    </div>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
