<?php

namespace App\Http\Livewire\Sale\Component;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class CompanySearch extends Component
{
    public bool $modal=false;
    public $number,$name,$status,$condition;
    public function render()
    {
        return view('livewire.sale.component.company-search');
    }

    public function searchDocument()
    {
        $rules=[
            'number'=>'required|min:11|max:11'
        ];
        $messages=[
            'number.required'=>'Porfavor Seleccione una opcion.',
            'number.min'=>'El numero de RUC debe tener 11 digitos.',
            'number.max'=>'El numero de DNI debe tener 11 digitos.',
    
        ];
        $this->validate($rules,$messages);

        $token=config('services.apiperu.token');
        $urlruc=config('services.apiperu.urlruc');

        $response= Http::withHeaders([
            'Referer' => 'http://apis.net.pe/api-ruc',
            'Authorization' => 'Bearer ' . $token
        ])->get($urlruc.$this->number);
       
         $rpta=json_decode($response);
         $this->name=$rpta->nombre;
         $this->status=$rpta->estado;

         $this->condition=$rpta->condicion;

    
        
         

    }
    public function nice(){
        $rules=[
            'number'=>'required|min:11|max:11',
            'name'=>'required',
            'status'=>'required',
            'condition'=>'required',           
        ];
        $this->validate($rules);
        $this->emit('companySearch',$this->name,$this->number);
        $this->closemodal();
        $this->resetfresh();
        $this->emit('success','Agregado Correctamente');

    }

    public function resetfresh()
    {
        $this->resetValidation();
        $this->reset([
            'name',
            'status',
            'condition',       
            'number',          
          
        ]);
    }
    public function closemodal()
    {
        $this->reset(['modal']);
        $this->resetfresh();
    }
}
