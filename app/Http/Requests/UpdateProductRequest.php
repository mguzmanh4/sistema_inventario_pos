<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'required',
            ],
            'sku'=> 'required',
            'purchase_price' => [
                'required'
            ],
            'selling_price' => [
                'required'
            ],
            'utility' => [
                'required'
            ],
            'stock' => [
                'required'
            ],
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'array',
            ],
        ];
    }
}
