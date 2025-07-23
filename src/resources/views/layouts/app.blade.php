<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('styles')
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <h1><a href="{{ route('index') }}">PiGLy</a></h1>
        </div>
        <div class="header__buttons">
            <a href="{{ route('weight.target.edit') }}" class="btn-setting">目標体重設定</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn-logout">ログアウト</button>
            </form>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>