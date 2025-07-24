<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン | PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
    <div class="auth-container">
        <h1 class="title">PiGLy</h1>

        <h2>ログイン</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">メールアドレス</label>
            <input type="text" name="email" value="{{ old('email') }}">
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror


            <label for="password">パスワード</label>
            <input type="password" name="password">
            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror

            <button type="submit">ログイン</button>
        </form>

        <a href="{{ route('register') }}">アカウント作成はこちら</a>
    </div>
</body>

</html>