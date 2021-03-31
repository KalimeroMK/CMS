@if ($ad->exists)
<form class="form-horizontal" method="POST" action="{{ route('ads.update', $ad) }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    @else
    <form class="form-horizontal" method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data">
        @csrf
        @endif
        <div class="form-group">
            <label for="code" class="col-sm-3 control-label">{{ trans('messages.ad_code') }}</label>
            <div class="col-sm-8">
                <textarea id="code" name="code">{{ old('code', $ad->code ?? null) }}</textarea>
            </div>
            <div class="form-group">
                <label for="position" class="col-sm-3 control-label">{{ trans('messages.position') }}</label>
                <div class="col-sm-8">
                    <select class="form-control" id="position" name="position">
                        <option value="{{ $ad->id }}" @if ($ad->first) selected @endif>{{ $ad->position }}</option>
                        <option value="index_header">Index Page Header</option>
                        <option value="index_footer">Index Page Footer</option>
                        <option value="sidebar">Sidebar</option>
                        <option value="above_post">Above Each Post</option>
                        <option value="below_post">Below Each Post</option>
                        <option value="between_category_index">Between Category Page</option>
                        <option value="between_author_index">Between Author Page</option>
                        <option value="between_tag_index">Between Tag Page</option>
                        <option value="between_search_index">Between Search Page</option>
                        <option value="above_page">Above Each Page</option>
                        <option value="below_page">Below Each Page</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9" style="margin-top: 2%">
                        <button class="btn purple" type="submit" style="margin-top: 5%">@lang('partials.create')
                    </div>
                </div>
            </div>
        </div>
    </form>
