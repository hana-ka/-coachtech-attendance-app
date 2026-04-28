@extends('layouts.default')

@section('title', '会員登録')

<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

@section('content')
<div class="auth">
    <h1 class="auth-title">会員登録</h1>

    <form method="POST" action="/register" class="auth-form">
        @csrf

        <div class="auth-group">
            <label for="name" class="auth-label">名前</label>
            <input type="text" id="name" name="name" class="auth-input">
        </div>

        <div class="login-group">
            <label for="email" class="auth-label">メールアドレス</label>
            <input type="email" id="email" name="email" class="auth-input">
        </div>

        <div class="auth-group">
            <label for="password" class="auth-label">パスワード</label>
            <input type="password" id="password" name="password" class="auth-input">
        </div>

        <div class="auth-group">
            <label for="password_confirmation" class="auth-label">パスワード確認</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="auth-input">
        </div>

        <button type="submit" class="auth-button">
            登録する
        </button>
    </form>

    <div class="auth-link">
        <a href="/login" class="auth-link-text">ログインはこちら</a>
    </div>
</div>
@endsection