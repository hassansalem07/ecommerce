<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                    'name' => 'required',
                    'slug' => 'required||unique:products,slug',
                    'description' => 'required|max:1000',
                    'short_description' => 'nullable|max:500',
                    'brand_id' => 'nullable|exists:brands,id',
                    'category_id' => 'nullable|exists:categories,id',
                    'tags' => 'array|min:1',
                    'tags.*' => 'numeric:exists:tags,id'
                ];
                break;
            
            case 'PUT':
                return [
                    'name' => 'required',
                    'slug' => 'required||unique:products,slug,'.$this->productId,
                    'description' => 'required|max:500',
                    'short_description' => 'nullable|max:200',
                    'brand_id' => 'nullable|exists:brands,id',
                    'category_id' => 'nullable|exists:categories,id',
                    'tags' => 'array|min:1',
                    'tags.*' => 'numeric:exists:tags,id'
                ];
                break;
        }
    }
}