<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganisationRequest extends FormRequest
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
            'cle' => 'required|max:32',
            'organisation_id' => 'required|exists:organisations,id',
            'e_mail' => 'required|email|max:200',
            'nom' => 'required|max:100',
            'prenom' => 'required|max:100',
            'telephone_fixe' => 'required|max:255',
            'service' => 'required|max:255',
            'fonction' => 'required|max:255',
        ];
    }    
}
