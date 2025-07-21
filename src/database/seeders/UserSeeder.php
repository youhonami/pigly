<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ユーザーを作成
        $user = User::create([
            'name' => '健康な猫',
            'email' => 'www@www.com',
            'password' => Hash::make('wwwwwwwwww'),
        ]);

        // weight_target を1件作成
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => 55.5,
        ]);

        // weight_logs を35件作成
        WeightLog::factory()->count(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
