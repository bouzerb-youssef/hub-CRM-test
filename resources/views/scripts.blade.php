

 {{-- ajouter a contact using ajax --}}
 <script>
     
     $(document).ready(function () {
       $('#contact-form .add_contact' ).on('click',function (event) {
         event.preventDefault(); 
          //remove old error message after click on submit .
          let fieldNames =["nom" ,"prenom","email","adresse","entreprise","code_postal","ville","statut"];
          fieldNames.forEach(function(fieldName){
               $(`[name="${fieldName}"] + .error-message`).remove();
          });

         let nom =$('#nom').val();
         let prenom =$('#prenom').val();
         let email =$('#email').val();
         let adresse =$('#adresse').val();
         let entreprise =$('#entreprise').val();
         let code_postal =$('#code_postal').val();
         let ville =$('#ville').val();
         let statut =$('#statut').val();

         // Submit the form using AJAX
         $.ajax({
           url: '{{route("contacts.store")}}', 
           type: 'POST',
           data:  {nom:nom ,prenom:prenom,email:email ,adresse:adresse,entreprise:entreprise ,code_postal:code_postal,ville:ville ,statut:statut,"_token":"{{ csrf_token()}}"} ,
          
           dataType: 'json', 
           success: function (response) {
             
          
            
                window.location.href = response.url;
         

           },
           error: function ( error) {
               console.log(error.responseJSON.message)
               if ( error.responseJSON) {
                if(error.responseJSON.message){
                    alert(error.responseJSON.message);
                }
               let errors =error.responseJSON.errors;
               
                    Object.keys(errors).forEach(function (field) {
                    const errorMessage = errors[field][0];
                    $(`[name="${field}"]`).after(`<span class="text-red-600 text-xs error-message">${errorMessage}</span>`);

               });
           }
        }
         });
       });
     

     });
   </script>



{{-- update contacts --}}


<script>
    $(document).ready(function () {
            function showModal() {
                $('#modal-update').removeClass('hidden');
            }
        $('.update-contact-form').on('click', function (event) {
            showModal();
            let id= $(this).data('id');
            let nom =$(this).data('nom');
            let prenom =$(this).data('prenom');
            let email =$(this).data('email');
            let adresse =$(this).data('adresse');
            let entreprise =$(this).data('entreprise');
            let code_postal =$(this).data('code_postal');
            let ville =$(this).data('ville');
            let statut =$(this).data('statut');
            let organisation_id =$(this).data('organisation_id');
  
            
            $('#update_id').val(id);
            $('#update_nom').val(nom);
            $('#update_prenom').val(prenom);
            $('#update_email').val(email);
            $('#update_adresse').val(adresse);
            $('#update_entreprise').val(entreprise);
            $('#update_code_postal').val(code_postal);
            $('#update_ville').val(ville);
            $('#update_statut').val(statut);
            $('#update_organisation_id').val(organisation_id);
  
            
        
        });
        });
  </script>
  <script>
    $(document).ready(function () {
            function closeModal() {
                $('#modal-update').addClass('hidden');
            }
            $('.close-update-contact-form').on('click', function (event) {
                closeModal();
            });
        });
  </script>
  {{-- update a contact using ajax --}}
  <script>
     
    $(document).ready(function () {
      $('#update-contact-form .update_contact' ).on('click',function (event) {
        event.preventDefault(); 
         //remove old error message after click on submit .
         let fieldNames =["nom" ,"prenom","email","adresse","entreprise","code_postal","ville","statut"];
         fieldNames.forEach(function(fieldName){
              $(`[name="${fieldName}"] + .error-message`).remove();
         });
         let id =$('#update_id').val();
        let nom =$('#update_nom').val();
        let prenom =$('#update_prenom').val();
        let email =$('#update_email').val();
        let adresse =$('#update_adresse').val();
        let entreprise =$('#update_entreprise').val();
        let code_postal =$('#update_code_postal').val();
        let ville =$('#update_ville').val();
        let statut =$('#update_statut').val();
        let organisation_id =$('#update_organisation_id').val();
         var data= {id:id,organisation_id:organisation_id, nom:nom ,prenom:prenom,email:email ,adresse:adresse,entreprise:entreprise ,code_postal:code_postal,ville:ville ,statut:statut,"_token":"{{ csrf_token()}}"} ;
        // Submit the form using AJAX
        $.ajax({
          url: '{{ route("contacts.update") }}',
          type: 'post',
          data: data ,
         
          dataType: 'json', 
          success: function (response) {
            console.log(response)
           if (response.success) {
           
                window.location.href = response.url;
           } 
            
          
          },
          error: function ( error) {
              console.log(error.responseJSON.message)
              if ( error.responseJSON) {
               if(error.responseJSON.message){
                   alert(error.responseJSON.message);
               }
              let errors =error.responseJSON.errors;
              
                   Object.keys(errors).forEach(function (field) {
                   const errorMessage = errors[field][0];
                   $(`[name="${field}"]`).after(`<span class="text-red-600 text-xs error-message">${errorMessage}</span>`);
  
              });
          }
       }
        });
      });
     
    
  
    });
  </script>


