<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/show.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <div class="header-container">
                <div class="header-logo">
                    <a href="{{ action('GoodsController@index') }}">
                        <img alt="UNIQLO" src="{{ asset('/img/uniqlo.png') }}">
                    </a>
                </div>
                <ul class="clearflex">
                    <li><a href="#">WOMAN</a></li>
                    <li><a href="#">MAN</a></li>
                    <li><a href="#">KIDS</a></li>
                    <li><a href="#">BABY</a></li>
                    <li><a href="#">CAMPANY</a></li>
                </ul>
            </div>
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>