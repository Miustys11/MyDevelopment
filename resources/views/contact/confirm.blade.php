@extends('layouts.front')

@section('content')
<h1 style="font-size: 20px; text-align: center; margin: 100px 0 30px 0;">確認</h1>
<form method="POST" action="{{ route('contact.send') }}">
    @csrf

    <div class="confirm-box">
        <label>メールアドレス：</label>
        {{ $inputs['email'] }}
        <input name="email" value="{{ $inputs['email'] }}" type="hidden">
    </div>

    <div class="confirm-box">
        <label style="margin-left: 30px;">タイトル：</label>
        {{ $inputs['title'] }}
        <input name="title" value="{{ $inputs['title'] }}" type="hidden">
    </div>

    <div class="confirm-box">
        <label>お問い合わせ内容：</label>
        {!! nl2br(e($inputs['body'])) !!}
        <input name="body" value="{{ $inputs['body'] }}" type="hidden">
    </div>

    <div class="confirm-box" style="width: 103px; height: 30px; margin-top: 50px;">
        <button type="submit" name="action" value="back">
            入力内容修正
        </button>
    </div>
    <div class="confirm-box" style="width: 75px; margin-top: 30px;">
        <button type="submit" name="action" value="submit">
            送信する
        </button>
    </div>
</form>
@endsection