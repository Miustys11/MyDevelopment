@extends('layouts.admin')
@section('title', 'アイテムバリエーションの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>アイテムバリエーションの編集</h2>
                <form action="{{ action('Admin\GoodsVariationController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">アイテムID</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">サイズ</label>
                        <div class="col-md-10">
                            <select name="category_type_id">
                                @foreach(Constant::CONST["SIZE_LIST"] as $type)
                                    <option value="{{ $type->id }}" {{ $goods_form->category_type_id === $type->id ? "selected" : "" }}>
                                        {{ $type->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">カラー</label>
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