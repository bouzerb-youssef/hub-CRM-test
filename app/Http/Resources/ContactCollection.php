<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($contact) {
            $data =[
                'id' => $contact->id,
                'cle' => $contact->cle,
                'e_mail' => strtolower($contact->e_mail), // Format e-mail to lowercase
              
                'prenom' => ucfirst($contact->prenom), // Capitalize the first letter of 'prenom'
                'telephone_fixe' => $contact->telephone_fixe,
                'service' => $contact->service,
                'fonction' => $contact->fonction,
                
                
            ];

            $data["organisation"] = [
                'nom' => ucfirst($contact->organisation->nom),
                'statut' => "ggg",
            ];
            return $data;
        })->all();
    }
}
