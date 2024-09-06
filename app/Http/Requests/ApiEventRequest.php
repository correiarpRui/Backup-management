<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Extra.backup-id'=>['required'],
            'Extra.backup-name'=>['required'],
            'Extra.OperationName'=>['required'],
            'Data.BeginTime'=>['required'],
            'Data.EndTime'=>['required'],
            'Data.Duration'=>['required'],
            'Data.WarningsActualLength'=>['required'],
            'Data.ErrorsActualLength'=>['required'],
        ];
    }
}
