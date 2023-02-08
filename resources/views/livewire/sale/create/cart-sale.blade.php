<div class="col-span-6 xl:col-span-3 bg-white pb-5 shadow-xl sm:rounded-lg">
    <div class="bg-cyan-700 px-7 py-1 sm:rounded-t-lg ">
        <h1 class="text-white font-black text-lg">SERVICIOS A PRESTAR: </h1>
    </div>
    <div class="mx-3 my-4 text-right">
        <a wire:click="$set('modal' ,true)" type="button"
            class="text-[#0e1726] bg-white hover:bg-green-600 hover:text-white border-2 border-[#0e1726]   text-sm py-1 px-3  mr-2">
            Agregar Servicios
        </a>
    </div>
    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left text-gray-900 ">
            <thead class="text-xs  text-white uppercase bg-[#0e1726] text-center ">
                <tr>
                    <th>
                        *
                    </th>
                 
                    <th scope="col" class="py-3 {{-- px-6  --}}">
                        Descripcion
                    </th>
            
                    <th scope="col" class="{{-- px-6 py-3 --}}">
                        Precio
                    </th>
                    <th scope="col" class="{{-- px-6 py-3 --}}">
                        Cantidad
                    </th>
                    <th scope="col" class="{{-- px-6 py-3 --}}">
                        Total
                    </th>
                   




                </tr>
            </thead>
            <tbody class="text-center">
                @foreach (Cart::content() as $item)
                        <tr class=" border-b  hover:bg-gray-50">
                            <td   class="py-3">
                                <button wire:click="deleteItem('{{$item->rowId}}')" wire:loading.attr='disabled' class="p-1 text-base font-normal  text-black hover:bg-red-500 hover:text-white  rounded-lg  cursor-pointer ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>

                            </td>
                        <td class="{{-- px-6 py-4 --}}">
                           <p class="font-bold uppercase">{{$item->name}}</p>  
                           <p class="text-sm font-mono">{{$item->options->descripcion}}</p>
                           
                        </td>
                        <td class="{{-- px-6 py-4 --}}">
                            
                            {{$item->options->total_price }}
                           
                        </td>
                        <td class="{{-- px-6 py-4 --}}">
                        
                            {{$item->qty}}
                        </td>

                        <td class="{{-- px-6 py-4 --}}">
                            {{$item->options->total_price*$item->qty}}
                        </td>




                    </tr>
                @endforeach
                


            </tbody>
        </table>


    </div>


    <div class="  grid grid-cols-2">

        <div class="col-start-2  font-black font-mono mt-5 ml-16 mr-3">
          {{--   <div class="flex justify-between  ">
                <h1 >SUBTOTAL </h1>
                <h1>{{Cart::subtotal(2)}}</h1>
            </div> --}}
            <div class="flex justify-between ">
                <h1>O. GRAVADA</h1>
                <h1>{{ /* number_format((Cart::subtotal(2) -  Cart::tax(2)), 2, '.', ''); */ Cart::subtotal(2) }}</h1>
            </div>
            <div class="flex justify-between ">
                <h1>IGV 18%</h1>
                <h1>{{Cart::tax(2);}}</h1>
            </div>
            <div class="flex justify-between">
                <h1>DESCUENTO</h1>
                <h1>0.00</h1>
            </div>
            <div class="flex justify-between">
                <h1>SUB TOTAL</h1>
                <h1>{{Cart::total(2)}}</h1>
            </div>

            <div class="flex justify-between border-t-2  border-black py-1">
                <h1>TOTAL A PAGAR</h1>
                <h1>{{ number_format(round(Cart::total(2),1,PHP_ROUND_HALF_DOWN),2) }}</h1>
       
     
            </div>

        </div>
    </div>


    <x-jet-dialog-modal wire:model="modal" >
        <x-slot:title >
           Buscar Servicio
        </x-slot:title>
        <x-slot:content>
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-900 ">
                    <thead class="text-xs text-white uppercase bg-[#0e1726] ">
                        <tr>
                         
                            <th scope="col" class="px-6 py-3">
                                Codigo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descripcion
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Precio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stock 
                            </th>  
                            <th scope="col" class="px-6 py-3">
                                + 
                            </th>      
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $item)
                            <tr class=" border-b  hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    {{$item->code}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->name}}
                                </td>
                                <td class="px-6 py-4">
                                    
                                    {{$item->description}}
                                </td>          
                                <td class="px-6 py-4 ">
                                    {{$item->total_price}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->stock}}
                                </td>
                                <td class="px-6 py-4">
                                    <input  type="checkbox" class="{{$item->checked==1 ? 'disabled: border-gray-300 text-gray-300 cursor-not-allowed ': ''}}" wire:change="serviceAdd($('#v'+{{$item->id}}).is(':checked'),'{{$item->id}}')"
                                            id="v{{$item->id}}" {{$item->checked==1 ? 'disabled checked': ''}}   wire:loading.attr="disabled" wire:target="serviceAdd" >
                          
                                        </td>

                            </tr>
                        @endforeach
                    
        
        
                    </tbody>
                </table>
             
        
            </div>
        
        </x-slot:content>
        <x-slot:footer>
      
    
         
            <x-jet-button wire:click="closeModal" wire:loading.attr="disabled" class="ml-2" >
                Listo
            </x-jet-button>
         
        
        </x-slot:footer>
    </x-jet-dialog-modal>
    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"></script>
    @endpush
</div>