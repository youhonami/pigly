<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;

class WeightLogController extends Controller
{
    /**
     * 体重記録追加フォームを表示
     */
    public function create()
    {
        return view('weight.create');
    }

    /**
     * 体重記録を保存
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric|min:0',
            'calorie' => 'required|numeric|min:0',
            'exercise_time' => 'nullable',
            'exercise_detail' => 'nullable|string|max:1000',
        ]);

        WeightLog::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calorie,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_detail,
        ]);

        return redirect()->route('index')->with('success', '体重ログを登録しました。');
    }
    public function edit($id)
    {
        $log = WeightLog::findOrFail($id);

        if ($log->user_id !== Auth::id()) {
            abort(403);
        }

        return view('weight_log.edit', compact('log'));
    }


    public function update(Request $request, $id)
    {
        $log = WeightLog::findOrFail($id);

        if ($log->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric|min:0',
            'calorie' => 'nullable|integer|min:0',
            'exercise_time' => 'nullable',
            'exercise_detail' => 'nullable|string',
        ]);

        $log->update([
            'date' => $validated['date'],
            'weight' => $validated['weight'],
            'calories' => $validated['calorie'],
            'exercise_time' => $validated['exercise_time'],
            'exercise_content' => $validated['exercise_detail'],
        ]);

        return redirect()->route('index')->with('success', 'データを更新しました');
    }
}
