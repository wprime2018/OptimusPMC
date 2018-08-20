<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class FundosFormRequest extends FormRequest
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
            'codigo'        => 'required|min:2|max:6',
            'cnpj'          => 'required|cnpj',
            'fantasia'      => 'required|min:2|max:60',
            'razao_social'  => 'required|min:2|max:60',
            'cep'           => 'required',
            'logradouro'    => 'required|min:2|max:40',
            'numero'        => 'required|numeric',
            'bairro'        => 'required|min:2|max:30',
            'cidade'        => 'required|min:2|max:30',
            'estado'        => 'required|min:2|max:30',
            'tipo'          => 'required',
            'ativo'         => 'required'
        ];
    }

    public function messages() {

        return [
            'codigo.required' =>'Código é obrigatório!',
            'fantasia.required' => 'Nome fantasia é obrigatório, com no mínimo 2 caracteres e no máximo 30!',
            'razao_social.required' => 'Razão Social é obrigatório, com no mínimo 2 caracteres e no máximo 60!',
            'cep.required' => 'O CEP deve ser informado!',
            'numero.required' => 'O Número do endereço da filial deve ser informado!',
            'ibge.numeric' => 'O campo IBGE deve conter apenas números!',
            'cnpj.required' => 'O CNPJ da filial deve ser informado!',
            'cnpj.cnpj' => 'C.N.P.J Inválido',
            'ie.required' => 'A Inscrição Estadual da filial deve ser informada!',
            'ie.numeric' => 'A inscrição Estadual deve conter apenas números!'
        ];
    }
}
