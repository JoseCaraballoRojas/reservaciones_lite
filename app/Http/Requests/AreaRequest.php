<?php

namespace Vanguard\Http\Requests;

use Vanguard\Http\Requests\Request;

class AreaRequest extends Request
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
            'area' => 'min:2|max:100|required',
            'responsable_id' => 'required',
            'sucursal_id' => 'required'
        ];
    }
}
