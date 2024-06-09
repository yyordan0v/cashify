<?php

namespace App\Http\Requests;

use App\Traits\HasColor;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
{
    use HasColor;

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if (isset($this->balance)) {
            $this->merge([
                'balance' => str_replace(',', '.', $this->balance),
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
            'name' => ['required', 'string', 'max:255'],
            'balance' => ['required', 'numeric'],
            'color' => ['required', 'string', Rule::in($this->getAvailableColors())],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();

        foreach ($errors as $error) {
            flashToast('error', $error);
        }

        throw new HttpResponseException(
            redirect()->back()->withErrors($validator)->withInput()
        );
    }
}
