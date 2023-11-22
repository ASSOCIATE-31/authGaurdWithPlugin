<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'name'     => 'required',
            'email'    => [
                            'required',
                            'unique:users,email',
                        ],
                            
            'phone'    => [
                            'required',
                            'numeric',
                            'digits_between : 10,10',
                            'unique:users,phone',
                        ],
            'password' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'name.required'           => '* Please enter name',
            'email.required'          => '* Please enter email address',
            'email.unique'            => '* Duplicate email',
            'phone.required'          => '* Please enter phone number',
            'phone.numeric'           => '* Not a valid phone number',
            'phone.unique'            => '* Duplicate phone number',
            'phone.digits_between'    => '* Phone number should 10 digits only',
            'password.required'       => '* Please enter password',
        ];
    }
}
