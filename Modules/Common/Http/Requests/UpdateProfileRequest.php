<?php

namespace Modules\Common\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {

        return     [
            'name' => 'required',
            'email' =>['email', 'required', 'unique:users,email,' . $this->id],
            'phone' => ['required', 'unique:users,phone,' . $this->id],
            'password' => 'sometimes',
           
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
