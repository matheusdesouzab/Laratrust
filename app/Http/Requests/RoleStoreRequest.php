<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome não pode ser vazio',
            'name.unique' => 'o nome da função já está vinculado a uma outra função'
        ];
    }
}
