<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address_from' => 'required',
            'zip_from' => 'required',
            'address_to' => 'required',
            'zip_to' => 'required',
            'volume' => 'required',
            'price' => 'required',
        ];
    }
}
