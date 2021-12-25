<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRegistrationRequest extends FormRequest
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
            'type' => 'required|in:lawyer,consultant',
            'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:members,name|max:255',
            'email' => 'required|email:rfc,dns|unique:members,email',
            'member_terms_condition' => 'required',
            'phone_number' => 'bail|numeric|digits:11|unique:members,phone_number|regex:/^(?:\+?88)?01[3-9]\d{8}$/',
            'password' => 'required|min:8|max:20|confirmed',
        ];
    }
}
