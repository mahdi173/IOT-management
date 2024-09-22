<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModuleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"=> "required|string|min:5",
            "number_data_sent"=> 'required|numeric|between:0,99999',
            "value"=> 'required|numeric|between:0,99999',
            "measure_unit"=> "required|string",
        ];
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'name.required' => "The name is required!",
            'name.min' => 'The name must be at least 5 characters long!',
            'number_data_sent.required'=> "The data number is required",
            'number_data_sent.numeric'=> "The value is invalid",
            'number_data_sent.between'=> "The value should be between 0 and 99999",
            'value.required'=> "The module value is required",
            'value.numeric'=> "The value is invalid",
            'value.between'=> "The value should be between 0 and 99999",
            'measure_unit.required' => "The measure unit is required!",
        ];
    }
}