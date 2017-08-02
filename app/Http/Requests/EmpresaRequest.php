<?php

namespace Vanguard\Http\Requests;

use Vanguard\Http\Requests\Request;

class EmpresaRequest extends Request
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
            'nombre' => 'min:2|max:100|required|unique:empresas',
            'contacto1_id' => 'required',
            'imagen' => 'size:2048|image'
        ];
    }
}
