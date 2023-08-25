<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->id,
            'nik' => 'required|min:16|unique:users,nik,'.$this->id,
            'nip' => 'required|min:9|unique:users,nip,'.$this->id,
            'name' => 'required|min:5',
            'address' => 'required|min:8',
            'telp' => 'required|numeric|digits_between:11,12|unique:users,telp,'.$this->id,
            'birthday' => 'required',
            'isAdmin' => 'required'
        ];
    }

}
