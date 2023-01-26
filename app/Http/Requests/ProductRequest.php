<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'shopname' => 'required',
            'productname' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'state' => 'required',
            'city' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'price' => 'required',
            'shopname' => 'required',
            'discount' => 'required',
            'Pselling' => 'required',
            'productimage' => 'required',


        ];
        return [
            'AD_ID' => '',
            'shopname.required' => 'First_Name Filled Is Required',
            'productname.required' => 'lastname Filled Is Required',
            'gender.required' => 'Middlename Filled Is Required',
            'age' => 'Shoname Filled Is Required',
            'state' => 'Pincode Filled Is Required',
            'city.required' => 'Education Filled Is Required',
            'stock.required' => 'Gender Filled Is Required',
            'description.required' => 'Country Filled Is Required',
            'price.required' => 'City Filled Is Required',
            'shopname.required' => 'Mobilenumber Filled Is Required',
            'discount.required' => 'Gstno Filled Is Required',
            'Pselling.required' => 'Bankname Filled Is Required',
            'productimage.required' => 'Branchname Filled Is Required',



        ];
    }
}
