<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTargetWeightRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'target_weight' => ['required', 'numeric', 'min:1', 'max:999', 'regex:/^\d{1,3}(\.\d)?$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'target_weight.required' => '目標体重を入力してください。',
            'target_weight.numeric' => '目標体重は数値で入力してください。',
            'target_weight.min' => '目標体重は1kg以上で入力してください。',
            'target_weight.max' => '4桁までの数字で入力してください。',
            'target_weight.regex' => '小数点は１桁で入力してください。',
        ];
    }
}
