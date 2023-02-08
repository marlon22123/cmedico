<?php

namespace App\Http\Livewire\Sale\Component;

use App\Models\Patient;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class PatientCreate extends Component
{
    public bool $modal=false;
    public $name,$surname,$type_document,$number,$phone,$place,$birth;
    public function render()
    {
        return view('livewire.sale.component.patient-create');
    }

    public function searchDocument()
    {
        $rules=[
            'type_document'=>'required',
            'number'=>'required|min:8|max:11'
        ];
        $messages=[
            'number.required'=>'Porfavor Seleccione una opcion.',
            'type_document.required'=>'Porfavor Inserte numero de documento.',
        ];
        $this->validate($rules,$messages);

        $token=config('services.apiperu.token');
        $urldni=config('services.apiperu.urldni');

        $response= Http::withHeaders([
            'Referer' => 'https://apis.net.pe/consulta-dni-api',
            'Authorization' => 'Bearer ' . $token
        ])->get($urldni.$this->number);
       
         $rpta=json_decode($response);
         $this->name = $rpta->nombres;
         $this->surname = $rpta->apellidoPaterno .' '.$rpta->apellidoMaterno ;

    }

    public function save()
    {
        $rules=[
      
            'name'=>'required',
            'surname'=>'required',
            'type_document'=>'required',
            'number'=>'required|min:8|max:8|unique:patients',
            'phone'=>'required|min:9|max:9',
            'place'=>'required',
            'birth'=>'required' 
         ];
     
       $this->validate($rules);

       $create=Patient::create([
            'name'=>$this->name,
            'surname'=>$this->surname,
            'type_document_id'=>$this->type_document,
            'number'=>$this->number,
            'phone'=>$this->phone,
            'place'=>$this->place,
            'birth'=>$this->birth
        ]);

        $this->emit('patientCreate',$create->id);
        $this->closemodal();
        $this->resetfresh();
        $this->emit('success','Agregado Correctamente');

    }

    public function resetfresh()
    {
        $this->resetValidation();
        $this->reset([
            'name',
            'surname',
            'type_document',
            'number',
            'phone',
            'place',
            'birth',
          
        ]);
    }
    public function closemodal()
    {
        $this->reset(['modal']);
        $this->resetfresh();
    }
    
}
