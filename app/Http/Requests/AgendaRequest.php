<?php

namespace Vanguard\Http\Requests;

use Vanguard\Http\Requests\Request;

class AgendaRequest extends Request
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
          'responsable_id' => 'required',
          'empresa_id' => 'required',
          'reason_id' => 'required',
          'motivo' => 'required'
      ];
    }
}
