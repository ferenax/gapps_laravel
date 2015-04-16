<html>
<head>
    <title>Google Apps for Work Console</title>

    <link rel="stylesheet" href="/semantic/semantic.min.css">
    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">
</head>
<body>

@include('sections.header')
@if(\Auth::check())
    @include('sections.sidebar')
@endif
<div id="siteContent">
    @yield('banners')
    <div class="ui page grid">
        <div class ="row">
            <div class ="column">
    @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="/semantic/semantic.min.js" type="text/javascript"></script>

<script>

    $("#tog").click(function() {
        $('.left.sidebar')
                .sidebar('setting', 'transition', 'overlay')
                .sidebar('setting', { dimPage: false })
                .sidebar('toggle');
    });

    $('.menu .item')
            .tab()
    ;

</script>
</body>

</html>
