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
            "profileimage" => 'required',
        ];
    }
    public function messages()
    {
        return [
            'firstname.required' => 'First_Name Filled Is Required',
            "file.required" => 'Please select a File',


        ];
    }
}
