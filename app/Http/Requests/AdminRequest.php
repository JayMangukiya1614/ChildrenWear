<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'education' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'city' => 'required',
            'mobilenumber' => 'required',
            'gstno' => 'required',
            'bankname' => 'required',
            'branchname' => 'required',
            'ifsccode' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'firstname.required' => 'First_Name Filled Is Required',
            'lastname.required' => 'lastname Filled Is Required',
            'middlename.required' => 'middlename Filled Is Required',
            'education.required' => 'education Filled Is Required',
            'gender.required' => 'gender Filled Is Required',
            'country.required' => 'country Filled Is Required',
            'city.required' => 'city Filled Is Required',
            'mobilenumber.required' => 'mobilenumber Filled Is Required',
            'gstno.required' => 'gstno Filled Is Required',
            'bankname.required' => 'bankname Filled Is Required',
            'branchname.required' => 'branchname Filled Is Required',
            'ifsccode.required' => 'ifsccode Filled Is Required',
            'email.required' => 'email Filled Is Required',
            'password.required' => 'password Filled Is Required',
            'address.required' => 'address Filled Is Required',

        ];
    }
}
