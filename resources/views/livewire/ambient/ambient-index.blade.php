<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $componentName }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg ">
                <x-table-head>
                    <x-slot:boton_name>
                       Añadir Ambiente
                    </x-slot:boton_name>
                </x-table-head>

                <div class="overflow-x-auto">
                    @if (count($ambients))
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-[#eff5fe] ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Id
                                    </th>     
                                    <th scope="col" class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Opciones
                                    </th>
                                    
                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ambients as $item)   
                                    <tr class=" border-b  hover:bg-gray-50">
                                    
            
                                        <td class="px-6 py-4">
                                            {{$item->id}}
                                        </td> 
                                        <td class="px-6 py-4">
                                           {{$item->name}}
                                        </td> 
                                                                       
                                        <td class="px-6 py-4 flex ">
                                            <a     class=" p-1 text-base font-normal  text-black hover:bg-amber-500 hover:text-white  rounded-lg  cursor-pointer " wire:click="edit({{$item}})" >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </a>
                                    
                                             @if ($item->users->count()<1) 
                                            <a  class=" p-1 text-base font-normal  text-black hover:bg-red-500 hover:text-white  rounded-lg  cursor-pointer " wire:click="$emit('deleteAmbient',{{$item->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                                
                                            </a> 
                                            @endif 
                                            
                                            
                                            
            
                                        </td>
                                        
                                    </tr>
                                
                                @endforeach 
                            </tbody>
                        </table>
                    @else
                        <h6 class="text-center my-5">Ningun registro encontrado para "{{$search}}"</h6>
                    @endif
                  
                </div>

                <div class="p-6">
                    {{$ambients->links()}}
                  </div>
            </div>
        </div>
    </div>

    <x-modal-form :head='$componentName' :id='$selected_id'>
        @include('livewire.ambient.ambient-form')
    </x-modal-form>
    

    @push('js')


<script>
    Livewire.on('deleteAmbient',ambienttId=>{
      Swal.fire({
              title: '¿Estas segurobg?',
              text: "¡No podras revertir esta accion!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Eliminar',
              padding: '2em'
              }).then(function(result) {
              if (result.value) {
                  Livewire.emitTo('ambient.ambient-index','delete',ambientId);
                  Swal.fire(
                  'Eliminado!',
                  'El registro fue eliminado correctamente',
                  'success'
                  )
              }
              })
    });
          
           
 </script>
    @endpush
   
    
</div>
