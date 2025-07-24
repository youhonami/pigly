<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>新規会員登録 | PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
    <div class="auth-container">
        <h1 class="title">PiGLy</h1>
        <h2 class="subtitle">新規会員登録</h2>
        <p class="step">STEP1 アカウント情報の登録</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">お名前</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror

            <label for="email">メールアドレス</label>
            <input type="text" name="email" value="{{ old('email') }}">
            @error('email') <p class="error">{{ $message }}</p> @enderror

            <label for="password">パスワード</label>
            <input type="password" name="password">
            @error('password') <p class="error">{{ $message }}</p> @enderror

            <button type="submit">次に進む</button>
        </form>


        <a href="{{ route('login') }}">ログインはこちら</a>
    </div>
</body>

</html>