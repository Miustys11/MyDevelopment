@extends('layouts.front')
 
@section('content')
<div class="cantact">
    <div class="contact-container">
        <h1>お問い合わせフォーム</h1>
        <div class="border"></div>
        <form method="POST" action="{{ route('contact.confirm') }}">
            @csrf
        
            <div class="contact-box">
                <input
                    name="email"
                    value="{{ old('email') }}"
                    type="text"
                    placeholder="メールアドレス"
                    >
                @if ($errors->has('email'))
                    <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="contact-box">
                <input
                    name="title"
                    value="{{ old('title') }}"
                    type="text"
                    placeholder="タイトル"
                    class="form-box"
                    >
                @if ($errors->has('title'))
                    <p class="error-message">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div id="content">
                <textarea name="body" id="cantact-body" placeholder="お問い合わせ内容">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                    <p class="error-message">{{ $errors->first('body') }}</p>
                @endif
            </div>
        
            <div id="confirm-content">
                <button type="submit" class="btn-square-slant">
                    入力内容確認
                </button>
            </div>
        </form>
    </div>
</div>
@endsection