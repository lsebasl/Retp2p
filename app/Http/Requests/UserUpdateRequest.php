<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|min:3|max:150',
            'last_name' => 'required|min:3|max:150',
            'id_type' => 'required|in:Foreign ID,Card ID,Passport,NIT',
            'identification' => 'required','min:3','max:20',
            'phone' => 'required|min:6|max:20',
            'address' => 'required|max:150',
            'email' => 'required','max:150','email',
            'status' => 'required|in:Enable,Disable',
        ];
    }
}
