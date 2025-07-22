<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightTargetController extends Controller
{
    public function edit()
    {
        $target = Auth::user()->weightTarget;

        return view('weight_target.edit', compact('target'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'target_weight' => ['required', 'numeric', 'min:0'],
        ]);

        $user = Auth::user();
        $user->weightTarget()->updateOrCreate(
            ['user_id' => $user->id],
            ['target_weight' => $request->target_weight]
        );

        return redirect()->route('index')->with('success', '目標体重を更新しました');
    }
}
