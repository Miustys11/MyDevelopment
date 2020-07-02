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
                                <label class="col-md-2">タイプ名</label>
                                <div class="col-md-10">
                                    <select name="category_type_id">
                                        @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                                <label class="col-md-2">サブカテゴリ名</label>
                                <div class="col-md-10">
                                    <select name="sub_category_id">
                                        @foreach($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
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
