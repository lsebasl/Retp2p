<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetricsRequest extends FormRequest
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
            'typeChart' => 'required|in:horizontalBar,pie,polarArea,doughnut,line,bar',
            'reportType' => 'required|in:usersStatus,sellByStatus,sellByCategory,sellByProduct,topClient,stockByCategory',
            'initialDate' => 'required|min:1|max:30',
            'finalDate' => 'required|min:1|max:30',

        ];
    }
}
