<!DOCTYPE html>
<html>
<head>
    <title>Custom Login And Registration in Laravel 8</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>
@yield('content')
<style type="text/css">
    html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:700}dfn{font-style:italic}h1{font-size:2em;margin:.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{-moz-box-sizing:content-box;box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type="checkbox"],input[type="radio"]{box-sizing:border-box;padding:0}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{height:auto}input[type="search"]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{border:0;padding:0}textarea{overflow:auto}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}
    body{
        margin: 0;
        padding: 0;
        text-align: left;
    }
</style>
</head>
<body style="font-size: 14px; position: relative; padding: 0;">
<div class="map">
    <div class="wrp">
        <div class="map-box">
            <h2>Наши контакты</h2>
            <p>г. Москва, Тверская 7</p>
            <p><a href="tel:+7 (495) 123-45-67">+7 (495) </a></p>
            <p><a href="mailto:info@site.com">  почта </a></p>
        </div>
    </div>
    <div id="map"></div>
</div>
<style type="text/css">
    .wrp {
        max-width: 900px;
        margin: 0 auto;
        position: relative;
    }
    .map-box {
        position: absolute;
        top: 70px;
        right: 20px;
        padding: 20px;
        background: #fff;
        border: 1px solid #ddd;
        z-index: 100;
        width: 250px;
        box-shadow: -1px -1px 24px 0px rgba(50, 50, 50, 0.5);
    }
    .map-box p {
        font-size: 18px;
    }
    #map {
        width: 100%;
        height: 350px;
    }
</style>
<script src="//api-maps.yandex.ru/2.0/?apikey=6f93606d-8948-4c52-8db6-363d427c0571&load=package.full&lang=ru-RU"></script>
<script>
    ymaps.ready(init);
    function init(){
        var myMap = new ymaps.Map("map",{center: [55.85,37.45],zoom: 13});

        // Элементы управления картой
        //myMap.controls.add("zoomControl").add("typeSelector").add("mapTools");

        ymaps.geocode("г. Москва, Тверская 7").then(function (res) {
            var coord = res.geoObjects.get(0).geometry.getCoordinates();
            var myPlacemark = new ymaps.Placemark(coord, {}, {
                iconImageHref: "/img/map.png",
                iconImageSize: [54, 74],
                iconImageOffset: [-27, -74]
            });
            myMap.geoObjects.add(myPlacemark);
            myMap.setCenter(coord);

            // Сдвиг центра карты влево
            var newcoord = myMap.getGlobalPixelCenter();
            newcoord[0] += 150;
            myMap.setGlobalPixelCenter(newcoord);
        });
    }
</script>
</html>
