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
            <input type="text" id="name" name="name" placeholder="名前を入力" required>

            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" placeholder="メールアドレスを入力" required>

            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" placeholder="パスワードを入力" required>

            <button type="submit">次に進む</button>
        </form>

        <a href="{{ route('login') }}">ログインはこちら</a>
    </div>
</body>

</html>