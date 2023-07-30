<div class="modal-update h-screen w-full fixed top-0 left-0 flex justify-center items-center  hidden" id="modal-update">
    
  <form  id="update-contact-form">
    @csrf

        <div class=" mx-auto mt-4 p-6 bg-white  rounded-t-lg shadow-md">
            <h2 class="text-2xl font-normal mb-4">Détail du contact (update)</h2>
            <input type="hidden" id="update_organisation_id" name="update_organisation_id">
              <input type="hidden" id="update_id">
              <div class="flex mb-2">
                <div class="mr-2 w-1/2">
                  <label for="prenom" class="block text-[#848d98]">Prénom</label>
                  <input type="text" id="update_prenom" name="update_prenom" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                 
                </div>
                <div class="ml-2 w-1/2">
                  <label for="nom" class="block text-[#848d98]">Nom</label>
                  <input type="text" id="update_nom" name="update_nom" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                </div>
              </div>
        
              
              <div class="mb-2">
                <div class=" w-full">
                  <label for="email" class="block text-[#848d98]">Email</label>
                  <input type="email" id="update_email" name="update_email" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                </div> 
              </div>

              <div class="mb-2">
                <div class=" w-full">
                    <label for="entreprise" class="block text-[#848d98]">Entreprise</label>
                    <input type="text" id="update_entreprise" name="update_entreprise" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                  </div> 
              </div>
        
              
              <div class="mb-2">
                <label for="addresse" class="block text-[#848d98]">Address</label>
                <textarea id="update_adresse" name="update_adresse" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" ></textarea>
              </div>
        
             
              <div class="flex mb-2">
                <div class="mr-2 w-1/3">
                  <label for="codepostal" class="block text-[#848d98] mt-2 text-xs md:text-sm">Code Postal</label>
                  <input type="text" id="update_code_postal" name="update_code_postal" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                </div>
                <div class="ml-2 w-full">
                  <label for="ville" class="block text-[#848d98]">Ville</label>
                  <input type="text" id="update_ville" name="update_ville" class="w-full border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                </div>
              </div>
        
              
              <div class="mb-2">
                <label for="statut" class="block text-[#848d98]">Statut</label>
                <select id="update_statut" name="update_statut"  class="w-[50%] border border-[#848d98] shadow-md  rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" >
                  <option value="Lead">Lead</option>
                  <option value="Prospect">Prospect</option>
                  <option value="Client">Client</option>
                </select>
              </div>
        
              
              
            
          </div>
          <div class="flex justify-end gap-1 bg-[#eff5f5] ">
            <button type="button" class="px-4 py-2  text-[#45505e] rounded-md border close-update-contact-form">Annuler</button>
            <button type="submit" class="px-4 py-2 bg-[#0ebccb] text-white rounded-md border border-[black] update_contact">Update</button>
          </div>
        
    </form>

</div>


@section('script')

@endsection