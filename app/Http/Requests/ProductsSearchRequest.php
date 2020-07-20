<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsSearchRequest extends FormRequest
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
    public function rules()
    {
        return [
             'search-name' => 'bail|nullable|min:1|max:30',
             'search-status' => 'bail|nullable|in:Enable,Disable',
             'search-category' => 'bail|nullable|in:Mobiles,Computers,Tv & Video,Accessories',

        ];
    }



}
