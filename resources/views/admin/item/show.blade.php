{{-- layouts/common.blade.phpを読み込む --}}
@extends('layouts.common')


{{-- common.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '商品詳細')

{{-- common.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="main-container">
        <div class="image-container">
            <image src="../../../myimages/clothes/clothes1.jpg">
            <image src="../../../myimages/clothes/clothes2.jpg">
            <image src="../../../myimages/clothes/clothes3.jpg">
            <image src="../../../myimages/clothes/clothes4.jpg">
        </div>
        <div class="detail">
            <h1>- Pure Cashmere Turtleneck Sweater</h1>
            <p>¥1,3200</p>
            <h3>▫サイズを選択️</h3>
            <div class="size-select">
                <button type="button">JP XS</button>
                <button type="button">JP S</button>
                <button type="button">JP M</button>
                <button type="button">JP L</button>
                <button type="button">JP XL</button>
                <button type="button">JP 2XL</button>
            </div>
            <div>
                <h1><button type="button" class="bg-black">カートに追加</button></h1>
                <h1><button type="button" class="bg-white">お気に入りに追加️</button></h1>
            </div>
            <div class="description">
                <p>
                    <span>カシミアはウールより2〜3倍暖かく、<br>37℃の保護を提供します。</span>
                    <span>タートルネックのデザインは、怠惰でシンプル、そして快適です。<br></span>
                    <span>レギュラーフィットで目立ちますので、内側に履いてもかさばりません。</span>
                    <span>この豪華なカシミアセーターは、<br>クローゼットのもう1つの定番になります。</span>
                </p>
                <ul>
                    <li>表示カラー : ベージュ、グレー、ホワイト、ブラウン</li>
                    <li>原産地 : 中国</li>
                </ul>
                <a href="#">商品の詳細を表示</a>
            </div>
        </div>
    </div>
@endsection