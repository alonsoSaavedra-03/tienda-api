<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id' => 'required|integer|exists:clients,id',
            'product_id' => 'required|integer|exists:products,id',
            'order_number' => 'required|string|max:255',
            'description' => 'nullable|string',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'ordered_at' => 'nullable|date',
        ];
    }
}
