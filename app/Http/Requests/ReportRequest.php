<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'category' => 'in:1,2,3,4|int',
            'mark' => 'min:2|max:30',
            'status' => 'in:Enable,Disable',
            'idType' => 'in:Card ID,Foreign ID,NIT,Passport',
            'exportType' => 'required|in:exportUsers,exportProducts,exportSells',
            'initialDate' => 'required|min:1|max:30',
            'finalDate' => 'required|min:1|max:30',
        ];
    }
}
