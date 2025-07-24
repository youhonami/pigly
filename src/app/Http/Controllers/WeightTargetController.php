<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateTargetWeightRequest;

class WeightTargetController extends Controller
{
    public function edit()
    {
        $target = Auth::user()->weightTarget;

        return view('weight_target.edit', compact('target'));
    }

    public function update(UpdateTargetWeightRequest $request)
    {
        $user = auth()->user();

        $target = $user->weightTarget;
        if ($target) {
            $target->update([
                'target_weight' => $request->input('target_weight'),
            ]);
        } else {
            $user->weightTarget()->create([
                'target_weight' => $request->input('target_weight'),
            ]);
        }

        return redirect()->route('index')->with('success', '目標体重を更新しました。');
    }
}
