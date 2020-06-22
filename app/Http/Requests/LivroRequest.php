<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
            'nome'          => 'required|string',
            'autor'         => 'required|string',
            'edicao'        => 'required|integer',
            'local'         => 'required|string',
            'editora'       => 'required|string',
            'ano'           => 'required|integer',
            'id_corredor'   => 'integer|nullable',
            'id_estante'    => 'integer|nullable',
            'id_prateleira' => 'integer|nullable',
        ];
    }
}
