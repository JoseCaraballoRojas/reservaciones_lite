<?php

namespace Vanguard\Http\Requests;

use Vanguard\Http\Requests\Request;

class ReasonRequest extends Request
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
          'reason' => 'min:2|max:100|required',
          'duration' => 'numeric|required'
        ];
    }
}
