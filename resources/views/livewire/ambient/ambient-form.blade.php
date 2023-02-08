      
<div class="grid grid-cols-6 gap-6">

            
                <div class="col-span-6 ">
                  <label  for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                  <input wire:model.defer="name" type="text" id="name"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" disabled>
                    @error('name')
                    <h1 class="text-red-500">{{$message}}</h1>
                    @enderror
                </div>
  

  

  
                
</div>
      
          


  

  