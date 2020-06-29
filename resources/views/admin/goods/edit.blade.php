@extends('layouts.admin')
@section('title', 'アイテムの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>アイテム編集</h2>
                <form action="{{ action('Admin\GoodsController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">タイプ名</label>
                        <div class="col-md-10">
                            <select name="category_type_id">
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ $goods_form->category_type_id === $type->id ? "selected" : "" }}>
                                        {{ $type->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">カテゴリ名</label>
                        <div class="col-md-10">
                            <select name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $goods_form->category_id === $category->id ? "selected" : "" }}>
                                        {{ $category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">サブカテゴリ名</label>
                        <div class="col-md-10">
                            <select name="sub_category_id">
                                @foreach($sub_categories as $sub_category)
                                    <option value="{{ $sub_category->id }}" {{ $goods_form->sub_category_id === $sub_category->id ? "selected" : "" }}>
                                        {{ $sub_category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">商品名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $goods_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="amount">値段</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="amount" value="{{ $goods_form->amount }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="size">サイズ</label>
                        <div class="col-md-10">
                            <input type="radio" name="size" value="XS" {{ (old("size", $goods_form->size) === "XS") ? "checked" : "" }}>JP XS
                            <input type="radio" name="size" value="S" {{ (old("size", $goods_form->size) === "S") ? "checked" : "" }}>JP S
                            <input type="radio" name="size" value="M" {{ (old("size", $goods_form->size) === "M") ? "checked" : "" }}>JP M
                            <input type="radio" name="size" value="L" {{ (old("size", $goods_form->size) === "L") ? "checked" : "" }}>JP L
                            <input type="radio" name="size" value="XL" {{ (old("size", $goods_form->size) === "XL") ? "checked" : "" }}>JP XL
                            <input type="radio" name="size" value="2XL" {{ (old("size", $goods_form->size) === "2XL") ? "checked" : "" }}>JP 2XL
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="description">説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="20">{{ $goods_form->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $goods_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
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
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            <!--foreachはnullに対して利用できないので、「!=」を使う-->
                            @if ($goods_form->histories != NULL)
                                @foreach ($goods_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection