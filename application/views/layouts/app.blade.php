<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Ontbind de nato.">
        <meta name="author" content="ActivismeBE">

        <title> ActivismeBE | Ontbind de NATO </title>

        <link rel="icon"       href="{{ site_url('assets/favicon.ico') }}">
        <link rel="stylesheet" href="{{ site_url('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ site_url('assets/css/ie10-viewport-bug-workaround.css') }}">
        <link rel="stylesheet" href="{{ site_url('assets/css/custom.css') }}">
        <link rel="stylesheet" href="{{ site_url('assets/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ site_url('assets/css/bootstrap-social.css') }}">

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
                    
                    <a class="navbar-brand" href="{{ site_url() }}">Ontbind de NATO</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ site_url() }}"><span class="fa fa-file-text-o" aria-hidden="true"></span> Besluitvorming</a></li>
                        <li><a href="{{ site_url('support') }}"><span class="fa fa-th-list" aria-hidden="true"></span> Steunbetuigingen</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ site_url('disclaimer') }}"><span class="fa fa-info-circle" aria-hidden="true"></span> Disclaimer</a></li>
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
    
        {{-- IE10 viewport hack for Surface/desktop Windows 8 bug --}}
        <script src="{{ base_url('assets/js/ie10-viewport-bug-workaround.js') }}"></script>
    </body>
</html>