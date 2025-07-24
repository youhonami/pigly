@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/weight_target.css') }}">
@endsection

@section('content')
<div class="target-container">
    <h2 class="target-title">目標体重設定</h2>

    <form method="POST" action="{{ route('weight.target.update') }}">
        @csrf
        @method('PUT')
        <div class="input-group">
            <input type="text" name="target_weight" value="{{ old('target_weight', optional($target)->target_weight) }}" step="0.1"> kg
        </div>

        @error('target_weight')
        <p class="error">{{ $message }}</p>
        @enderror


        <div class="buttons">
            <a href="{{ route('index') }}" class="btn-cancel">戻る</a>
            <button type="submit" class="btn-submit">更新</button>
        </div>
    </form>
</div>
@endsection