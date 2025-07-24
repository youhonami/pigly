@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/weight_log.css') }}">
@endsection

@section('content')
<div class="log-container">
    <h2 class="log-title">Weight Logを追加</h2>

    <form method="POST" action="{{ route('weight.store') }}" novalidate>
        @csrf

        <div class="form-group">
            <label for="date">日付</label>
            <input type="date" id="date" name="date" value="{{ old('date', \Carbon\Carbon::today()->format('Y-m-d')) }}">
            @error('date')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>


        <div class="form-group">
            <label for="weight">体重</label>
            <input type="number" id="weight" name="weight" step="0.1" value="{{ old('weight') }}" placeholder="60.0"> kg

            @error('weight')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="calorie">摂取カロリー</label>
            <input type="number" id="calorie" name="calorie" value="{{ old('calorie') }}" placeholder="2000"> cal

            @error('calorie')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="exercise_time">運動時間</label>
            <input type="time" id="exercise_time" name="exercise_time" value="{{ old('exercise_time', '00:00') }}">
            @error('exercise_time')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="exercise_detail">運動内容</label>
            <textarea id="exercise_detail" name="exercise_detail" rows="4" placeholder="運動内容を追加">{{ old('exercise_detail') }}</textarea>
            @error('exercise_detail')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-buttons">
            <a href="{{ route('index') }}" class="btn-cancel">戻る</a>
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
</div>
@endsection