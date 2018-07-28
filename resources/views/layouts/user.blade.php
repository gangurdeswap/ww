<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>{{GlobalSetting::getGlobal('sitename')}} | @yield('title')</title>
        <!-- Bootstrap -->
        <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/bootstrapcdn.font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/animate.css')}}">
        <link href="{{asset('/css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('/css/style.css')}}" rel="stylesheet" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        @yield('css_content')
        <script>
            var javascript_path = '{{url("/")}}';
        </script>
        @php
        $all_segment = Request::segments();
        @endphp
    </head>
    <body>
        <header id="header">
            <nav class="navbar navbar-default navbar-static-top" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand">
                            <a href="{{url('/')}}"><img width="106px" height="46px" src="{{asset('uploads/'.GlobalSetting::getGlobal('logo'))}}" /></a>
                        </div>
                    </div>
                    <div class="navbar-collapse collapse">
                        <div class="menu">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a href="{{url('/')}}" @if(count($all_segment)==0) class="active" @endif>@lang('welcome_page.home')</a></li>
                                <li role="presentation"><a href="{{url('/about-us')}}" @if(in_array('about-us',$all_segment)) class="active" @endif>@lang('welcome_page.about_us')</a></li>
                                <li role="presentation"><a href="{{url('/term-and-condition')}}"  @if(in_array('term-and-condition',$all_segment)) class="active" @endif>@lang('welcome_page.terms_and_condition')</a></li>
                                <li role="presentation"><a href="{{url('/privacy-policy')}}"  @if(in_array('privacy-policy',$all_segment)) class="active" @endif>@lang('welcome_page.privacy_policy')</a></li>
                                <li role="presentation"><a href="{{url('/contact')}}"  @if(in_array('contact',$all_segment)) class="active" @endif>@lang('welcome_page.contact')</a></li>
                                @if(env('IS_MULTILANGUAGE'))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{\Session::has('userLangName')?\Session::get('userLangName'):'Language'}}</a>
                                    <div class="dropdown-menu">
                                        @php
                                        $all_languages = App\Language::all();
                                        @endphp
                                        @foreach ($all_languages as $language)
                                        <a class="dropdown-item lang_change_top" href="javascript:void(0);" data-val="{{$language->lang_code}}">  {{$language->lang_title}}</a><br/>

                                        @endforeach


                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->
        </header><!--/header-->
        @if (session('status'))
        <div class=" status alert alert-success" title="{{ session('status')}}" tabindex="0">
            <a href="javascript:void(0)" class="close dirtyignoreAnchor" >&times;</a>
            {{ session('status')}}
            <?php session()->forget('status'); ?>
        </div>
        @endif
        @if (session('success'))
        <div class=" status alert alert-success" title="{{ session('success') }}" tabindex="0" >
            <a href="javascript:void(0)" class="close dirtyignoreAnchor">&times;</a>
            {{ session('success') }}
            <?php session()->forget('success'); ?>
        </div>
        @endif
        @if (session('error'))
        <div class=" status alert alert-danger" title="{{ session('error') }}" tabindex="0">
            <a href="javascript:void(0)" class="close dirtyignoreAnchor">&times;</a>
            {{ session('error') }}
            <?php session()->forget('error'); ?>
        </div>
        @endif
        @yield('content')
        <footer>
            <div class="container">
                <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <h4>About Us</h4>
                    <p>Day is tellus ac cursus commodo, mauesris condime ntum nibh, ut fermentum mas justo sitters.</p>
                    <div class="contact-info">
                        <ul>
                            <li><i class="fa fa-home fa"></i>Suite 54 Elizebth Street, Victoria State Newyork, USA </li>
                            <li><i class="fa fa-phone fa"></i> +38 000 129900</li>
                            <li><i class="fa fa-envelope fa"></i> info@domain.net</li>
                        </ul>
                    </div>
                </div>
        </footer>
        <div class="sub-footer">
            <div class="container">
                <div class="social-icon">
                    <div class="col-md-4">
                        <ul class="social-network">
                            <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-4">
                    <div class="copyright">
                        &copy; Day 2015 by <a target="_blank" href="http://bootstraptaste.com/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">Bootstrap Themes</a>.All Rights Reserved.
                    </div>
                    <!--
                    All links in the footer should remain intact.
                    Licenseing information is available at: http://bootstraptaste.com/license/
                    You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Day
                    -->
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{asset('/js/jquery.min.js')}}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{asset('/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/js/common.js')}}"></script>
        @yield('js_content')
    </body>
</html>