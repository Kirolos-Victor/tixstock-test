<?php

namespace App\Http\Requests;

use App\Rules\EventNameRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreTicketRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'event_name' => ['string', 'required', 'max:50', new EventNameRule()],
            'currency' => ['string', 'required', 'in:GBP,USD,EUR'],
            'quantity_initial' => ['integer', 'required', 'min:1'],
            'quantity_available' => ['integer', 'required', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'currency.in' => "Currency must be in USD, GBP, EUR"
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json(['errors' => $validator->errors()->all()], 400);
        throw new ValidationException($validator, $response);
    }
}
