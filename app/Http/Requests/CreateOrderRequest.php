<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateOrderRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'delivery_id' => 'required|numeric|min:1',
            'order_date' => 'required|date',
            'pizza_ids'=> 'required|max:255'
        ];
    }
    
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException
            (ApiResponse::error($validator->errors(),'Errores validaciones', 422));
    }
}
