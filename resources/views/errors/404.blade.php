@extends('layouts.master')

@section('SOE')
    <title>{{$settings_general->site_title}}</title>
    <meta name="keywords" content="{{$settings_seo->seo_keywords}}">
    <meta name="description" content="{{$settings_seo->seo_description}}">
    <!--Twitter Card-->
    <meta property="twitter:card" content="summary"/>
    <meta property="twitter:site" content="{{$settings_social->twitter_handle}}"/>
    <meta property="twitter:title" content="{{$settings_general->site_title}}"/>
    <meta property="twitter:description"
          content="{{\Illuminate\Support\Str::limit(trim(strip_tags($settings_seo->seo_description)),300)}}"/>
    <meta property="twitter:image" content="{{$settings_general->logo_120}}"/>
    <meta name="twitter:creator" content="{{$settings_social->twitter_handle}}">
    <meta property="twitter:url" content="{{$settings_general->site_url}}"/>
    <!--Og tags-->
    <meta property="og:site_name" content="{{$settings_general->site_title}}"/>
    <meta property="og:title" content="{{$settings_general->site_title}}"/>
    <meta property="og:description"
          content="{{\Illuminate\Support\Str::limit(trim(strip_tags($settings_seo->seo_description)),300)}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{$settings_general->site_url}}"/>
    <meta property="og:image" content="{{$settings_general->logo_120}}"/>
@stop


@section('content')

    <div class="container-fluid">
        <div class="container">
            <div class="primary margin-15">
                <div class="row">
                    <div class="col-md-12">
                        <article class="section_margin">
                            <div class="post-content">
                                <div class="single-content animate-box">
                                    <div class="page_404 animate-box">
                                        <h1>404</h1>
                                        <h2>Page Not Found</h2>
                                        <p>The page requested couldn't be found. This could a spelling error in the URL
                                            or a removed page. </p>
                                        <p><a href="/" class="alith_button">Home Page</a></p>
                                    </div>
                                </div> <!--single content-->
                        </article>
                    </div>
                </div>
            </div> <!--.primary-->

        </div>
    </div>
@endsection