@extends('app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
<div class="container">
    <h1 class="logo">PiGLy</h1>

    <div class="dashboard-summary">
        <div class="summary-box">
            <p>目標体重</p>
            <h2>{{ $targetWeight }}<span>kg</span></h2>
        </div>
        <div class="summary-box">
            <p>目標まで</p>
            <h2>{{ $diffWeight }}<span>kg</span></h2>
        </div>
        <div class="summary-box">
            <p>最新体重</p>
            <h2>{{ $latestWeight }}<span>kg</span></h2>
        </div>
    </div>

    <form method="GET" action="{{ route('index') }}" class="search-form">
        <input type="date" name="from" value="{{ request('from') }}">
        〜
        <input type="date" name="to" value="{{ request('to') }}">
        <button type="submit">検索</button>
    </form>

    <div class="log-table">
        <table>
            <thead>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weightLogs as $log)
                <tr>
                    <td>{{ $log->date }}</td>
                    <td>{{ $log->weight }}kg</td>
                    <td>{{ $log->calories }}cal</td>
                    <td>{{ $log->exercise_time }}</td>
                    <td>
                        <a href="{{ route('weight.edit', $log->id) }}">
                            <img src="{{ asset('images/edit-icon.svg') }}" alt="編集" />
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $weightLogs->links('pagination::bootstrap-4') }}
    </div>

    <a href="{{ route('weight.create') }}" class="btn-add">データ追加</a>
</div>
@endsection