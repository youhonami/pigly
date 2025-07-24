<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // 目標体重
        $targetWeight = optional($user->weightTarget)->target_weight;

        // 最新の体重
        $latestWeight = $user->weightLogs()->latest('date')->value('weight');

        // 差分（目標体重 - 最新体重）
        $diffWeight = ($targetWeight !== null && $latestWeight !== null)
            ? number_format($targetWeight - $latestWeight, 1)
            : null;

        // weightLogsを検索条件付きで取得
        $query = $user->weightLogs()->latest('date');

        // 期間検索条件（from〜to）がある場合に適用
        if ($request->filled('from')) {
            $query->where('date', '>=', $request->input('from'));
        }

        if ($request->filled('to')) {
            $query->where('date', '<=', $request->input('to'));
        }

        // ページネーション
        $weightLogs = $query->paginate(8)->appends($request->all());

        return view('index', compact(
            'targetWeight',
            'latestWeight',
            'diffWeight',
            'weightLogs'
        ));
    }
}
