<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'title'=>'required|json',
            'description'=>'required|json',
            'about'=>'required|json',
            'facebook'=>'required|string|max:255',
            'instagram'=>'required|string|max:255',
        ];
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            'title'=>json_encode($this->title),
            'description'=>json_encode($this->description),
            'about'=>json_encode($this->about),

        ]);
    }
}
