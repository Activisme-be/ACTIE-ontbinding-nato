<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="viewport" content="width=device-width, initial-scale=1">

        <title> ActivismeBE | {{ $title }} </title>

        <link rel="icon"       href="//nato.activisme.be/assets/favicon.ico">
        <link rel="stylesheet" href="//nato.activisme.be/assets/css/bootstrap.css">
        <link rel="stylesheet" href="//nato.activisme.be/assets/css/ie10-viewport-bug-fix.css">
        <link rel="stylesheet" href="//nato.activisme.be/assets/css/custom.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//nato.activisme.be/assets/css/bootstrap-social.css">

        {{-- Facebook OpenGraph Data --}}
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://www.nato.activisme.be" />
        <meta property="og:title" content="{{ lang('meta_facebook_title') }}" />
        <meta property="og:image" content="{{ site_url('assets/img/front.jpg') }}" />
        <meta property="og:description" content="{{ lang('meta_facebook_discription') }}">
        <meta property='article:publisher' content='https://www.facebook.com/ActivismeBE' />


        {{-- Twitter card --}}
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@Activisme_be" />
        <meta name="twitter:title" content="{{ lang('meta_twitter_title') }}" />
        <meta name="twitter:description" content="{{ lang('meta_twitter_description') }}" />
        <meta name="twitter:image" content="{{ site_url('assets/img/front.jpg') }}" />

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries. --}}
        <!--[lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top"> {{-- Nav --}}
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a class="navbar-brand" href="{{ site_url() }}">{{ lang('app_name') }}</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="@if(current_url() === site_url()) active @endif">
                            <a href="{{ site_url() }}"><span class="fa fa-file-text-o" aria-hidden="true"></span> {{ lang('nav_text') }}</a>
                        </li>
                        <li class="@if(current_url() === site_url('support')) active @endif">
                            <a href="{{ site_url('support') }}"><span class="fa fa-th-list" aria-hidden="true"></span> {{ lang('nav_support') }}</a>
                        </li>
						<li class="@if(current_url() === site_url('disclaimer')) active @endif">
							<a href="{{ site_url('disclaimer') }}"><span class="fa fa-info-circle" aria-hidden="true"></span> {{ lang('nav_disclaimer') }}</a>
						</li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								{{ lang('nav_lang_dropdown') }}: {{ lang('nav_lang_current') }} <span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
                                    <a href="{{ site_url('language/set/dutch') }}">
                                        <img style="height: 12px; margin-right: 5px;" src="{{ site_url('assets/img/flags/BE.png') }}" alt="Nederlands">{{ lang('nav_lang_dutch') }}
                                    </a>
                                </li>
								<li>
									<a href="{{ site_url('language/set/french') }}">
                                    	<img style="height: 12px; margin-right: 5px;" src="{{ site_url('assets/img/flags/FR.png') }}" alt="Frans">{{ lang('nav_lang_french') }}
									</a>
                                </li>
								<li>
									<a href="{{ site_url('language/set/english') }}">
										<img style="height: 12px; margin-right: 5px;" src="{{ site_url('assets/img/flags/US.png') }}" alt="Engels">{{ lang('nav_lang_english') }}
									</a>
								</li>
							</ul>
						</li>
                    </ul>
                </div>
            </div>
        </nav> {{-- /Nav --}}


        <div class="container"> {{-- Container --}}
            @yield('content')
        </div> {{-- /Container --}}

        @yield('footer')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ site_url("assets/js/jquery.min.js")}}"><\/script>')</script>
        <script> $('div.alert').not('.alert-important').delay(3000).slideUp(300); </script>
        <script src="{{ site_url('assets/js/bootstrap.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.11.0/vue.js"></script>

        {{-- IE10 viewport hack for Surface/desktop Windows 8 bug --}}
        <script src="{{ base_url('assets/js/ie10-viewport-bug-workaround.js') }}"></script>
    </body>
</html>
