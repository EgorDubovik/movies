<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required',
            'password2' => 'required|same:password',
            'mc' => 'required',
            'dot' => 'required',
            'mover' =>  'required_without_all:driver',
            'driver' => 'required_without_all:mover',
        ];
    }

    public function  messages()
    {
        return [
            'company_name.required' => 'The Company name field is required.',
            'password.required' => 'The Password field is required.',
            'password2.required' => 'The Re-enter password field is required.',
            'mc.required' => 'The MC is required.',
            'dot.required' => 'The DOT is required.'

        ];
    }
}
