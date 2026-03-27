<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAffectationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasPermission('create_affectation');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'enseignant_id' => 'required|exists:enseignants,id',
            'ecole_id' => 'required|exists:ecoles,id',
            'type' => 'required|in:affectation,mutation',
            'commentaire' => 'nullable|string|max:1000'
        ];
    }
}
