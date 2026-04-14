<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'numero_compte' => 'required|string|unique:accounts,numero_compte',
            'solde'         => 'required|numeric|min:0',
            'code' => 'required|string|min:4|max:6',
            'user_id'       => 'required|exists:users,id',
        ];
    }

    public function messages(): array // Définit des messages d'erreur personnalisés pour les règles de validation spécifiées dans la méthode rules(). Ces messages seront retournés en cas de validation échouée, fournissant des informations claires sur les erreurs rencontrées lors de la création ou de la mise à jour d'un compte.
    {
        return [
            'numero_compte.required' => 'Le numéro de compte est obligatoire.',
            'numero_compte.unique'   => 'Ce numéro de compte existe déjà.',
            'solde.min'              => 'Le solde ne peut pas être négatif.',
            'code.digits'            => 'Le code doit contenir exactement 4 chiffres.',
            'user_id.exists'         => 'L\'utilisateur spécifié n\'existe pas.',
        ];
    }
}