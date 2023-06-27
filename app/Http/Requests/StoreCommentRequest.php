<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'post_id' => 'required|numeric|exists:App\Models\Post,id',
            'user_id' => 'required|numeric|exists:App\Models\User,id',
            'comment_id' => 'nullable|numeric|exists:App\Models\Comment,id',
            'body' => 'required|string'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->id(),
            'comment_id' => $this->comment_id ?? null
        ]);
    }
}
