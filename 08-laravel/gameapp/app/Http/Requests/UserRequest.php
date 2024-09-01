<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserRequest extends FormRequest
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
        if($this->method() == 'PUT') {
            return [
                'document' => 'required|numeric|unique:users,document,'.$this->id,
                'fullname' => 'required|string',
                'gender' => 'required',
                'birthdate' => 'required|date',
                'phone' => 'required',
                'email' => 'required|string|lowercase|email|unique:users,email,'.$this->id, 
            ];
        }else{
        return [
                'document' => ['required', 'numeric', 'unique:'.User::class],
                'fullname' => ['required', 'string'],
                'gender' => ['required'],
                'birthdate' => ['required', 'date'],
                'photo' => ['required', 'image'],
                'phone' => ['required'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:'.User::class],         
                'password' => ['required', 'confirmed'],
            ];
        }
    }

    public function message(): array
    {
        return[
            'fullname.required' => 'The Fullname is required'
        ];
    }

    public function attributes(): array
    {
        return[
            'fullname' => 'Nombre Completo'
        ];
    }
}
