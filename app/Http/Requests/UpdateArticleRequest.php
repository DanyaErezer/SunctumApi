<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'min:8'],
            'content' => ['required', 'string', 'max:255'],
            'preview' => ['nullable', 'string', 'max:255',]
        ];
    }

    public function messages(): array
    {
        return [
            'title.min' => 'Минимальное кол-во символов 8',
            'title.required' => 'Обязательное поле для заполнения',
            'content.required' => 'Обязательное поле для заполнения'
        ];
    }
}
