@extends('layouts.show')

@section('content')
    <div class="container">
        <div class="body-container">
            <div class="link">
                <ol>
                    <li><a href="{{ action('GoodsController@index') }}">ユニクロTOP</a> ></li>
                    <li><a href="#">WOMANトップ</a> ></li>
                    <li><a href="#">Tシャツ（半袖・タンクトップ）</a> ></li>
                    <li><a href="#">マーセライズコットンボートネックT（半袖）</a></li>
                </ol>
                <div class="detail">
                    <div class="details top" id="top">
                        <div class="goods-name">
                            <h1>{{ $goods->name }}</h1>
                        </div>
                        <div class="description">
                            <p>{{ $goods->description }}</p>
                        </div>
                        <div class="card-body" style="color: red;">
                            {{ $goods->amount }}円
                        </div>
                    </div>
                    <div class="image">
                        <img src="{{ asset('storage/image/'  . $goods->image_path) }}">
                    </div>
                    <div class="details bottom" id="bottom">
                        <div class="select-color">
                            <h1>・カラーを選択</h1>
                        </div>
                        <div class="select-size">
                            <h1>・サイズを選択</h1>
                        </div>
                         <button id="cart"><a href="#">カートに追加</a></button>
                         <button id="confirm-stock"><a href="#">店舗の在庫を確認する</a></button>
                         <ul class="link-more">
                             <li><a href="#">はじめてのお客様へ</a></li>
                             <li><a href="#">在庫について</a></li>
                             <li><a href="#">返品・返金・交換について</a></li>
                             <li><a href="#">法人のお客様へ</a></li>
                             <li><a href="#">大量購入希望のお客様へ</a></li>
                         </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection