@extends('layouts.admin')
@section('title', '登録済みアイテム詳細の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>アイテム詳細の一覧</h2>
        </div>
        
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="10%">商品ID</th>
                                <th width="10%">サイズ</th>
                                <th width="20%">カラー</th>
                                <th width="20%">値段</th>
                                <th width="20%">在庫数</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($variations as $variation)
                                <tr>
                                    <th>{{ $variation->id }}</th>
                                    <th>{{ $variation->goods_id }}</th>
                                    <th>{{ $variation->size }}</th>
                                    <th>{{ $variation->color }}</th>
                                    <th>{{ $variation->goods_variations_details->price }}</th>
                                    <th>{{ $variation->goods_variations_details->stock }}</th>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\GoodsVariationController@edit', ['id' => $variation->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\GoodsVariationController@delete', ['id' => $variation->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection