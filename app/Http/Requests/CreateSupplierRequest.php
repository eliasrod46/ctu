<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSupplierRequest extends FormRequest
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
    
        return [
            'lastname' =>   ['required', 'string', 'max:255', 'min:3'],
            'name' =>       ['required', 'string', 'max:255', 'min:3'],
            'dni' =>        ['required', 'numeric'],
            'state' =>      ['required', 'string', 'max:255', 'min:3'],
            'cbu' =>        ['required', 'string', 'max:25'],
            'alias' =>      ['required', 'string', 'max:255', 'min:3'],
            'phone' =>      ['required', 'numeric'],
            'email' =>      ['required', 'email', 'unique:suppliers', 'lowercase', 'max:255', 'min:10'],
        ];
    }
}
