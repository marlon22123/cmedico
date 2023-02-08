<div class="col-span-6 xl:col-span-3 bg-white pb-5 shadow-xl sm:rounded-lg ">
    <div class="bg-cyan-700 px-7 py-1  sm:rounded-t-lg  ">
        <h1 class="text-white font-black text-lg">COBRO Y FACTURACION: </h1>
    </div>

    <label class="block text-sm font-medium text-gray-700 px-5 pt-4 ">PACIENTE:</label>
    <div class="px-5 pb-3 flex ">

        @if ($patient)
            {{--  <div class="flex w-full"> --}}
            <input type="text"
                class="mt-1 block w-full  bg-gray-200 border border-gray-300  shadow-sm focus:border-transparent focus:ring-indigo-500 sm:text-sm cursor-not-allowed"
                value=" {{ $patient->number }} - {{ $patient->name }} {{ $patient->surname }}" disabled>

            <span>
                <button wire:click="removePatient"
                    class="p-2 mt-1 ml-2 text-sm font-medium text-white bg-red-700  border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                    </svg>

                </button>
            </span>
            {{--   </div>  --}}
        @else
            @livewire('sale.component.patient-search', ['event' => 'setPatient'])
            <livewire:sale.component.patient-create>
        @endif




    </div>





    <div class="grid grid-cols-3 pt-3 px-5">
        <div class="pr-4">
            <label for="names" class="block text-sm font-medium text-gray-700">Comprobante</label>
            <select wire:model="voucher" wire:change="billingData" 
                class="mt-1 block w-full  border border-gray-300  py-2 px-3 shadow-sm focus:border-transparent  focus:ring-indigo-500 sm:text-sm">
                <option value="2">--Seleccione--</option>
                <option value="1">Boleta</option>
                <option value="0">Factura</option>
            </select>

        </div>
        <div class="pr-4">
            <label for="names" class="block text-sm font-medium text-gray-700">Serie -
                Correlativo</label>
            <input wire:model="serie_number" type="text" id="names"
                class="mt-1 block w-full  bg-gray-200 border border-gray-300  shadow-sm focus:border-transparent focus:ring-indigo-500 sm:text-sm cursor-not-allowed"
                disabled>

        </div>
        <div class="pr-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Fecha Emision</label>
            <input type="date" wire:model="date" id="date"
                class="mt-1 block w-full  bg-gray-200 border border-gray-300  shadow-sm focus:border-transparent focus:ring-indigo-500 sm:text-sm cursor-not-allowed">

        </div>
    </div>

    <div class="px-5 pt-4 {{ $voucher != 0 ? 'hidden' : 'block' }}">
        <label for="names" class="block text-sm font-medium text-gray-700">Nombre / Razon
            Social</label> {{-- @if ($company_name) <span> borrar </span> @endif --}}
        <div class="flex items-center">
            <input type="text" id="simple-search"
                class="mt-1 block w-full     bg-gray-200 border  border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                value="{{ $company_number }} - {{ $company_name }}" disabled>

            @if ($company_name)
                <button wire:click="removeCompany"
                    class="p-2 mt-1 ml-2 text-sm font-medium text-white bg-red-700  border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                    </svg>


                </button>
            @else
                <livewire:sale.component.company-search>
            @endif



        </div>
    </div>

    <div class="grid grid-cols-3 pt-8 px-5">
        <div class="pr-4">
            <label class="block text-sm font-medium text-gray-700">A Pagar </label>
            <div class="relative block">
                <span class="absolute inset-y-0 left-0 flex border-gray-300 items-center px-1 border ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </span>
                <input wire:model="total" type="number"
                    class="mt-1 py-2 pl-12  block w-full bg-gray-200   border border-gray-300  shadow-sm  sm:text-sm cursor-not-allowed"
                    disabled>

            </div>

        </div>
        <div class="pr-4">
            <label class="block text-sm font-medium text-gray-700  ">Efectivo Recibido </label>
            <div class="relative block">
                <span class="absolute inset-y-0 left-0 flex items-center px-1 border border-gray-300   ">
                    +

                </span>
                <input type="text"
                    class="mt-1 py-2 pl-12  block w-full  bg-gray-200  border border-gray-300 cursor-not-allowed  shadow-sm  sm:text-sm"
                    disabled value="{{ $cash ? number_format($cash, 2) : number_format(0, 2) }} ">
                <span class="absolute inset-y-0 right-0 flex items-center px-1 border border-gray-300 ">
                    -

                </span>
            </div>

        </div>

        <div class="pr-4">
            <label class="block text-sm font-medium text-gray-700">Cambio </label>
            <div class="relative block">
                <span class="absolute inset-y-0 left-0 flex items-center border-gray-300 px-1 border ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>


                </span>
                <input type="text"
                    class="mt-1 py-2 pl-12  block w-full cursor-not-allowed  bg-gray-200 border border-gray-300  shadow-sm   sm:text-sm"
                    disabled value="{{ number_format($change, 2) }}">

            </div>

        </div>
    </div>

    <div class="grid grid-cols-3 pt-8 px-5">
        <div class="pr-4">
            <label class="block text-sm font-medium text-gray-700">Metodo de Pago </label>
            <select 
                class="mt-1 block w-full  border border-gray-300  py-2 px-3 shadow-sm focus:border-transparent  focus:ring-indigo-500 sm:text-sm">
                <option>EFECTIVO</option>
                <option>YAPE</option>
                <option>TRASFERENCIA</option>
            </select>

        </div>
        <div class="pr-4">
            <label class="block text-sm font-medium text-gray-700">Monto:</label>
            <div class="relative block">
                <span class="absolute inset-y-0 left-0 flex items-center border-gray-300 px-1 border ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>


                </span>
                <input wire:model='cash' type="number"
                    class="  py-2 pl-12 mt-1 block w-full   border border-gray-300  shadow-sm focus:border-transparent focus:ring-indigo-500 sm:text-sm ">

            </div>


        </div>

        <div class=" pr-4 pt-6 ">
            <button wire:click="exact"
                class="  w-full px-3 py-2 text-sm font-medium text-center text-white bg-sky-700  hover:bg-sky-800 focus:ring-2   focus:ring-blue-300">
                Pago Exacto
            </button>

        </div>
    </div>

  {{--   <div class="grid grid-cols-3 pt-8 px-5">
        <div class="pr-4">
            <label class="block text-sm font-medium text-gray-700">Descuento </label>
            
                  
            </div>

        </div>



    </div> --}}
    <div class="px-5 py-4 text-red-500">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div class="grid grid-cols-3  px-5">
        <div class="pr-4 col-span-2">
            <label class="block text-sm font-medium text-gray-700">Observacion </label>
            <input wire:model="observation"  type="text"  class="mt-1 block w-full   border  border-gray-300 shadow-sm focus:border-transparent focus:ring-indigo-500 sm:text-sm" >

        </div>
        

        <div class=" pr-4 pt-6 ">
            <button wire:click="saveSale" class="  w-full px-3 py-2 text-sm font-medium text-center text-white bg-green-700  hover:bg-green-800 focus:ring-2   focus:ring-green-300">
                Cobrar e imprimir
            </button>

        </div>
    </div>
    

    {{$url}}

</div>


</div>




</div>
