<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>体重登録 | PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
    <div class="auth-container">
        <h1 class="title">PiGLy</h1>
        <h2 class="subtitle">新規会員登録</h2>
        <p class="step">STEP2 体重データの入力</p>

        <form method="POST" action="{{ route('register.weight.store') }}">
            @csrf

            <label for="current_weight">現在の体重</label>
            <div style="display: flex; align-items: center;">
                <input type="number" step="0.1" name="current_weight" id="current_weight" placeholder="現在の体重を入力" required>
                <span style="margin-left: 8px;">kg</span>
            </div>

            <label for="target_weight">目標の体重</label>
            <div style="display: flex; align-items: center;">
                <input type="number" step="0.1" name="target_weight" id="target_weight" placeholder="目標の体重を入力" required>
                <span style="margin-left: 8px;">kg</span>
            </div>

            <button type="submit">アカウント作成</button>
        </form>
    </div>
</body>

</html>