      
<div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label  for="names" class="block text-sm font-medium text-gray-700">Nombres</label>
                  <input wire:model.defer="name" type="text" id="names"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('name')
                    <h1 class="text-red-500">{{$message}}</h1>
                    @enderror
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                  <input wire:model.defer="email" type="text" id="email"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  @error('email')
                  <h1 class="text-red-500">{{$message}}</h1>
                  @enderror
                </div>

                  
                <div class="col-span-6 sm:col-span-3">
                  <label for="specialty" class="block text-sm font-medium text-gray-700">Especialidad</label>
                  <select wire:model.defer="specialty" id="specialty"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">Seleccione</option>
                    @foreach ($specialties as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                  @error('specialty')
                  <h1 class="text-red-500">{{$message}}</h1>
                  @enderror
                </div>
              
                <div class="col-span-6 sm:col-span-3">
                  <label for="ambient" class="block text-sm font-medium text-gray-700">Ambiente</label>
                  <select wire:model.defer="ambient" id="ambient"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">Seleccione</option>
                    @foreach ($ambients as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                  @error('ambient')
                  <h1 class="text-red-500">{{$message}}</h1>
                  @enderror
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                  <label for="role" class="block text-sm font-medium text-gray-700">Rol</label>
                  <select wire:model.defer="role" id="role"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">Seleccione</option>

                    <option value="admin">Admin</option>
                    <option value="Employee">Empleado</option>
                    <option value="Doctor">Doctor</option>
             
                  </select>
                  @error('name')
                  <h1 class="text-red-500">{{$message}}</h1>
                  @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
                  <select wire:model.defer="status" id="status"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">Seleccione</option>

                    <option value="1">Activo</option>
                    <option value="2">Deshabilitado</option>

             
                  </select>
                  @error('status')
                  <h1 class="text-red-500">{{$message}}</h1>
                  @enderror
                </div>
                
                

  
                
</div>
      
          


  

  