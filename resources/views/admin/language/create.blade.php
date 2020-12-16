@extends('admin.layouts.master')
@section('content')
    @include('admin.layouts.notify')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <span class="widget-caption">@lang('partials.add')</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.language.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


