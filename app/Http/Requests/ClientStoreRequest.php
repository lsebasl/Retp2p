<?php

namespace App\Http\Requests;

use App\Client;
use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:30',
            'last_name' => 'required|string|min:3|max:30',
            'id_type' => 'required|in:Foreign ID, Card ID,Passport,NIT',
            'identification' => 'required|alpha_num|max:20|min:3',
            'phone' => 'required|numeric|max:20|min:6',
            'email' => 'required|max:150|email|unique:clients,email',
            'address' => 'required|max:40',
        ];
    }
}
