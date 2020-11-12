<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'last_name' => 'required|min:3|max:30',
            'id_type' => 'required|in:Foreign ID,Card ID,Passport,NIT',
            'identification' => 'required|min:3|max:20|unique:users,identification',
            'phone' => 'required|min:6|max:20',
            'address' => 'required|max:40',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
