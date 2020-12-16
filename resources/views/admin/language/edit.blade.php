@extends('admin.layouts.master')
@section('content')
    @include('admin.layouts.notify')
    <div class="page-body">
        <div class="row">
            <div class="col-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-warning">
                        <span class="widget-caption">Edit comment: {{ strip_tags($language->name) }}</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('admin.language.partials.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
