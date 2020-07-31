<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Cache;

class ProductsStoreSearchRequest extends FormRequest
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
             'name' => 'bail|nullable|min:1|max:30',
             'mark' => 'bail|nullable|min:1|max:30',
             'price' => 'bail|nullable|min:1|max:1000000|numeric',

        ];
    }
}
