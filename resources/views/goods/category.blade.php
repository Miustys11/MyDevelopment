@extends('layouts.front')

@section('content')
    <div class="container">
        <form action="{{ action('GoodsController@getSubCategory', ['sub_category_id' => request()->sub_category_id]) }}" method="get" style="width: 960px; margin: 0 90px;">
            <div class="form-group row">
                <label class="col-md-2" id="goods-name">アイテム名</label>
                <div class="col-md-8" id="search-box">
                    <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}" id="search-text">
                </div>
                <div class="col-md-2">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="検索">
                </div>
            </div>
        </form>
        <ul class="target-area search-now position-absolute bg-white card p-4 d-none">
            @foreach ($goods as $item)
                <li style="list-style: none;">{{ $item->name }}</li>
            @endforeach
        </ul>
        <div class="category">
            @foreach ($goods as $item)
                <div class="goods-box">
                    <div class="img">
                        @if ($item->image_path)
                            <img src="{{ asset('storage/image/'  . $item->image_path) }}">
                        @endif
                    </div>
                    <div class="goodsName">
                        <h1><a href="/goods/{{ $item->sub_category_id }}">{{ str_limit($item->name, 150) }}</a></h1>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
@endsection