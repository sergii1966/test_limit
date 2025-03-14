<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginProcessRequest extends FormRequest
{
    /**
     * Determine if the web is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //'g-recaptcha-response' => 'required|captcha',
            'email' => ['required', 'email', 'string', 'lowercase', 'max:255'],
            'password' => ['required', 'min:6']
        ];
    }
}
