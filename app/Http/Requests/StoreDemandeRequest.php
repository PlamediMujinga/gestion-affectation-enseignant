<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDemandeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasPermission('create_demande');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            //Cas Ecole ou Enseignant
            'type_demande' => 'required|in:manque_enseignant,surplus_enseignant,demande_transfert,demande_affectation',
            'description' => 'nullable|string|max:1000',
            
            //Cas Ecole
            'specialite' => 'nullable|string|max:255',
            'nombre' => 'nullable|integer|min:1'
        ];
    }
}
