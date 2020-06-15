@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="goods-container">
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
        </div>
    </div>
@endsection