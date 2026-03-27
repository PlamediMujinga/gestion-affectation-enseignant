<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            //
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'niveau_etude' => 'nullable|string|max:255',
            'specialite' => 'nullable|string|max:255',
        ];
    }
}
