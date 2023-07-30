<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'prenom' => 'required|string|regex:/^[a-zA-Z]+$/',
            'nom' => 'required|string|regex:/^[a-zA-Z]+$/',
            'email' => 'required|email',
            'entreprise' => 'required',
            'code_postal' => 'nullable|numeric',
            'ville' => 'nullable|string|alpha',
            'statut' =>'required'
            
        ];
    }
}
