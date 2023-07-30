<div class="modal h-screen w-full fixed top-0 left-0 flex justify-center items-center hidden    ">
    
  <form  id="contact-form">
    @csrf
        <div class=" mx-auto mt-4 p-6 bg-white  rounded-t-lg shadow-md">
            <h2 class="text-2xl font-normal mb-4">Détail du contact</h2>
            
              
              <div class="flex mb-2">
                <div class="mr-2 w-1/2">
                  <label for="prenom" class="block text-[#848d98]">Prénom</label>
                  <input type="text" id="prenom" name="prenom" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                 
                </div>
                <div class="ml-2 w-1/2">
                  <label for="nom" class="block text-[#848d98]">Nom</label>
                  <input type="text" id="nom" name="nom" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                </div>
              </div>
        
              
              <div class="mb-2">
                <div class=" w-full">
                  <label for="email" class="block text-[#848d98]">Email</label>
                  <input type="email" id="email" name="email" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                </div> 
              </div>

              <div class="mb-2">
                <div class=" w-full">
                    <label for="entreprise" class="block text-[#848d98]">Entreprise</label>
                    <input type="text" id="entreprise" name="entreprise" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                  </div> 
              </div>
        
              
              <div class="mb-2">
                <label for="addresse" class="block text-[#848d98]">Address</label>
                <textarea id="adresse" name="adresse" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" ></textarea>
              </div>
        
             
              <div class="flex mb-2">
                <div class="mr-2 w-1/3">
                  <label for="codepostal" class="block text-[#848d98] mt-2 text-xs md:text-sm">Code Postal</label>
                  <input type="text" id="code_postal" name="code_postal" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                </div>
                <div class="ml-2 w-full">
                  <label for="ville" class="block text-[#848d98]">Ville</label>
                  <input type="text" id="ville" name="ville" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                </div>
              </div>
        
              
              <div class="mb-2">
                <label for="statut" class="block text-[#848d98]">Statut</label>
                <select id="statut" name="statut" class="w-[50%] border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                  <option value="Lead">Lead</option>
                  <option value="Prospect">Prospect</option>
                  <option value="Client">Client</option>
                </select>
              </div>
        
              
              
            
          </div>
          <div class="flex justify-end gap-1 bg-[#eff5f5] ">
            <button type="button" class="px-4 py-2  text-[#45505e] rounded-md border close-modal">Annuler</button>
            <button type="submit" class="px-4 py-2 bg-[#0ebccb] text-white rounded-md border border-[black] add_contact">Submit</button>
          </div>
        
    </form>

</div>





@section('script')

    
@endsection