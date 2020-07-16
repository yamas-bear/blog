<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required|max:20',
            'body'  => 'required',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です。',
            'title.max'      => 'タイトルは20文字以内で記入してください。',
            'body.required'  => '内容は必須です。',
        ];
    }
}
