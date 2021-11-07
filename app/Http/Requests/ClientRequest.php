<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() ) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // バリデーションルールをまとめる配列です。
        $rules = [];

        // $this->has()は$request->has()のことです。
        // has()で指定した項目の有無を確認し、あればルールを追加します。    
        if ($this->has('content')) {
            $rules['content'] = 'required';
        }

        if ($this->has('content2')) {
            $rules['content2'] = 'required';
        }

        return $rules;
        /*return [
            'content' => 'required',
            'content2' => 'required'
        ];*/
    }

    public function messages()
    {
        return [
            'content.required' => '※追加するタスクを入力してください',
            'content2.required' => '※検索するタスクを入力してください'
        ];
    }

    protected function getRedirectUrl()
    {
        return '/';
    }
}
