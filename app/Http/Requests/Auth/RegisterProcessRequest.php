<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterProcessRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'lowercase', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:6','confirmed'],
        ];
    }

//    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
//    {
//        //dd($validator->errors());
//
//        throw new Exception($validator->errors());
//
////        throw new HttpResponseException(response()->json([
////            'errors' => $validator->errors(),
////            'status' => true
////        ], 422));
//    }

    /**
     * Get the validation messages that apply to the request.
     * @return array[]
     */
//    public function messages(): array
//    {
//        return [
//            'name' => [
//                'string' => __('message.Password'),
//                'required' => __('message.Password'),
//                'max:255' => __('message.Password')
//            ],
//            'email' => [
//                'required' => __('message.Password'),
//                'email' => __('message.Password'),
//                'string' => __('message.Password'),
//                'lowercase' => __('message.Password'),
//                'max:255' => __('message.Password'),
//                'unique:users,email' => __('message.Password')
//            ],
//            'password' => [
//                'required' => __('message.Password'),
//                'confirmed' => __('message.Password')
//            ]
//        ];
//    }
}
