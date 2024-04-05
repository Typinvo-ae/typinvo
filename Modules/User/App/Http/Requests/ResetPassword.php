<?php


namespace Modules\User\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassword extends FormRequest
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

        $rules = [
            'password' => 'required|string|min:6|confirmed',
            ];

        return $rules;


      
    }

    public function messages()
    {

        return [
            'password.min' => 'اقل قيمة لكلمة المرور 6 احرف',
            'password.confirmed' => 'تاكيد كلمة المرور غير صحيحة',
            'password.regex' => 'صيغة كلمة المرور غير صالحة',

        ];
    }
}
