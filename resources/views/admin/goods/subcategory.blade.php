@extends('layouts.admin')
@section('title', 'サブカテゴリ一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>サブカテゴリ一覧</h2>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="15%">サブカテゴリ番号</th>
                                <th width="15%">カテゴリ名</th>
                                <th width="70%">サブカテゴリ名</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sub_categories as $sub_category)
                                <tr>
                                    <th>{{ $sub_category->id }}</th>
                                    <th>{{ $sub_category->category->name }}</th>
                                    <td>{{ \Str::limit($sub_category->name, 100) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection