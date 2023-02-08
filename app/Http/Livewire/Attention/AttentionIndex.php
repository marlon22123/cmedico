<?php

namespace App\Http\Livewire\Attention;

use App\Models\Attention;
use App\Models\Service;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Livewire\Component;

class AttentionIndex extends Component
{
    use WithPagination;
    public $search;
    public bool $modal=false;
    public $cant=10;
    public $componentName;
    public $selected_id;

    public $specialty,$status,$user,$service,$patient;

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
        $this->componentName='Atenciones';
            
    }
    public function render()
    {
        $users=User::all();
        $services=Service::all();
        $patients=Patient::all();

                    /*   $attentions=Attention::whereHas('user', function (Builder $query) {
                        $query->where('specialty','like','%' . 1 .'%');
                    })->paginate($this->cant); */

        $attentions=Attention::whereHas('user', function (Builder $query) {
            $query->where('name', 'like', '%'  . $this->search .'%' );
           })

           ->orWhereHas('service', function (Builder $query) {
            $query->where('name', 'like', '%'  . $this->search .'%' );
           })
           ->orWhereHas('patient', function (Builder $query) {
            $query->where('name', 'like', '%'  . $this->search .'%' );
           })
        ->latest('id')->paginate($this->cant); 
        return view('livewire.attention.attention-index',compact('users','services','patients','attentions'))->layout('layouts.app');
    }

    public function save()
    {
        $rules=[
      
            'specialty'=>'required',
            'status'=>'required',
            'user'=>'required',
            'service'=>'required',
            'patient'=>'required',

         ];
     
       $this->validate($rules);

        Attention::create([
            'specialty'=>$this->specialty,
            'status'=>$this->status,
            'user_id'=>$this->user,
            'service_id'=>$this->service,
            'patient_id'=>$this->patient,
    
        ]);
        $this->closemodal();
        $this->resetfresh();
        $this->emit('success','Agregado Correctamente');

    }

    public function edit(Attention  $attention)
    {
       $record=$attention;

       $this->selected_id=$record->id;

        $this->specialty=$record->specialty;
       $this->status=$record->status;
       $this->user=$record->user_id;
       $this->service=$record->service_id;
        $this->patient=$record->patient_id;

        $this->modal=true;
    }
    public function update()
    {
        $rules=[
      
            'specialty'=>'required',
            'status'=>'required',
            'user'=>'required',
            'service'=>'required',
            'patient'=>'required', 
         ];
     
       $this->validate($rules);

       $attention=Attention::findOrFail($this->selected_id);
        
       $attention->update([
        'specialty'=>$this->specialty,
        'status'=>$this->status,
        'user_id'=>$this->user,
        'service_id'=>$this->service,
        'patient_id'=>$this->patient,

    ]);
        $attention->save();
        $this->closemodal();
        $this->emit('success','Cambios guardados Correctamente');

    }

    public function delete(Attention $attention)
    {
      $attention->delete();
    }
    public function resetfresh()
    {
        $this->resetValidation();
        $this->reset([
            'specialty',
            'status',
            'user',
            'service',
            'patient',
            'selected_id'
        ]);
    }
    public function closemodal()
    {
        $this->reset(['modal']);
        $this->resetfresh();
    }
}
