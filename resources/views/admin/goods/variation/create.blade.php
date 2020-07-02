@extends('layouts.admin')
        @section('title', 'アイテムバリエーションの詳細')
        
        @section('content')
        
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2>アイテムバリエーションの詳細</h2>
                        <form action="{{ action('Admin\GoodsVariationController@create') }}" method="post" enctype="multipart/form-data">
                             @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group row">
                                <label class="col-md-2">アイテムID</label>
                                <div class="col-md-10">
                                    <select name="category_type_id">
                                        @foreach($variations as $variation)
                                            <option value="{{ $variation->goods_id }}">
                                                {{ $variation->goods->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">サイズ</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="size" value="{{ old('size') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">カラー</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="color" value="{{ old('color') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">値段</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">在庫数</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="stock" value="{{ old('stock') }}">
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
