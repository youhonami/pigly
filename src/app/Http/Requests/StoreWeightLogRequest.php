<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeightLogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'weight' => [
                'required',
                'numeric',
                'min:0',
                'max:999',
                'regex:/^\d{1,3}(\.\d)?$/'
            ],
            'calorie' => 'required|integer|min:0',
            'exercise_time' => 'nullable|date_format:H:i',
            'exercise_detail' => 'nullable|string|max:120',
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => '日付を入力してください。',
            'date.date' => '日付の形式が正しくありません。',
            'weight.required' => '体重を入力してください。',
            'weight.max' => '4桁までの数字で入力してください。',
            'weight.numeric' => '数字で入力してください。',
            'weight.regex' => '小数点は1桁で入力してください。',
            'calorie.required' => '摂取カロリーを入力してください。',
            'calorie.integer' => '数字で入力してください。',
            'exercise_time.date_format' => '運動時間は「時:分」の形式で入力してください。',
            'exercise_detail.max' => '120文字以内で入力してください。',
        ];
    }
}
