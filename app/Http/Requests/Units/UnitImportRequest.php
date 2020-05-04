<?php

namespace App\Http\Requests\Units;

use Illuminate\Foundation\Http\FormRequest;

class UnitImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'import-file' =>'required'
        ];
    }
    public function messages()
    {
        return [
            'import-file.required' =>'Bạn chưa chọn file!'
        ];
    }
}
