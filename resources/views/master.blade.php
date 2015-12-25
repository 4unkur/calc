<!doctype html>
<html lang="ky">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="{{ url('') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Correlation calculator">
    <meta property="og:description" content="This web application calculates correlation and other thing from given values" />
    <meta property="og:image" content="/img/blur.jpg">

    <title>Корреляция эсептөө</title>

    <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>

<header>
    @include('headermenu')
</header>

<div class="container">
    @yield('content')
</div>


<footer class="footer">
    <div class="container">
        <p>
            <span class="pull-left">
                <span id="fb-root"></span>
                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1608032129414638";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>

                <span class="fb-like" data-href="{{ url('') }}" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></span>
            </span>
            <small class="pull-right">Copyright © {{ \Carbon\Carbon::now()->format('Y') }}, <a href="https://github.com/4unkur">4unkur</a> All rights reserved.</small>
        </p>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
</body>
</html>