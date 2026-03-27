<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnseignantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasPermission('create_enseignant');
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
            'nom' => 'required|string|max:255',
            'postnom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:M,F',
            'telephone' => 'nullable|string|max:20',
            'matricule' => 'required|string|unique:enseignants,matricule',
            'niveau_etude' => 'nullable|string|max:255',
            'specialite' => 'nullable|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'sous_proved_id' => 'nullable|exists:sous_proveds,id',
            'ecole_id' => 'nullable|exists:ecoles,id',
        ];
    }
}
