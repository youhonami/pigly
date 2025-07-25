<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;
use App\Http\Requests\StoreWeightLogRequest;
use App\Http\Requests\UpdateWeightLogRequest;

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
    public function store(StoreWeightLogRequest $request)
    {

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


    public function update(UpdateWeightLogRequest $request, $id)
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

    public function destroy($id)
    {
        $log = WeightLog::findOrFail($id);

        // 認可チェック（必要に応じて）
        if ($log->user_id !== auth()->id()) {
            abort(403, '権限がありません');
        }

        $log->delete();

        return redirect()->route('index')->with('status', 'データを削除しました。');
    }
}
