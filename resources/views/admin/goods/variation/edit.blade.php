@extends('layouts.admin')
@section('title', 'アイテム詳細の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>アイテム詳細の編集</h2>
                <form action="{{ action('Admin\GoodsVariationController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">商品ID</label>
                        <div class="col-md-10">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">サイズ</label>
                        <div class="col-md-10">
                            <input type="checkbox" name="size" value="XS" class="size">XS
                            <input type="checkbox" name="size" value="S" class="size">S
                            <input type="checkbox" name="size" value="M" class="size">M
                            <input type="checkbox" name="size" value="L" class="size">L
                            <input type="checkbox" name="size" value="XL" class="size">XL
                            <input type="checkbox" name="size" value="2XL" class="size">2XL
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">カラー</label>
                        <div class="col-md-10">
                        <input type="checkbox" name="color" value="{{ old('color') }}">ホワイト<br>
                            <input type="checkbox" name="color" value="{{ old('color') }}">ライトグレー<br>
                            <input type="checkbox" name="color" value="{{ old('color') }}">ダークグレー<br>
                            <input type="checkbox" name="color" value="{{ old('color') }}">ブラック<br>
                            <input type="checkbox" name="color" value="{{ old('color') }}">ピンク<br>
                            <input type="checkbox" name="color" value="{{ old('color') }}">オレンジ<br>
                            <input type="checkbox" name="color" value="{{ old('color') }}">ベージュ<br>
                            <input type="checkbox" name="color" value="{{ old('color') }}">クリーム<br>
                            <input type="checkbox" name="color" value="{{ old('color') }}">イエロー<br>
                            <input type="checkbox" name="color" value="{{ old('color') }}">ライトグリーン<br>
                            <input type="checkbox" name="color" value="{{ old('color') }}">オリーブ<br>
                            <input type="checkbox" name="color" value="{{ old('color') }}">ブルー<br>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">値段</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="price" value="{{ $form->price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">在庫数</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="stock" value="{{ $form->stock }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $goods_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection