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
            'cpf'             => 'required|min:14|max:14|unique:users,id,'.\Request::get('id'),
            'rg'              => 'required|min:9|max:9|unique:users,id,'.\Request::get('id'),
            'data_nascimento' => 'required',
            'endereco'        => 'required',
            'email'           => 'required|email|unique:users,id,'.\Request::get('id'),
            'password'        => 'required'
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }
}
