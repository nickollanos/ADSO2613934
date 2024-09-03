<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('put')) {
            return [
                'name' => 'required|string',
                'manufacturer' => 'required|string',
                'releasedate' => 'required|date',
                'description' => 'nullable|string',
            ];
        } else {
            return [
                'name' => 'required|string',
                'manufacturer' => 'required|string',
                'releasedate' => 'required|date',
                'description' => 'nullable|string',
                'image' => 'nullable|image',
            ];
        }
    }

    /**
     * Custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name attribute is required.',
            // Añade mensajes personalizados para otras reglas si es necesario
        ];
    }

    /**
     * Custom attribute names for validation messages.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'Name',
            // Añade atributos personalizados si es necesario
        ];
    }
}