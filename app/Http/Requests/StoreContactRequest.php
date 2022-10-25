<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],//同じ値の入力を禁じるなら（SQLテーブル毎に1件なら）unique:contact_formseを記載する
            'url' => ['required', 'nullable'],
            'gender' => ['required', 'boolean'],
            'age' => ['required'],
            'coution' => ['required', 'accepted'],
        ];
    }
}
