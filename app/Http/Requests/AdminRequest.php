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
            'AD_ID' => '',
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'shopname' => 'required',
            'pincode' => 'required',
            'education' => 'required',
            'gender' => 'required',
            'state' => 'required',
            'city' => 'required',
            'mobilenumber' => 'required',
            'gstno' => 'required',
            'bankname' => 'required',
            'branchname' => 'required',
            'ifsccode' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'message' => '',
            'profileimage' => ''
        ];
    }
    public function messages()
    {
        return [
            'AD_ID' => '',
            'firstname.required' => 'First_Name Filled Is Required',
            'lastname.required' => 'lastname Filled Is Required',
            'middlename.required' => 'Middlename Filled Is Required',
            'shopname' => 'Shoname Filled Is Required',
            'pincode' => 'Pincode Filled Is Required',
            'education.required' => 'Education Filled Is Required',
            'gender.required' => 'Gender Filled Is Required',
            'city.required' => 'City Filled Is Required',
            'state.required' => 'State Filled Is Required',
            'mobilenumber.required' => 'Mobilenumber Filled Is Required',
            'gstno.required' => 'Gstno Filled Is Required',
            'bankname.required' => 'Bankname Filled Is Required',
            'branchname.required' => 'Branchname Filled Is Required',
            'ifsccode.required' => 'IFSCcode Filled Is Required',
            'email.required' => 'Email Filled Is Required',
            'password.required' => 'Password Filled Is Required',
            'address.required' => 'Address Filled Is Required',
            'message' => '',
            'profileimage' => '',


        ];
    }
}