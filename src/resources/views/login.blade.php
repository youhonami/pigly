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
            <input type="email" name="email" placeholder="メールアドレスを入力" required />
            <label for="password">パスワード</label>
            <input type="password" name="password" placeholder="パスワードを入力" required />
            <button type="submit">ログイン</button>
        </form>

        <a href="{{ route('register') }}">アカウント作成はこちら</a>
    </div>
</body>

</html>