      
<div class="grid grid-cols-6 gap-6">

                <div class="col-span-6 sm:col-span-1">
                  <label  for="code" class="block text-sm font-medium text-gray-700">Codigo</label>
                  <input wire:model.defer="code" type="text" id="code"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('code')
                    <h1 class="text-red-500">{{$message}}</h1>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label  for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                  <input wire:model.defer="name" type="text" id="name"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('name')
                    <h1 class="text-red-500">{{$message}}</h1>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                  <label for="stock" class="block text-sm font-medium text-gray-700">Cantidad</label>
                  <input wire:model.defer="stock" type="text" id="stock"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  @error('stock')
                  <h1 class="text-red-500">{{$message}}</h1>
                  @enderror
                </div>
  
                <div class="col-span-6 ">
                  <label for="description" class="block text-sm font-medium text-gray-700">Descripcion</label>
                  <input wire:model.defer="description" type="text" id="description"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  @error('description')
                  <h1 class="text-red-500">{{$message}}</h1>
                  @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                  <label  class="block text-sm font-medium text-gray-700">Precio Base (sin IGV)</label>
                  <input type="number"   class="mt-1 block w-full rounded-md bg-gray-200 border-gray-300 shadow-sm  sm:text-sm" disabled value="{{number_format($baseprice,2) }}">
                  @error('baseprice')
                  <h1 class="text-red-500">{{$message}}</h1>
                  @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                  <label  class="block text-sm font-medium text-gray-700">IGV (18%)</label>
                  <input  type="text"  class="mt-1 block w-full rounded-md bg-gray-200 border-gray-300 shadow-sm cursor-not-allowed sm:text-sm" disabled value="{{number_format($tax,2)}}">
                  @error('tax')
                  <h1 class="text-red-500">{{$message}}</h1>
                  @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                  <label  class="block text-sm font-medium text-gray-700">Precio Final</label>
                  <input wire:model="totalprice" type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  @error('totalprice')
                  <h1 class="text-red-500">{{$message}}</h1>
                  @enderror
                </div>
             
                
  

  
                
</div>
      
          


  

  