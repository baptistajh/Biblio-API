<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class ClienteRequest extends FormRequest
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
            'nome'     => 'required|string',
            'telefone' => 'required|min:14|max:15',
            'cpf'      => 'required|min:14|max:14|unique:clientes,cpf,'.$this->route('cliente') ?? 0,
            'email'    => 'required|email|unique:clientes,email,'.$this->route('cliente') ?? 0,
            'endereco' => 'required|string'
        ];
    }
}
