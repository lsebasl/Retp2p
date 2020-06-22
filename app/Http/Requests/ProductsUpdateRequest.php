<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductsUpdateRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'barcode' => ['required',],
            'name' => 'required|min:3|max:30',
            'category' => 'required|in:Computers,Tv & Video,Smartphones,Accessories',
            'model' => 'required|min:2|max:30',
            'mark' => 'required|min:2|max:30',
            'description' => 'required|min:3|max:20',
            'units' => 'required|Integer',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'status' => 'required|in:Enable,Disable',

        ];

    }
}
