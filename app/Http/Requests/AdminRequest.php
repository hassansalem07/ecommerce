<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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


        switch ($this->method()) {
            case 'POST':
                return [
                    'email' => 'required|email',
                    'password' => 'required|min:8',
                ];
                break;

            case 'PUT':
                return [
                    'name'  => 'required',
                    'email' => 'required|email|unique:admins,email,'.$this->adminId,
                    'password' => 'required|confirmed|min:8',
                ];
                break;
            
        }

        


        

    }
}