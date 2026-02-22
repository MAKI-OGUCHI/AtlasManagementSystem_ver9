<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class PostRequest extends FormRequest
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
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'under_name_kana' => 'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'mail_address' => 'required|email|unique:users,mail_address|max:100',
            'sex' => 'required|integer|in:1,2,3',
            'old_year' => 'required|integer|between:2000,'.now()->year,
            'old_month' => 'required|integer|between:1,12',
            'old_day' => 'required|integer|between:1,31',
            'role' => 'required|integer|in:1,2,3,4',
            'password' => 'required|string|min:8|max:30|confirmed',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $y = (int) $this->input('old_year');
            $m = (int) $this->input('old_month');
            $d = (int) $this->input('old_day');

            if (!checkdate($m, $d, $y)) {
                $validator->errors()->add('old_year', '正しい日付を入力してください。');
                return;
            }

            $date = sprintf('%04d-%02d-%02d', $y, $m, $d);
            if ($date < '2000-01-01' || $date > now()->toDateString()) {
                $validator->errors()->add('old_year', '生年月日は2000年1月1日から今日までの範囲で入力してください。');
            }
        });
    }

    public function messages()
    {
        return [
            'over_name.required' => '名前は必ず入力してください。',
            'under_name.required' => '名前は必ず入力してください。',
            'over_name_kana.required' => 'セイは必ず入力してください。',
            'over_name_kana.regex' => 'セイはカタカナで入力してください。',
            'under_name_kana.required' => 'メイは必ず入力してください。',
            'under_name_kana.regex' => 'メイはカタカナで入力してください。',
            'mail_address.required' => 'メールアドレスは必ず入力してください。',
            'mail_address.email' => '正しいメールアドレス形式で入力してください。',
            'mail_address.unique' => 'このメールアドレスは既に登録されています。',
            'sex.required' => '性別を選択してください。',
            'old_year.required' => '生年月日を選択してください。',
            'old_year.between' => '生年月日は2000年1月1日から今日までの範囲で入力してください。',
            'old_month.required' => '生年月日を選択してください。',
            'old_day.required' => '生年月日を選択してください。',
            'role.required' => '役職を選択してください。',
            'password.required' => 'パスワードは必ず入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
        ];
    }

}
