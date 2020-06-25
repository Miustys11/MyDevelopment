@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="goods-container">
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
        </div>
    </div>
@endsection