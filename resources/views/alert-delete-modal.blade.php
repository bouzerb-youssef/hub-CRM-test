    
   
    <div  tabindex="-1" id="delete-alert-modal" class="flex justify-center delete-alert-modal fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative  max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
               
                <div class="p-6 text-center">
                    <div class="flex items-center gap-2">
                        <svg class=" mb-4 text-gray-400  h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h1 class="text-2xl font-normal mb-4">Supprimer le contact</h1>

                    </div>
                   
                    <p class="text-lg font-normal ">Etes-vous sur de vouloir supprimer le contact ?</p>
                    <p class="mb-5 text-lg font-normal ">Cette opération est irreversible .</p>
                    
                    
                </div>
                <form  id="delete-contact-form">
                    <div class="flex justify-end  bg-[#eff5f5]">
                        <input type="text" id="delete_contact_id">
                        <button type="button" class="px-4 py-2 my-3 mr-2 text-[#45505e] rounded-md border close-delete-modal-alert">Annuler</button>
                        <a href="" ><button type="button" class="px-4 py-2 my-3 mr-3 bg-[#ee4e4f] text-white rounded-md border border-[black] delete_contact">Confirmer</button></a>
                    </div>
                </form>    
            </div>
            
        </div>
        
    </div>
         
  
@section('script')
 
    
@endsection