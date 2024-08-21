<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBackupRequest extends FormRequest
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
            'name'=>['required', 'min:3', 'max:15'],
            'client'=>['required'],
            'description'=>['required','max:40'],
            'encryption'=>['required'],
            'passphrase'=>['required', 'min:5', 'confirmed'],
            'date'=>['required', 'date_format:Y-m-d', 'after_or_equal:'. Date('Y-m-d')],
            'time'=>['required', 'date_format:H:i'],
            'repeat'=>['required', 'numeric', 'gte:0'],
            'units'=> ['required'],
            'allowedDays'=>['required'],
            'allowedDays.*'=>['required', 'string', 'distinct'],
        ];
    }
}
