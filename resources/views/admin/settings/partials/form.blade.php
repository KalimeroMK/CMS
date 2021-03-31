@if($setting->exists)
<form class="form-horizontal" method="POST" action="{{ route('settings.update',$settings) }}"
    enctype="multipart/form-data">
    @method('put')
    @csrf
    @else
    <form class="form-horizontal" method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data">
        @csrf
        @endif
        @include('Domain::Partials.views.notify')

        <div class="row">
            <div class="input-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                <span class="input-group-btn">
                    <span class="btn btn-info shiny btn-file">
                        <i class="btn-label fa fa-image"> </i> Избери лого... <input type="file" name="logo">
                    </span>
                </span>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <input name="title" type="text" class="form-control" placeholder="{{trans('messages.title')}}"
                        value="{{ old('title', $settings->title ?? null) }}" />
                </div>
                @if ($errors->has('facebook')) <p class="alert alert-danger">{{ $errors->first('facebook') }}</p> @endif
                <div class="form-group">
                    <input name="mainurl" type="text" class="form-control" placeholder="{{trans('messages.url')}}"
                        value="{{ old('mainurl', $settings->mainurl ?? null) }}" />
                </div>
                @if ($errors->has('mainurl')) <p class="alert alert-danger">{{ $errors->first('mainurl') }}</p> @endif
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="{{trans('messages.email')}}"
                        value="{{ old('email', $settings->email ?? null) }}" />
                </div>
                @if ($errors->has('email')) <p class="alert alert-danger">{{ $errors->first('email') }}</p> @endif
                <div class="form-group">
                    <input name="address" type="text" class="form-control" placeholder="{{trans('messages.address')}}"
                        value="{{ old('address', $settings->address ?? null) }}" />
                </div>
                @if ($errors->has('address')) <p class="alert alert-danger">{{ $errors->first('address') }}</p> @endif
                <div class="form-group">
                    <input name="phone" type="text" class="form-control" placeholder="{{trans('messages.phone')}}"
                        value="{{ old('phone', $settings->phone ?? null) }}" />
                </div>
                @if ($errors->has('phone')) <p class="alert alert-danger">{{ $errors->first('phone') }}</p> @endif
                <div class="form-group">
                    <input name="twitter" type="text" class="form-control" placeholder="{{trans('messages.twitter')}}"
                        value="{{ old('twitter', $settings->twitter ?? null) }}" />
                </div>
                @if ($errors->has('twitter')) <p class="alert alert-danger">{{ $errors->first('twitter') }}</p> @endif

            </div>
            <div class="col-6">
                <div class="form-group">
                    <input name="facebook" type="text" class="form-control" placeholder="{{trans('messages.facebook')}}"
                        value="{{ old('facebook', $settings->facebook ?? null) }}" />
                </div>
                @if ($errors->has('facebook')) <p class="alert alert-danger">{{ $errors->first('facebook') }}</p> @endif
                <div class="form-group">
                    <input name="skype" type="text" class="form-control" placeholder="{{trans('messages.skype')}}"
                        value="{{ old('skype', $settings->skype ?? null) }}" />
                </div>
                @if ($errors->has('skype')) <p class="alert alert-danger">{{ $errors->first('skype') }}</p> @endif

                <div class="form-group">
                    <input name="linkedin" type="text" class="form-control" placeholder="{{trans('messages.linkedin')}}"
                        value="{{ old('linkedin', $settings->linkedin ?? null) }}" />
                </div>
                @if ($errors->has('linkedin')) <p class="alert alert-danger">{{ $errors->first('linkedin') }}</p> @endif

                <div class="form-group">
                    <input name="gplus" type="text" class="form-control"
                        placeholder="{{trans('messages.google_plus_url')}}"
                        value="{{ old('gplus', $settings->gplus ?? null) }}" />
                </div>
                @if ($errors->has('gplus')) <p class="alert alert-danger">{{ $errors->first('gplus') }}</p> @endif

                <div class="form-group">
                    <input name="youtube" type="text" class="form-control" placeholder="{{trans('messages.youtube')}}"
                        value="{{ old('youtube', $settings->youtube ?? null) }}" />
                </div>
                @if ($errors->has('youtube')) <p class="alert alert-danger">{{ $errors->first('youtube') }}</p> @endif

                <div class="form-group">
                    <input name="flickr" type="text" class="form-control" placeholder="{{trans('messages.flickr')}}"
                        value="{{ old('flickr', $settings->flickr ?? null) }}" />
                </div>
                @if ($errors->has('flickr')) <p class="alert alert-danger">{{ $errors->first('flickr') }}</p> @endif

                <div class="form-group">
                    <input name="pinterest" type="text" class="form-control"
                        placeholder="{{trans('messages.pinterest')}}"
                        value="{{ old('pinterest', $settings->pinterest ?? null) }}" />
                </div>
                @if ($errors->has('pinterest')) <p class="alert alert-danger">{{ $errors->first('pinterest') }}</p>
                @endif
            </div>
        </div>
        <label for="description">Детален текст</label>

        <textarea class="ckeditor" id="elm3"
            name="description">{{ old('title', $post->description ?? null) }}</textarea>
        @if ($errors->has('description')) <p class="alert alert-danger">{{ $errors->first('description') }}</p> @endif
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn purple">@lang('messages.save')<button>
                </div>
            </div>
        </div>
    </form>
@section('extra_js')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@stop