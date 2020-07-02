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
            <!--<h1 id="popular-goods">人気の商品</h1>-->
            <!--@foreach ($posts as $post)-->
            <!--    <div class="goods-box">-->
            <!--        <div class="image">-->
            <!--            @if ($post->image_path)-->
            <!--                <img src="{{ asset('storage/image/'  . $post->image_path) }}">-->
            <!--            @endif-->
            <!--        </div>-->
            <!--        <div class="goods-name">-->
            <!--            <h1><a href="/goods/{{ $post->id }}">{{ str_limit($post->name, 150) }}</a></h1>-->
            <!--        </div>-->
                    <!--<div class="amount">-->
                    <!--    <p>¥{{ str_limit($post->amount, 150) }}</p>-->
                    <!--</div>-->
            <!--    </div>-->
            <!--@endforeach-->
            <div clss="goods-category">
                <h1 style="margin-top: 50px;">商品カテゴリ</h1>
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
                    @foreach($sub_categories as $sub_category)
                        @if($sub_category->category->type_id === 1)
                            @php
                                $image = '/img/sub_category/' . $sub_category->category->type_id . '_' . $sub_category->name . '.jpg'
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
        </div>
    </div>
@endsection