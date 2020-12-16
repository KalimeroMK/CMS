<div class="form-group has-feedback row">
    {!! Form::label('userId', trans('laravelblocker::laravelblocker.forms.blockedUserLabel'), array('class' => 'col-md-3 control-label disabled', 'id' => 'blockerUserLabel1')); !!}
    <div class="col-md-8">
        <div>
            <select class="{{ $errors->has('userId') ? 'custom-select form-control is-invalid disabled' : 'custom-select form-control disabled' }}"
                    name="userId" id="userId">
                <option value="">
                    {{ trans('laravelblocker::laravelblocker.forms.blockedUserSelect') }}
                </option>
                @if($users)
                    @foreach($users as $aUser)
                        <option value="{{ $aUser->id }}"
                                data-email="{{ $aUser->email }}" @isset($item->userId) {{ $item->userId == $aUser->id ? 'selected="selected"' : '' }} @endisset >
                            {{ $aUser->name }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>
        @if ($errors->has('userId'))
            <span class="help-block">
                <strong>{{ $errors->first('userId') }}</strong>
            </span>
        @endif
    </div>
</div>
