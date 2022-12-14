<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    'name' => 'required|unique:categories,name',
                    'slug' => 'required|unique:categories,slug',
                    'parent_id' => 'nullable|exists:categories,id',
                ];
                break;
            
            case 'PUT':
                return [
                    'name' => 'required|unique:categories,name,'.$this->categoryId,
                    'slug' => 'required|unique:categories,slug,'.$this->categoryId,
                    'parent_id' => 'nullable|exists:categories,id',
                ];
                break;
        }
    }
}