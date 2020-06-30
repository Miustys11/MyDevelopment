@extends('layouts.front')
 
@section('content')
<div class="cantact">
    <div class="contact-container">
        <h1 style="width: 370px; margin: 0 auto; text-align: center; padding: 40px 0 60px 0">お問い合わせフォーム</h1>
        <form method="POST" action="{{ route('contact.confirm') }}">
            @csrf
        
            <div class="contact-box">
                <label>メールアドレス</label>
                <input
                    name="email"
                    value="{{ old('email') }}"
                    type="text">
                @if ($errors->has('email'))
                    <p class="error-message" style="color: red;">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="contact-box">
                <label id="title-labal">タイトル</label>
                <input
                    name="title"
                    value="{{ old('title') }}"
                    type="text">
                @if ($errors->has('title'))
                    <p class="error-message" style="color: red;">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="contact-box" style="width: 600px; height: 200px; margin-top: 30px;">
                <label style="margin-right: 15px; margin-top: 0;">お問い合わせ内容</label>
                <textarea name="body" id="cantact-body">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                    <p class="error-message" style="color: red;">{{ $errors->first('body') }}</p>
                @endif
            </div>
        
            <div class="contact-box" style="width: 103px; margin-top: 50px;">
                <button type="submit">
                    入力内容確認
                </button>
            </div>
        </form>
    </div>
</div>
@endsection