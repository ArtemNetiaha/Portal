<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category' => 'nullable|numeric|exists:App\Models\Category,id',
            'tag' => 'nullable|numeric|exists:App\Models\Tag,id',
            'q' => 'nullable|string',
            'date'=>'nullable|string'
        ];
    }
}
