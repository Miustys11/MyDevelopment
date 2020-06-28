<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>My Goods</title>
    </head>
    <body>
        @extends('layouts.admin')
        @section('title', '商品詳細')
        
        @section('content')
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2>商品詳細</h2>
                        <form action="{{ action('Admin\GoodsController@create') }}" method="post" enctype="multipart/form-data">
                             @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group row">
                                <label class="col-md-2">カテゴリ名</label>
                                <div class="col-md-10">
                                    <select name="category_id">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">商品名</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">値段</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="amount" value="{{ old('amount') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">サイズ</label>
                                <div class="col-md-10">
                                    <input type="radio" class="radio" name="size" value="XS" {{ (old("size", "XS") === "XS" ) ? "checked" : "" }}>JP XS
                                    <input type="radio" class="radio"  name="size" value="S" {{ (old("size") === "S" ) ? "checked" : "" }}>JP S
                                    <input type="radio" class="radio"  name="size" value="M" {{ (old("size") === "M" ) ? "checked" : "" }}>JP M
                                    <input type="radio" class="radio"  name="size" value="L" {{ (old("size") === "L" ) ? "checked" : "" }}>JP L
                                    <input type="radio" class="radio"  name="size" value="XL" {{ (old("size") === "XL" ) ? "checked" : "" }}>JP XL
                                    <input type="radio" class="radio"  name="size" value="2XL" {{ (old("size") === "2XL" ) ? "checked" : "" }}>JP 2XL
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">説明</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="description" rows="20">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">画像</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control-file" name="image">
                                </div>
                            </div>
                            {{ csrf_field() }}
                        　　<input type="submit" class="btn btn-primary" value="更新">
                        </form>
                    </div>
                </div>
            </div>
        @endsection
    </body>
</html>
