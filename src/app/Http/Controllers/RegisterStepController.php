<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class RegisterStepController extends Controller
{
    public function showStep2()
    {
        return view('register_step2');
    }

    public function storeStep2(Request $request)
    {
        $request->validate([
            'current_weight' => 'required|numeric|min:20|max:300',
            'target_weight' => 'required|numeric|min:20|max:300',
        ]);

        $user = Auth::user();

        // 現在の体重ログを保存
        WeightLog::create([
            'user_id' => $user->id,
            'date' => now()->format('Y-m-d'),
            'weight' => $request->current_weight,
            'calories' => 0,
            'exercise_time' => '00:00:00',
            'exercise_content' => '初回登録',
        ]);

        // 目標体重を保存
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

        // ✅ ここで index.blade.php へリダイレクト
        return redirect('/index')->with('success', 'アカウントが作成されました！');
    }
}
