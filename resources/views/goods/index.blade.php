@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="goods-container">
            <div class="slide">
                <img alt="slide show" src="{{ asset('/img/logo/slide2.png') }}">
            </div>
            <div clss="goods-category">
                <h1 style="margin-top: 50px;">商品カテゴリ</h1>
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