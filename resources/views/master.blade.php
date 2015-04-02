<html>
<head>
    <title>Gapps Console</title>

    <link rel="stylesheet" href="/semantic/semantic.min.css">
    <link rel="stylesheet" href="/css/style.css"/>
</head>
<body>
@include('sections.header')
<div class="ui page grid sitecontent">
    <div class ="row">
        <div class ="column">
@yield('content')
@yield('footer')
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="/semantic/semantic.min.js" type="text/javascript"></script>

<script type="text/javascript">

</script>
</body>

</html>
