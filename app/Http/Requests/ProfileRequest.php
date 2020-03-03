<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required',
            'nationality_id' => 'required',
            'position_id' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'current_team' => 'required',
            'birthday' => 'required',
            'age' => 'required',
            'avatar' => 'required',
        ];
    }
}
