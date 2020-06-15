@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <!--is_null メソッドはnullであればtrue、それ以外であればfalseを返す-->
        <!--「!」は否定演算子と呼ばれ、「true、falseを反転する」という意味を持つ-->
        <!--ということは、$headline が空なら飛ばして（実行しない）、データがあれば実行する-->
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row-box">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <!--asset は、「publicディレクトリ」のパスを返すヘルパで、現在のURLのスキーマ（httpかhttps）を使い、
                                        アセットへのURLを生成するメソッド-->
                                        <!--結合演算子を使って、画像が保存されているパスのURLを生成している-->
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="goods-name">
                                    <h1>{{ str_limit($headline->name, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->amount, 70) }}</p>
                        </div>
                        <!--<div class="col-md-6">-->
                        <!--    <p class="body mx-auto">{{ str_limit($headline->size, 70) }}</p>-->
                        <!--</div>-->
                        <!--<div class="col-md-6">-->
                        <!--    <p class="body mx-auto">{{ str_limit($headline->description, 650) }}</p>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    <!--日付のフォーマット変更-->
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->name, 150) }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->amount, 150) }}
                                </div>
                                <!--<div class="title">-->
                                <!--    {{ str_limit($post->size, 150) }}-->
                                <!--</div>-->
                                <!--<div class="body mt-3">-->
                                <!--    {{ str_limit($post->description, 1500) }}-->
                                <!--</div>-->
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection