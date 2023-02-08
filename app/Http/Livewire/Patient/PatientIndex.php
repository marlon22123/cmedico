<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use App\Models\Type_document;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;
class PatientIndex extends Component
{
    use WithPagination;
    public $search;
    public bool $modal=false;
    public $cant=10;
    public $componentName;
    public $selected_id;

    public $name,$surname,$type_document,$number,$phone,$place,$birth;

    protected $listeners=['delete'];


    public function paginationView()
    {
        return 'tailwind-pagination';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    

    public function mount()
    {
        $this->componentName='Pacientes';
            
    }
    public function render()
    {
        $t_doc=Type_document::all();
        $patients=Patient::where('number','like','%' . $this->search .'%')
        ->orWhere('name','like','%' . $this->search .'%')
        ->orWhere('surname','like','%' . $this->search .'%')
        ->latest('id')->paginate($this->cant);
       

        return view('livewire.patient.patient-index',compact('patients','t_doc'))->layout('layouts.app');
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

        Patient::create([
            'name'=>$this->name,
            'surname'=>$this->surname,
            'type_document_id'=>$this->type_document,
            'number'=>$this->number,
            'phone'=>$this->phone,
            'place'=>$this->place,
            'birth'=>$this->birth
        ]);
        $this->closemodal();
        $this->resetfresh();
        $this->emit('success','Agregado Correctamente');

    }

    public function edit(Patient $patient)
    {
       $record=$patient;

       $this->selected_id=$record->id;
        $this->name=$record->name;
       $this->surname=$record->surname;
       $this->type_document=$record->type_document_id;
       $this->number=$record->number;
        $this->phone=$record->phone;
        $this->place=$record->place;
        $this->birth=$record->birth;
        $this->modal=true;
    }
    public function update()
    {
        $rules=[
      
            'name'=>'required',
            'surname'=>'required',
            'type_document'=>'required',
            'number'=>"required|min:8|max:8|unique:patients,number,{$this->selected_id}",
            'phone'=>'required|min:9|max:9',
            'place'=>'required',
            'birth'=>'required' 
         ];
     
       $this->validate($rules);

       $patient=Patient::findOrFail($this->selected_id);
        
       $patient->update([
        'name'=>$this->name,
        'surname'=>$this->surname,
        'type_document_id'=>$this->type_document,
        'number'=>$this->number,
        'phone'=>$this->phone,
        'place'=>$this->place,
        'birth'=>$this->birth
       ]);
        $patient->save();
        $this->closemodal();
        $this->emit('success','Cambios guardados Correctamente');

    }

    public function delete(Patient $patient)
    {
      $patient->delete();
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
            'selected_id'
        ]);
    }
    public function closemodal()
    {
        $this->reset(['modal']);
        $this->resetfresh();
    }
}
