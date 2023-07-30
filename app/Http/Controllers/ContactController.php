<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactCollection;
use App\Models\Contact;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all contacts and return a collection resource
        $contacts = Contact::with("organisation")->paginate(10);
       
        return view("contacts",compact("contacts"));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'prenom' => 'required|string|regex:/^[a-zA-Z]+$/',
            'nom' => 'required|string|regex:/^[a-zA-Z]+$/',
           'email' => 'required|email',
            'entreprise' => 'required',
            'adresse' => 'required',
            'code_postal' => 'required|numeric',
            'ville' => 'required|string',
            'statut' => 'required', 
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    try{
        
        $organisation= Organisation::create([

            "nom"=>$request->entreprise,
            
            "adresse"=>$request->adresse,
            "code_postal"=>$request->code_postal,
            "ville"=>$request->ville,
            "statut"=>$request->statut,
            "cle" =>Str::random(32),

        ]);
          
           Contact::create([

                "nom"=>$request->nom,
                "prenom"=>$request->prenom,
                "e_mail"=>$request->email,
                "organisation_id"=> $organisation->id,
                "cle" =>Str::random(32),
                'telephone_fixe'=>'',
                'service'=>'',
                'fonction'=>'',
        
            ]);
         
        return response()->json(['success' => true, 'url' => route('contacts.index')]);

    }catch (\Exception $e) {
        $errorMessage = $e->getMessage(); 
        return response()->json(['status' => 'error', 'message' => 'Error creating modal: ' . $errorMessage], 500);

        
    }

      
     
       
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'prenom' => 'required',
            'nom' => 'required',
           'email' => 'required|email',
            'entreprise' => 'required',
            'adresse' => 'required',
            'code_postal' => 'required|numeric',
            'ville' => 'required|string',
            'statut' => 'required', 
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    try{
        $organisation=Organisation::findOrFail($request->organisation_id);
        $organisation->update([

            "nom"=>$request->entreprise,
            
            "adresse"=>$request->adresse,
            "code_postal"=>$request->code_postal,
            "ville"=>$request->ville,
            "statut"=>$request->statut,
            "cle" =>Str::random(32),

        ]);
       // 
        
        $contact=Contact::findOrFail($request->id);
        
        $contact->update([

                "nom"=>$request->nom,
                "prenom"=>$request->prenom,
                "e_mail"=>$request->email,
                "organisation_id"=> $organisation->id,
                "cle" =>Str::random(32),
                'telephone_fixe'=>'',
                'service'=>'',
                'fonction'=>'',
        
            ]);
            
            
        return response()->json(['success' => true, 'url' => route('contacts.index')]);

    }catch (\Exception $e) {
        $errorMessage = $e->getMessage(); 
        return response()->json(['status' => 'error', 'message' => 'Error creating modal: ' . $errorMessage], 500);

        
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request )
    {
            try{
                
                $contact = Contact::findOrFail($request->id);
                

                $contact->delete();

                return response()->json(['success' => true, 'url' => route('contacts.index')]);
            }catch (\Exception $e) {
                $errorMessage = $e->getMessage(); 
                return response()->json(['status' => 'error', 'message' => 'Error creating modal: ' . $errorMessage], 500);

                
            }
    }
        
        
   


    public function search(Request $request)
{
    
        $query = $request->get('q');
        $results = Contact::with("organisation")->where(function ($queryBuilder) use ($query) {
                        $queryBuilder->where('nom', 'like', '%' . $query . '%')
                                    ->orWhere('prenom', 'like', '%' . $query . '%');
                                    
                        })->paginate(10);
            return response()->json($results);
}
}
