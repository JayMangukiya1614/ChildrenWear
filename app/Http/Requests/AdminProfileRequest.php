<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequest extends FormRequest
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
            'middlename' => 'required',
            'lastname' => 'required',
            'mobilenumber' => 'required',
            'shopname' => 'required',
            'pincode' => 'required',
            'education' => 'required',
            'gender' => '',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',

            'profileimage' => ''
        ];
    }
    public function messages()
    {
        return [
            'AD_ID' => '',
            'firstname.required' => 'Required',
            'lastname.required' => ' Required',
            'middlename.required' => ' Required',
            'shopname' => 'Shopname Filled Is Required',
            'pincode' => 'Pincode Filled Is Required',
            'education.required' => 'Education Filled Is Required',
            'gender.required' => 'Gender Filled Is Required',
            'state.required' => 'state Filled Is Required',
            'city.required' => 'City Filled Is Required',
            'mobilenumber.required' => 'Mobilenumber Filled Is Required',
            'address.required' => 'Address Filled Is Required',
            'profileimage' => '',


        ];
    }
}