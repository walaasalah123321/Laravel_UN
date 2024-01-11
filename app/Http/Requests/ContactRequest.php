<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        "name" => "required",
        "email" => "required",
        "phone" => "required|min:5",
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "please enter Your name",
            "email.required" => "please enter Your email",
            "phone.required" => "please enter Your phone",
            "phone.min" => "must  phone is > 5",
        ];
    }
}
