@extends('layouts.front')

@section('content')
<h1 class="confirm">確認</h1>
<form method="POST" action="{{ route('contact.send') }}">
    @csrf
    <div class="confirm-container">
        <div class="confirm-box">
            <label>メールアドレス</label><br>
            <p class="input-box">{{ $inputs['email'] }}<p>
            <input name="email" value="{{ $inputs['email'] }}" type="hidden">
        </div>

        <div class="confirm-box">
            <label id="input-label">タイトル</label><br>
            <p class="input-box"> {{ $inputs['title'] }}</p>
            <input name="title" value="{{ $inputs['title'] }}" type="hidden">
        </div>

        <div class="confirm-box">
            <label>お問い合わせ内容</label>
            <p class="input-box">{!! nl2br(e($inputs['body'])) !!}</p>
            <input name="body" value="{{ $inputs['body'] }}" type="hidden">
        </div>

        <div id="confirm-box1">
            <button type="submit" name="action" value="back">
                入力内容修正
            </button>
        </div>
        <div id="confirm-box2">
            <button type="submit" name="action" value="submit">
                送信する
            </button>
        </div>
    </div>
</form>
@endsection