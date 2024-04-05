<?php

namespace Modules\Common\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class updatGeneralSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {

        return     [
            'company_name' => 'required',
            'company_phone' => ['required', 'unique:users,company_phone,' . $this->id],
            'company_email' =>['email', 'required', 'unique:users,company_email,' . $this->id],
            'company_title' => 'required',
            'company_tax_number' => 'required',
            'bank_name' => 'required',
            'bank_name_en' => 'required',
            'bank_number' => 'required',
            'send_to_details' => 'required',
            'send_to_details_en' => 'required',
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
