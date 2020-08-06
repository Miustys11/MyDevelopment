@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="goods-container">
            <div class="slide">
                <img alt="slide show" src="{{ asset('/img/logo/slide.png') }}">
            </div>
            <div clss="goods-category">
                <h1 class="category-title">商品カテゴリ</h1>
                <ul class="category" id="category">
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
                    @foreach($sub_categories as $sub_category)
                        @if($sub_category->category->category_type_id === 1)
                            @php
                                $image = '/img/sub_category/' . $sub_category->category->category_type_id . '_' . $sub_category->name . '.jpg'
                            @endphp
                            <div class="sub">
                                <a href="/sub_category/{{ $sub_category->id }}" >
                                    <img alt="{{ $sub_category->name }}" src="{{ asset($image) }}">
                                    <div class="float1">
                                        <h2>{{ $sub_category->name }}</h2>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="recommendation">
                <h1>今週のオススメ</h1>
                <div class="recommend-image">
                    <img alt="recommend" src="{{ asset('/img/logo/recommend.png') }}">
                </div>
                <div class="recommend-details">
                    <div class="main-detail">
                        <h2>好評販売中</h2>
                        <p>MIUSTY'S一押しのサマーアイテム</p>
                        <h1>#フレアワンピース</h1>
                    </div>
                    <div class="sub-detail">
                        <h1>WOMAN</h1>
                        <h2>マーセライズコットンロングTワンピース</h2>
                        <p>¥1,990</p>
                    </div>
                </div>
            </div>
            <div class="ranking">
                <h1>ランキング</h1>
                @foreach ($goods_ranking as $key => $ranking)
                    <div class="ranking-list">
                        <p class="rank-order">No.{{ $loop->iteration }}</p>
                        <img src="{{ $ranking->image_path }}">
                        <div class="ranking-name">
                            <h1>{{ $ranking->name }}</h1>
                        </div>
                        <div class="price">
                            <p>¥1,500</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="recommends-fashion">
                <h1 class="summer-recommend-fashion">この夏オススメのサマーファッション</h1>
                <div class="recommends-container">
                    <img alt="recommend" src="{{ asset('/img/recommend/recommend1.jpg') }}">
                    <div class="fashion-detail1">
                        <h2>
                            ジャガードカシュクールトップスXパンツ<br>セットアップ
                        </h2>
                        <h3>- ¥2,350</h3>
                        <p>大人コーデが即完成するセットアップ</p>
                    </div>
                </div>
                <div class="recommends-container">
                    <div class="fashion-detail2">
                        <h2>
                            プリーツ切替キャミワンピース
                        </h2>
                        <h3>- ¥2,900</h3>
                        <p>シンプルな統一感が大人っぽさを演出</p>
                    </div>
                    <img alt="recommend" src="{{ asset('/img/recommend/recommend3.jpg') }}">
                </div>
                <div class="see-more">
                    <button class="see-more-btn">
                        <p>もっと見る</p>
                    </button>
                </div>
                <div></div>
            </div>
        </div>
    </div>
@endsection