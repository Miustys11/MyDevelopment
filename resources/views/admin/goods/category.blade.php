@extends('layouts.admin')
@section('title', 'カテゴリ一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>カテゴリ一覧</h2>
                <br>

                @if (count($list) > 0)
                    <br>
                    {{ $list->links() }}
                    <table class="table table-striped">
                        <tr>
                            <th width="120px">カテゴリ番号</th>
                            <th>カテゴリ名</th>
                            <th width="60px">表示順</th>
                        </tr>
                        @foreach ($list as $category)
                            <tr data-category_id="{{ $category->id }}">
                                <td>
                                    <span class="category_id">{{ $category->id }}</span>
                                </td>
                                <td>
                                    <span class="name">{{ $category->name }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <br>
                    <p>カテゴリがありません。</p>
                @endif

            </div>
        </div>
    </div>
@endsection