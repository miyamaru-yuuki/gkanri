<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayAddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'hi'=>'required',
            'evaluation'=>'required'
        ];
    }

    //カスタムメッセージを設定
    public function messages()
    {
        return [
            'hi.required'=>'プレイした日時は必ず入力して下さい。',
            'evaluation.required'=>'プレイの評価は必ず入力して下さい。'
        ];
    }
}