{{-- view contacts details --}}

<script>
    $(document).ready(function () {
            function showModal() {
                $('#modal-view').removeClass('hidden');
            }
        $('.view-contact-form').on('click', function (event) {
            showModal();
            let id= $(this).data('id');
            let nom =$(this).data('nom');
            let prenom =$(this).data('prenom');
            let email =$(this).data('email');
            let adresse =$(this).data('adresse');
            let entreprise =$(this).data('entreprise');
            let code_postal =$(this).data('code_postal');
            let ville =$(this).data('ville');
            let statut =$(this).data('statut');

            
            $('#view_id').val(id);
            $('#view_nom').val(nom);
            $('#view_prenom').val(prenom);
            $('#view_email').val(email);
            $('#view_adresse').val(adresse);
            $('#view_entreprise').val(entreprise);
            $('#view_code_postal').val(code_postal);
            $('#view_ville').val(ville);
            $('#view_statut').val(statut);

            
        
        });
        });
</script>
{{-- close view modal --}}
<script>
    $(document).ready(function () {
            function closeModal() {
                $('#modal-view').addClass('hidden');
            }
            $('.close-view-contact-form').on('click', function (event) {
                closeModal();
            });
        });
</script>



{{-- delete model --}}

   {{-- display delet alert  --}}

   <script>
    $(document).ready(function () {
            function showModal() {
                $('#delete-alert-modal').removeClass('hidden');
            }
        $('.show-alert-delete ').on('click', function (event) {
            console.log('here');
            showModal();
            let id= $(this).data('id');
           
            
           $('#delete_contact_id').val(id);
        });
        });
</script>

{{-- close modal alert --}}
<script>
    $(document).ready(function () {
            function closeModal() {
                $('#delete-alert-modal').addClass('hidden');
            }
            $('.close-delete-modal-alert').on('click', function (event) {
                closeModal();
            });
        });
</script>

{{-- delete contact --}}

{{-- <script>
    $(document).ready(function () {
            function closeModal() {
                $('#modal-update').addClass('hidden');
            }
            $('.close-update-contact-form').on('click', function (event) {
                closeModal();
            });
        });
  </script> --}}
  {{-- update a contact using ajax --}}
  <script>
     
    $(document).ready(function () {
      $('#delete-contact-form .delete_contact' ).on('click',function (event) {
        event.preventDefault(); 
       
       
         let id =$('#delete_contact_id').val();
        
         var data= {id:id ,"_token":"{{ csrf_token()}}"} ;
        // Submit the form using AJAX
        $.ajax({
          url: '{{ route("contacts.destroy") }}',
          type: 'post',
          data: data ,
         
          dataType: 'json', 
          success: function (response) {
                window.location.href = response.url;
          },
          error: function ( error) {
            
              if ( error.responseJSON) {
               if(error.responseJSON.message){
                   alert(error.responseJSON.message);
               }
          }
       }
        });
      });
     
    
  
    });
  </script>


