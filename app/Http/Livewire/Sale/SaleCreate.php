<?php

namespace App\Http\Livewire\Sale;


use Livewire\Component;

class SaleCreate extends Component
 
{

   
    public $componentName;
   


    

   
    public function mount()
    {
        $this->componentName = 'Crear Venta';
      
     
    }

    public function render()
    {
        return view('livewire.sale.sale-create')->layout('layouts.app');
    }
 
   
  


}
