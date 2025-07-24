@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/weight_log.css') }}">
@endsection

@section('content')
<div class="log-container">
    <h2 class="log-title">Weight Log</h2>

    {{-- 更新フォーム --}}
    <form method="POST" action="{{ route('weight.update', $log->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date">日付</label>
            <input type="date" id="date" name="date" value="{{ old('date', $log->date) }}" required>
        </div>

        <div class="form-group">
            <label for="weight">体重</label>
            <input type="number" id="weight" name="weight" step="0.1" value="{{ old('weight', $log->weight) }}" required> kg
        </div>

        <div class="form-group">
            <label for="calorie">摂取カロリー</label>
            <input type="number" id="calorie" name="calorie" value="{{ old('calorie', $log->calories) }}" required> cal
        </div>

        <div class="form-group">
            <label for="exercise_time">運動時間</label>
            <input
                type="time"
                id="exercise_time"
                name="exercise_time"
                value="{{ old('exercise_time', \Carbon\Carbon::parse($log->exercise_time ?? '00:00:00')->format('H:i')) }}"
                step="60" />
        </div>

        <div class="form-group">
            <label for="exercise_detail">運動内容</label>
            <textarea id="exercise_detail" name="exercise_detail" rows="4">{{ old('exercise_detail', $log->exercise_content) }}</textarea>
        </div>

        <div class="form-buttons-wrapper">
            {{-- 更新フォーム --}}
            <form method="POST" action="{{ route('weight.update', $log->id) }}" class="form-inline">
                @csrf
                @method('PUT')
                <a href="{{ route('index') }}" class="btn-cancel">戻る</a>
                <button type="submit" class="btn-submit">更新</button>
            </form>

            {{-- 削除フォーム --}}
            <form method="POST" action="{{ route('weight.destroy', $log->id) }}" class="form-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete" title="削除">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>

</div>
@endsection