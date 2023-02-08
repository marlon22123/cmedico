<div>
    <x-jet-button wire:click="pdf" wire:loading.attr="disabled" class="ml-2" >
        Buscar
    </x-jet-button>

 
    <x-jet-dialog-modal wire:model="modal" >
        <x-slot:title >
           Buscar Servicio
        </x-slot:title>
        <x-slot:content>
   <!-- <embed src="Assembly.pdf" width="100%" height="100%" type="application/x-pdf" trusted="yes" application="yes" title="Assembly">
                </embed> -->
             {{-- <iframe width="100%" height="400px" src="{{route('generate.pdf-a4',$url)}}?#zoom=70&scrollbar=1&toolbar=1&navpanes=1" ></iframe> --}}
             
             @if ($type==0)
               {{--  <object  width="100%" height="400px" type="application/pdf" title="Assembly" data="{{$url}}?#zoom=50&scrollbar=1&toolbar=1&navpanes=1">
                
                    <p>System Error - This PDF cannot be displayed, please contact IT.</p>
                </object> --}}
                <iframe width="100%" height="400px" src="{{$url}}?#zoom=70&scrollbar=1&toolbar=1&navpanes=1" ></iframe>
                @elseif($type==1)
                <iframe width="100%" height="400px" src="{{$url}}?#zoom=70&scrollbar=1&toolbar=1&navpanes=1" ></iframe>
             @endif
     
        </x-slot:content>
        <x-slot:footer>
      
        <x-jet-button wire:click="change" wire:loading.attr="disabled" class="ml-2" >
            TIKET
        </x-jet-button>
         
            <x-jet-button wire:click="$set('modal',false)" wire:loading.attr="disabled" class="ml-2" >
                Listo
            </x-jet-button>
         
        
        </x-slot:footer>
    </x-jet-dialog-modal>

</div>
