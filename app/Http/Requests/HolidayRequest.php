<?php

namespace Vanguard\Http\Requests;

use Vanguard\Http\Requests\Request;

class HolidayRequest extends Request
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
          'day' => 'required',
          'reason' => 'min:4|max:100|required',
          'details' => 'min:4|max:250|required'
      ];
    }
}
