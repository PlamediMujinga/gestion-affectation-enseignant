<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEcoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasPermission('create_ecole');
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
            'code_ecole' => 'required|string|unique:ecoles,code_ecole',
            'type' => 'required|in:primaire,secondaire,complexe',
            'statut' => 'required|in:public,privée',
            'adresse' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'province_id' => 'required|exists:provinces,id',
            'sous_proved_id' => 'required|exists:sous_proveds,id',

        ];
    }
}
