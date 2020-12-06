<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Integer;

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
     * 0
     * Get the validation rules th0  at apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'barcode' => 'required|min:3|max:30|unique:products,barcode',
            'name' => 'required|min:3|max:30',
            'category_id' => 'required|bail|nullable|in:1,2,3,4|int',
            'model' => 'required|min:2|max:30',
            'mark' => 'required|min:2|max:30',
            'description' => 'required|min:3|max:20',
            'units' => 'required|Integer|min:1|max:10000000',
            'price' => 'required|numeric|min:0|max:100000000',
            'discount' => 'required|numeric|min:0|max:100',
            'status' => 'required|in:Enable,Disable',
            'image' => 'required'

        ];
    }
}
