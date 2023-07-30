@extends('app')

@section('content')
<div class="container mx-auto  mt-4 page">
    <h1 class="text-[35px]">Liste des contacts</h1>
    <div class="flex justify-between items-center">
        <input type="text" name="first-name" id="searchInput"  placeholder="Recherche..." class="block rounded-md py-[5px] w-[40%] mt-4  bg-[#ffffff] text-gray-800 placeholder:text-gray-400 placeholder:px-2 placeholder:text  focus:ring-2  focus:ring-inset ">
        <a href="#" class='text-white btn text-center  py-1.5 px-3.5 rounded-md show-modal '>+ Ajouter</a>
    </div>
    
    <div class="mt-4" >
        {{-- proble here check the border انشاء الله  --}}
        <table class="w-full border-t border-b-2 drop-shadow-2xl " >
            <thead class="bg-[#f4fafa]">
                <tr  >
                    <th class="p-3 text-sm font-normal">Nom du contact</th>
                    <th class="p-3 text-sm font-normal">Société </th>
                    <th class="p-3 text-sm font-normal">Statut</th>
                    <th class="p-3 text-sm font-normal"></th>
                </tr>

            </thead>
            <tbody class="bg-white" id="tableBody">
                @foreach ($contacts as $contact)
                    <tr >
                        <td class="border-t border-b p-3 text-sm w-[40%]">{{$contact->nom}} {{$contact->prenom }}</td>
                        <td class="border-t border-b p-3 text-sm w-[40%]">{{$contact->organisation->nom}}</td>
                        <td class="border-t border-b p-3 text-sm">
                        <span 
                        
                            @if ($contact->organisation->statut =="Lead") class="px-2  bg-[#c3dcfd] rounded-lg"@endif
                            @if ($contact->organisation->statut =="Client") class="px-2  bg-[#b8edd6] rounded-lg"@endif
                            @if ($contact->organisation->statut =="Prospect") class="px-2  bg-[#fbd6ba] rounded-lg"@endif
                        >
                            {{$contact->organisation->statut}}
                        </span>
                    </td>
                        <td class="border-t border-b p-3 text-sm flex gap-2">
                            <a class="show-modal-view view-contact-form "
                                data-bs-toggle="model"
                                data-bs-toggle="#view-model"
                                data-id="{{$contact->id}}"
                                data-nom="{{$contact->nom}}"
                                data-prenom="{{$contact->prenom}}"
                                data-email="{{$contact->e_mail}}"
                                data-entreprise="{{$contact->organisation->nom}}"
                                data-adresse="{{$contact->organisation->adresse}}"
                                data-code_postal="{{$contact->organisation->code_postal}}"
                                data-ville="{{$contact->organisation->ville}}"
                                data-statut="{{$contact->organisation->statut }}" 
                                    
                            ><img src="{{ asset('assets/icons/eye.png') }}" class="w-[20px] hover:scale-110"    alt="Icon"></a> 

                            <a class="show-modal-update update-contact-form "
                                data-bs-toggle="model"
                                data-bs-toggle="#update-model"
                                data-id="{{$contact->id}}"
                                data-nom="{{$contact->nom}}"
                                data-prenom="{{$contact->prenom}}"
                                data-email="{{$contact->e_mail}}"
                                data-entreprise="{{$contact->organisation->nom}}"
                                data-adresse="{{$contact->organisation->adresse}}"
                                data-code_postal="{{$contact->organisation->code_postal}}"
                                data-ville="{{$contact->organisation->ville}}"
                                data-statut="{{$contact->organisation->statut }}"
                                data-organisation_id="{{$contact->organisation_id }}"
                             ><img src="{{ asset('assets/icons/pen.png') }}" class="w-[20px] hover:scale-110"  alt="Icon"></a>
                            <a class="show-alert-delete delete-contact "
                                data-bs-toggle="model"
                                data-bs-toggle="#delete-alert-modal"
                                data-id="{{$contact->id}}"
                            
                            ><img src="{{ asset('assets/icons/bin.png') }}" class="w-[20px] hover:scale-110"  alt="Icon"></a>

                        </td>
                    </tr>
                   
                @endforeach
                
                
            </tbody>
        </table>
        <div class="my-4">
            {{$contacts->links()}}
        </div>
    </div>
</div>
<?php
        
$imageUrlDelete = asset('assets/icons/bin.png');
$imageUrlEdit = asset('assets/icons/pen.png');
$imageUrlView = asset('assets/icons/eye.png');
?>



       
  
@endsection


@section('script')
        {{-- search ajax for contacts  --}}
<script>
    const imageUrlDelete = '<?php echo $imageUrlDelete; ?>';
    const imageUrlEdit = '<?php echo $imageUrlEdit; ?>';
    const imageUrlView = '<?php echo $imageUrlView; ?>';
     $(document).ready(function() {
        $('#searchInput').on('input', function() {
            const query = $(this).val();
            $.ajax({
                url: '{{route("ajax_search_contact")}}',
                type: 'post',
                dataType: 'json',
                data: { q: query , "_token":"{{ csrf_token()}}"},
              
                    success: function(data) {
                        displayResults(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }

               
               
            });
        });

        function displayResults(data) {
            const tableBody = $('#tableBody');
            tableBody.empty();

            if (data.length === 0) {
                tableBody.append('<tr><td colspan="2">No results found</td></tr>');
            } else {
                
                data.data.forEach(function(contact) {
                    const row = `<tr><td class="border-t border-b p-3 text-sm w-[40%]">${contact.nom} ${contact.prenom}</td><td class="border-t border-b p-3 text-sm w-[40%]">${contact.organisation.nom}</td><td class="border-t border-b p-3 text-sm"><span${(contact.organisation.statut === 'Lead' ? ' class="px-2 bg-[#c3dcfd] rounded-lg"' : (contact.organisation.statut === 'Client' ? ' class="px-2 bg-[#b8edd6] rounded-lg"' : (contact.organisation.statut === 'Prospect' ? ' class="px-2 bg-[#fbd6ba] rounded-lg"' : '')))}>${contact.organisation.statut}</span></td><td class="border-t border-b p-3 text-sm flex gap-2"><a class="show-modal"><img src="${imageUrlView}" class="w-[20px] hover:scale-110" alt="Icon"></a><a><img src="${imageUrlEdit}" class="w-[20px] hover:scale-110" alt="Icon"></a><a><img src="${imageUrlDelete}" class="w-[20px] hover:scale-110" alt="Icon"></a></td></tr>`

                    tableBody.append(row);
                });
            }
        }
    });
</script>
    
@endsection