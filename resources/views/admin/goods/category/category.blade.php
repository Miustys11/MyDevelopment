@extends('layouts.admin')
@section('title', 'カテゴリ一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>カテゴリ一覧</h2>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="15%">カテゴリ番号</th>
                                <th width="15%">タイプ名</th>
                                <th width="70%">カテゴリ名</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th>{{ $category->id }}</th>
                                    <th>{{ $category->category_type_id }}</th>
                                    <td>{{ \Str::limit($category->name, 100) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection