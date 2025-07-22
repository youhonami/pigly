<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;

class DashboardController extends Controller
{
    public function index()
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

        // ログ一覧（ページネーション）
        $weightLogs = $user->weightLogs()->latest('date')->paginate(10);

        return view('index', compact(
            'targetWeight',
            'latestWeight',
            'diffWeight',
            'weightLogs'
        ));
    }
}
