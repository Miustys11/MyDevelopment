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
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection