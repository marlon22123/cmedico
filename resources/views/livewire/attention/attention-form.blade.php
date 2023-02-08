      
<div class="grid grid-cols-6 gap-6">

            
    <div class="col-span-6 sm:col-span-3 ">
            
        <label class="block text-sm font-medium text-gray-700">Servicio: </label>

            <select  wire:model.defer="service"  class="w-full rounded-md block border-gray-300 shadow-sm py-2 mt-1 mr-2 pl-2 pr-7 text-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="" selected>Seleccione...</option>
                @foreach ($services as $item)
                <option value="{{$item->id}}"> {{$item->name}} </option>
                @endforeach 
                
            </select>
        
  

        @error('service')
            <h1 class="text-red-500">{{$message}}</h1>
        @enderror               
    </div>

                <div class="col-span-6 sm:col-span-3 ">
                  
                    <label class="block text-sm font-medium text-gray-700">Estado: </label>
         
                        <select  wire:model.defer="status"  class="w-full rounded-md block border-gray-300 shadow-sm py-2 mt-1 mr-2 pl-2 pr-7 text-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="" selected>Seleccione...</option>
                            <option value="1">Espera</option>
                            <option value="2">Iniciado</option>
                            <option value="3">Terminado</option>

                        </select>
                    
  

                    @error('status')
                        <h1 class="text-red-500">{{$message}}</h1>
                    @enderror               
                </div>
           
                
                <div class="col-span-6 sm:col-span-3 ">
            
                  <label class="block text-sm font-medium text-gray-700">Medico: </label>

                      <select  wire:model.defer="user"  class="w-full rounded-md block border-gray-300 shadow-sm py-2 mt-1 mr-2 pl-2 pr-7 text-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                          <option value="" selected>Seleccione...</option>
                          @foreach ($users as $item)
                          <option value="{{$item->id}}"> {{$item->name}} </option>
                          @endforeach 
                          
                      </select>
                  
  

                  @error('user')
                      <h1 class="text-red-500">{{$message}}</h1>
                  @enderror               
              </div>


            <div class="col-span-6 sm:col-span-3 ">
            
              <label class="block text-sm font-medium text-gray-700">Paciente: </label>

                  <select  wire:model.defer="patient"  class="w-full rounded-md block border-gray-300 shadow-sm py-2 mt-1 mr-2 pl-2 pr-7 text-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                      <option value="" selected>Seleccione...</option>
                      @foreach ($patients as $item)
                      <option value="{{$item->id}}"> {{$item->name}} </option>
                      @endforeach 
                      
                  </select>
              


              @error('patient')
                  <h1 class="text-red-500">{{$message}}</h1>
              @enderror               
          </div>

                
</div>
      
          


  

  