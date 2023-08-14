<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'total' => 'required|numeric',
            'name' => 'required|max:255|string',
            'costumer_name' => 'required|max:255|string',
            'total_paid' => 'required|numeric',
            'order_payment_status' => 'required|numeric',
        ];
    }
}
