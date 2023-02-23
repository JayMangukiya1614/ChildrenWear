<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'CI_ID' => '',
            'FirstName' => 'required',
            'LastName' => 'required',
            'Email' => 'required',
            'PhoneNo' => 'required',
            'Address' => 'required',
            'State' => 'required',
            'City' => 'required',
            'ZipCode' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'CI_IC' => '',
            'FirstName.required' => 'FirstName Filled Is Required',
            'LastName.required' => ' LastName Filled Is Required',
            'Email.required' => ' Email Filled Is Required',
            'PhoneNo' => 'PhoneNo  Filled Is Required',
            'Address' => 'Address  Filled Is Required',
            'State.required' => 'State  Filled Is Required',
            'City.required' => 'City  Filled Is Required',
            'ZipCode.required' => 'ZipCode  Filled Is Required',

      


        ];
    }
}