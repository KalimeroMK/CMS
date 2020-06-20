<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white"
         data-image="{{ asset('images/sidebar-1.jpg') }}">
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item {{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <p>{{trans('messages.dashboard')}}</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('categories.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('categories.index')}}">
                        <i class="material-icons">library_books</i>
                        <p>{{trans('messages.categories')}}</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('posts.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('posts.index')}}">
                        <i class="material-icons">subject</i>
                        <span class="title">{{trans('messages.posts')}}</span>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed('tags.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tags.index') }}">
                        <i class="material-icons">label</i>
                        <span class="title">{{trans('messages.tags')}}</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('users.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('users.index')}}">
                        <i class="material-icons">person</i>
                        <span class="title">{{trans('messages.users')}}</span>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed('ads.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ads.index') }}">
                        <i class="material-icons">border_clear</i>
                        <span class="title">{{trans('messages.ads_section')}}</span>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed('statistics') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('statistics')}}">
                        <i class="material-icons">bar_chart</i>
                        <span class="title">{{trans('messages.statistics')}}</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('roles.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('roles.index')}}">
                        <i class="material-icons">lock</i>
                        <span class="title">{{trans('messages.user_roles')}}</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('settings.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('settings.index') }}">
                        <i class="material-icons">settings</i>
                        <span class="title">{{trans('messages.settings')}}</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('activity') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('activity')}}">
                        <i class="material-icons">biotech</i>
                        <span class="title">{{trans('messages.log')}}</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('laravelblocker::blocker.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('laravelblocker::blocker.index')}}">
                        <i class="material-icons">privacy_tip</i>
                        <span class="title">{{trans('messages.blocker')}}</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('translation') ? 'active' : '' }}">
                    <a class="nav-link" href="/translations">
                        <i class="material-icons">language</i>
                        <span class="title">{{trans('messages.translations')}}</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
