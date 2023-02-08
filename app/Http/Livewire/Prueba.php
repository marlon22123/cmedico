<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Prueba extends Component
{
    public $modal=false;
    public $url='';
    public $type=0;

    public function render()
    {

        return view('livewire.prueba');
    }
    public function pdf(){
        if($this->type==0){
            $this->url=route('generate.pdf-a4',21);
            $this->modal=true;       
                     /*    =21; */
        }
        
        
                       
                       
    }
    public function change(){
        $this->type=1;
    
            $this->url=route('generate.pdf-ticket',21);
     
        
    }
}
