@extends('layouts.admin')
@section('title', 'タイプ一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>タイプ一覧</h2>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="30%">タイプ番号</th>
                                <th width="70%">タイプ名</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($types as $type)
                                <tr>
                                    <th>{{ $type->id }}</th>
                                    <td>{{ \Str::limit($type->name, 100) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection