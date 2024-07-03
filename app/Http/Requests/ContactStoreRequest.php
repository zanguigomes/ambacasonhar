<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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

            'name'    => 'required|string|max:255',
            'email'         => 'email|required',
            'subject'       => 'required|string',
            'message'       => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor informe o Nome.',
            'email.required'      => 'Por favor, informe o seu email.',
            'email.email'         => 'Por favor, informe um email válido.',
            'subject.required'    => 'Por favor, informe o assunto.',
            'message.required'    => 'Por favor, digite a mensagem.',
        ];
    }
}
