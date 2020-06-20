@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">{{trans('messages.settings')}}:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" data-toggle="tab">
                                        <i class="material-icons">bug_report</i> {{trans('messages.description')}}
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#messages" data-toggle="tab">
                                        <i class="material-icons">code</i> {{trans('messages.info')}}
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#settings" data-toggle="tab">
                                        <i class="material-icons">cloud</i> {{trans('messages.social')}}
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <table class="table">
                                <tbody>
                                <tr>
                                    @foreach($settings as $setting)
                                        <td>
                                            <div class="form-check">

                                                {!! $setting->description !!}
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" data-id="{{ $setting->id }}" rel="tooltip"
                                                    title="Edit Task"
                                                    class="btn btn-primary btn-link btn-sm">
                                                <i class="material-icons">edit</i>
                                            </button>
                                        </td>
                                    @endforeach

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="messages">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>@foreach($settings as $setting)
                                            {{ $setting->phone }}
                                        @endforeach
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>

                                    <td>@foreach($settings as $setting)
                                            {{ $setting->mainurl }}
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>

                                    <td>@foreach($settings as $setting)
                                            {{ $setting->title }}
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>

                                    <td>@foreach($settings as $setting)
                                            {{ $setting->email }}
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>

                                    <td>@foreach($settings as $setting)
                                            {{ $setting->address }}
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="settings">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>@foreach($settings as $setting)
                                            @if($setting->facebook != NULL)
                                                {{ $setting->facebook }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>@foreach($settings as $setting)
                                            @if($setting->twitter != NULL)
                                                {{ $setting->twitter }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>@foreach($settings as $setting)
                                            @if($setting->skype != NULL)
                                                {{ $setting->skype }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>

                                <tr>
                                    <td>@foreach($settings as $setting)
                                            @if($setting->linkedin != NULL)
                                                {{ $setting->linkedin }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>@foreach($settings as $setting)
                                            @if($setting->gplus != NULL)
                                                {{ $setting->gplus }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>@foreach($settings as $setting)
                                            @if($setting->youtube != NULL)
                                                {{ $setting->youtube }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>@foreach($settings as $setting)
                                            @if($setting->flickr != NULL)
                                                {{ $setting->flickr }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>@foreach($settings as $setting)
                                            @if($setting->pinterst != NULL)
                                                {{ $setting->pinterest }}
                                            @else
                                                n/a
                                            @endif
                                        @endforeach</td>
                                    <td class="td-actions text-right">
                                        <button type="button" data-id="@foreach($settings as $setting)
                                        {{ $setting->id }}
                                        @endforeach" rel="tooltip" title="Edit Task"
                                                class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

