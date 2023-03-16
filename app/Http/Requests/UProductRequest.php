<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UProductRequest extends FormRequest
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
            'AD_ID' => 'required',
            'shopname' => 'required',
            'category' => 'required',
            'productname' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'age' => 'required',
            'size' => 'required',
            'collection' => 'required',
            'color' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'Ldescription' => 'required',
            'productimage' => '',
        ];
    }
        public function messages()
        {
            return [
            'AD_ID' => 'Admin Id Filled Is Required',
            'shopname.required' => 'Shop Name Filled Is Required',
            'category' => 'Gender Name Filled Is Required',
            'productname.required' => 'Product Name Filled Is Required',
            'price.required' => 'Product price Filled Is Required',
            'discount.required' => ' product discount Filled Is Required',
            'age' => 'Age Filled Is Required',
            'size.required' => 'size Filled Is Required',
            'collection.required' => 'category Filled Is Required',
            'color.required' => 'color Filled Is Required',
            'stock.required' => 'stock Filled Is Required',
            'description.required' => 'description Filled Is Required',
            'Ldescription.required' => 'long description Filled Is Required',
            'productimage.' => '',
        ];
    }
}
