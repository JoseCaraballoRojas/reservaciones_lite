<?php

namespace Vanguard\Http\Requests;

use Vanguard\Http\Requests\Request;

class SucursalUpdateRequest extends Request
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
        'sucursal' => 'min:2|max:100|required',
        'contacto1_id' => 'required',
        'empresa_id' => 'required',
        'imagen' => 'image'
      ];
    }
}
