<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStockRequest extends FormRequest
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
                    
                    'sku' => 'nullable|min:3|max:10',
                    'in_stock' => 'required|in:0,1',
                    'qty' => 'nullable|numeric',
                     ];
    
    }
}