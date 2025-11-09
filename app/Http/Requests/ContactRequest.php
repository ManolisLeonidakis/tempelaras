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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:unicode,dns', 'max:255', 'regex:/@(?:[^\s@]+\.)+(?:gr|com|xn--qxam|\x{03B5}\x{03BB})\z/ui'],
            'phone' => ['nullable', 'string', 'max:20', 'regex:/^[\+]?[0-9\-\s\(\)]+$/'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.regex' => 'Το email πρέπει να καταλήγει σε .gr, .ελ ή .com.',
        ];
    }
}