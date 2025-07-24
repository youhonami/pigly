<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <!-- headタグ内 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('styles')
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <h1><a href="{{ route('index') }}">PiGLy</a></h1>
        </div>
        <div class="header__buttons">
            <a href="{{ route('weight.target.edit') }}" class="btn-setting">
                <i class="fas fa-cog"></i> 目標体重設定
            </a>

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-door-open"></i> ログアウト
                </button>
            </form>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>