<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsStoreRequest extends FormRequest
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
    public function rules():array
    {
        return [
            'barcode' => 'required|min:3|max:30|unique:products,barcode',
            'name' => 'required|min:3|max:30',
            'category' => 'required|in:Mobiles,Computers,Tv & Video,,Accessories',
            'model' => 'required|min:2|max:30',
            'mark' => 'required|min:2|max:30',
            'description' => 'required|min:3|max:20',
            'units' => 'required|Integer',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'status' => 'required|in:Enable,Disable',
            'image' =>'required|image' //jpeg,png,bmp,gif,svg, or webp
        ];
    }
}
