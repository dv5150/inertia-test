<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'recipientEmail' => 'required|string|email',
            'recipientName' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'text' => 'required|string|max:65535',
            'attachment' => 'nullable|file',
        ];
    }
}