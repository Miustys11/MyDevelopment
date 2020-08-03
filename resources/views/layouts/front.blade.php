<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/9cd77c6647.js" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    </head>
    <body>
        <div>
            <div class="header-container">
                <div class="header-logo">
                    <a href="{{ action('GoodsController@index') }}">
                        <img alt="UNIQLO" src="{{ asset('/img/logo/miusty.png') }}">
                    </a>
                </div>
                <ul class="clearflex">
                    <li><a href="#">WOMAN</a></li>
                    <li><a href="#">MAN</a></li>
                    <li><a href="#">KIDS</a></li>
                    <li><a href="#">BABY</a></li>
                    <li><a href="{{ action('ContactController@index')}}">CONTACT</a></li>
                </ul>
                <div class="cart-item">
                    <a href="{{ action('CartController@myCartList')}}"><img src="{{ asset('/img/cart/cart1.png')}}"></a>
                </div>
                <div class="login">
                    {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                    @if(!Auth::guard('user')->check())
                        <li id="login-link"><a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a></li>
                    {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                    @else
                        <li class="nav-item dropdown" style="height: 10px;list-style: none; ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard("user")->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest 
                </div>
            </div>
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
                @yield('form')
            </main>
            <footer>
                <div class="footer-container">
                    <div class="info-box">
                        <ul>
                            <li><a href="{{ action('ContactController@index')}}">お問い合わせ</a></li>
                            <li><a href="#">利用規約</a></li>
                            <li><a href="#">企業情報</a></li>
                            <li><a href="#">プライバシーポリシー</a></li>
                        </ul>
                    </div>
                    <div class="caution">
                        <p>本ページの価格は税抜価格（本体価格）表記です。別途、お支払い時に消費税を頂きます。</p>    
                    </div>
                    <div class="copy-right">
                        <small>Copyright (c) MIUSTY OFFICIAL All Rights Reserved.</small>
                    </div> 
                </div>
            </footer>
        </div>
    </body>
</html>