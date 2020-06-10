@extends('admin.layouts.master')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif

            </div>
        </div>
        <div class="col-12 mb-30">
            <div class="rounded shadow-sm p-3 bg-white">
                <h5 class="font500 fs-1x mb-20">Default Tabs</h5>
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" class="nav-item"><a class="nav-link active show" href="#home"
                                                                    aria-controls="home" role="tab" data-toggle="tab"
                                                                    aria-selected="true">Opis</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link" href="#profile"
                                                                    aria-controls="profile" role="tab" data-toggle="tab"
                                                                    aria-selected="false">Info</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link" href="#messages"
                                                                    aria-controls="messages" role="tab"
                                                                    data-toggle="tab" aria-selected="false">Social</a>
                        </li>
                        @foreach($settings as $setting)
                            <a class="btn btn-labeled shiny btn-warning btn-large pull-right"
                               href="/admin/settings/{{ $setting->id }}/edit"> <i
                                        class="btn-label fa fa-plus"></i>Edit </a>
                        @endforeach
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content pt-3">
                        <div role="tabpanel" class="tab-pane active show" id="home">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        @foreach($settings as $setting)
                                            {!! $setting->description !!}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="map-canvas"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Телефон</span>
                                        @foreach($settings as $setting)
                                            {{ $setting->phone }}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Главна адреса</span>
                                        @foreach($settings as $setting)
                                            {{ $setting->mainurl }}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Наслов</span>
                                        @foreach($settings as $setting)
                                            {{ $setting->title }}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Email адреса</span>
                                        @foreach($settings as $setting)
                                            {{ $setting->email }}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Адреса</span>
                                        @foreach($settings as $setting)
                                            {{ $setting->address }}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Logo</span>
                                        @foreach($settings as $setting)
                                            <img src="/admin/img/logo/{{ $setting->logo }}" class="img-responsive"/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Facebook</span>
                                        @foreach($settings as $setting)
                                            @if($setting->facebook != NULL)
                                                {{ $setting->facebook }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Twitter</span>
                                        @foreach($settings as $setting)
                                            @if($setting->twitter != NULL)
                                                {{ $setting->twitter }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Skype</span>
                                        @foreach($settings as $setting)
                                            @if($setting->skype != NULL)
                                                {{ $setting->skype }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">LinkedIn</span>
                                        @foreach($settings as $setting)
                                            @if($setting->linkedin != NULL)
                                                {{ $setting->linkedin }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Google Plus</span>
                                        @foreach($settings as $setting)
                                            @if($setting->gplus != NULL)
                                                {{ $setting->gplus }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Youtube</span>
                                        @foreach($settings as $setting)
                                            @if($setting->youtube != NULL)
                                                {{ $setting->youtube }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Flickr</span>
                                        @foreach($settings as $setting)
                                            @if($setting->flickr != NULL)
                                                {{ $setting->flickr }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-3 bg-primary rounded  border1 brd-primary-active">
                                        <i class="widget-icon fa fa-tags themesecondary"></i>
                                        <span class="widget-caption themesecondary">Pinterest</span>
                                        @foreach($settings as $setting)
                                            @if($setting->pinterest != NULL)
                                                {{ $setting->pinterest }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

