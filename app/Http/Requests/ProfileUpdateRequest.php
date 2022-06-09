<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'company_name' => 'required',
            'mover' =>  'required_without_all:driver',
            'driver' => 'required_without_all:mover',
        ];
    }

    public function  messages()
    {
        return [
            'company_name.required' => 'The Company name field is required.',
            'mc.required' => 'The MC is required.',
            'dot.required' => 'The DOT is required.'
        ];
    }
}
