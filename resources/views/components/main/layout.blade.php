<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('style/images/favicon.png') }}">
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('style/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/revolution/css/navigation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/type/type.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/css/color/purple.css') }}">
</head>
<body>
<div class="content-wrapper">

    {{ $slot }}

</div>

<script src="{{ asset('js/init.js') }}"></script>
<script src="{{ asset('style/js/jquery.min.js') }}"></script>
<script src="{{ asset('style/js/popper.min.js') }}"></script>
<script src="{{ asset('style/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('style/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('style/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('style/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('style/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('style/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('style/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('style/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('style/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('style/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('style/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('style/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('style/js/plugins.js') }}"></script>
<script src="{{ asset('style/js/scripts.js') }}"></script>
</body>
</html>
