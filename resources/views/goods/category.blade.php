@extends('layouts.show')

@section('content')
    <div class="container">
        <div class="category">
            @foreach ($goods as $item)
                <h1>{{ $item->sub_category->name }}</h1>
                <div class="goods-box">
                    <div class="image">
                        @if ($item->image_path)
                            <img src="{{ asset('storage/image/'  . $item->image_path) }}">
                        @endif
                    </div>
                    <div class="goods-name">
                        <h1><a href="/goods/{{ $item->sub_category_id }}">{{ str_limit($item->sub_category->name, 150) }}</a></h1>
                    </div>
                    <div class="amount">
                        <p>¥{{ str_limit($item->amount, 150) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>