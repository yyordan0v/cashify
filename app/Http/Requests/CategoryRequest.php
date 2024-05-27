<?php

namespace App\Http\Requests;

use App\Traits\HasColor;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    use HasColor;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $icons = File::files(resource_path("images/categories"));
        $availableIcons = array_map(function ($icon) {
            return $icon->getBasename('.png');
        }, $icons);

        return [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', Rule::in(['expense', 'income'])],
            'color' => ['required', 'string', Rule::in($this->getAvailableColors())],
            'icon' => ['required', 'string', Rule::in($availableIcons)],
        ];
    }
}
