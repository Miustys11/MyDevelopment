@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="goods-container">
            <div class="slide">
                <img alt="slide show" src="{{ asset('/img/logo/slide.png') }}">
            </div>
            <form action="{{ action('GoodsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2" id="goods-name">アイテム名</label>
                        <div class="col-md-8" id="search-box">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
            </form>
            <h1 id="popular-goods">人気の商品</h1>
            @foreach ($posts as $post)
                <div class="goods-box">
                    <div class="image">
                        @if ($post->image_path)
                            <img src="{{ asset('storage/image/'  . $post->image_path) }}">
                        @endif
                    </div>
                    <div class="goods-name">
                        <h1><a href="/goods/{{ $post->id }}">{{ str_limit($post->name, 150) }}</a></h1>
                    </div>
                    <div class="amount">
                        <p>¥{{ str_limit($post->amount, 150) }}</p>
                    </div>
                </div>
            @endforeach
            <div clss="goods-category">
                <h1>商品カテゴリ</h1>
                <ul class="category">
                    <li>
                        <h2><a href="#">WOMAN</a></h2>
                    </li>
                    <li>
                        <h2><a href="#">MAN</a></h2>
                    </li>
                    <li>
                        <h2><a href="#">KIDS</a></h2>
                    </li>
                    <li>
                        <h2><a href="#">BABY</a></h2>
                    </li>
                </ul>
                <div class="sub-category">
                    <div class="sub shirts,blouse">
                        <a href="#">
                            <img alt="shirts,blouse" src="{{ asset('/img/category/shirts2.jpg') }}">
                            <div class="float1">
                                <h2>シャツ・ブラウス</h2>
                            </div>
                        </a>
                    </div>
                    <div class="sub t-shirts">
                        <a href="#">
                            <img alt="t-shirts" src="{{ asset('/img/category/t-shirts2.jpg') }}">
                            <div class="float2">
                                <h2>Tシャツ</h2>
                            </div>
                        </a>
                    </div>
                    <div class="sub knit">
                        <a href="#">
                            <img alt="knit" src="{{ asset('/img/category/knit.jpg') }}">
                            <div class="float2">
                                <h2>ニット</h2>
                            </div>
                        </a>
                    </div>
                    <div class="sub jeans">
                        <a href="#">
                            <img alt="jeans" src="{{ asset('/img/category/jeans3.jpg') }}">
                            <div class="float2">
                                <h2>ジーンズ</h2>
                            </div>
                        </a>
                    </div>
                    <div class="sub jeans">
                        <a href="#">
                            <img alt="jeans" src="{{ asset('/img/category/skirt.jpg') }}">
                            <div class="float2">
                                <h2>スカート</h2>
                            </div>
                        </a>
                    </div>
                    <div class="sub jeans">
                        <a href="#">
                            <img alt="jeans" src="{{ asset('/img/category/dress.jpg') }}">
                            <div class="float2">
                                <h2>ワンピース</h2>
                            </div>
                        </a>
                    </div>
                    <div class="sub jeans">
                        <a href="#">
                            <img alt="jeans" src="{{ asset('/img/category/hoodie.jpg') }}">
                        <div class="float2">
                            <h2>スウェット</h2>
                        </div>
                        </a>
                    </div>
                    <div class="sub jeans">
                        <a href="#">
                            <img alt="jeans" src="{{ asset('/img/category/jacket2.jpg') }}">
                            <div class="float2">
                                <h2>ジャケット</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection