<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected function prepareForValidation(): void
    {
        if (isset($this->amount)) {
            $this->merge([
                'amount' => str_replace(',', '.', $this->amount),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'account_id' => ['required', 'exists:accounts,id'],
            'title' => ['required', 'string', 'max:50'],
            'amount' => ['required', 'numeric', 'gt:0'],
            'details' => ['nullable'],
        ];
    }
}
