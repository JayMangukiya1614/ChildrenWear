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
            'AD_ID' => 'required',
            'shopname' => 'required',
            'productname' => 'required',
            'category' => 'required',
            'age' => 'required',
            'size' => 'required',
            'collection' => 'required',
            'color' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'Ldescription' => 'required',
            'productimage' => 'required',
        ];
    }
        public function messages()
        {
            return [
            'AD_ID' => 'Admin Id Filled Is Required',
            'shopname.required' => 'Shop Name Filled Is Required',
            'productname.required' => 'Product Name Filled Is Required',
            'category' => 'Gender Name Filled Is Required',
            'age' => 'Age Filled Is Required',
            'size.required' => 'Size Filled Is Required',
            'collection.required' => 'Category Filled Is Required',
            'color.required' => 'Color Filled Is Required',
            'stock.required' => 'Stock Filled Is Required',
            'description.required' => 'Description Filled Is Required',
            'price.required' => 'Product price Filled Is Required',
            'discount.required' => ' Product discount Filled Is Required',
            'Ldescription.required' => 'Long description Filled Is Required',
            'productimage.required' => 'Product image Filled Is Required',
        ];
    }
}
