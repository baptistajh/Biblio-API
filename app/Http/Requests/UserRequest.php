<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'            => 'required|string|max:255',
            'cpf'             => 'required|min:14|max:14|unique:users,cpf,'.$this->route('user') ?? 0,
            'rg'              => 'required|min:9|max:9|unique:users,rg,'.$this->route('user') ?? 0,
            'data_nascimento' => 'required',
            'endereco'        => 'required',
            'email'           => 'required|email|unique:users,email,'.$this->route('user') ?? 0,
            'password'        => 'required'
        ];
    }
}
