<?php

namespace App\Http\Livewire\Ambient;

use App\Models\Ambient;
use Livewire\Component;
use Livewire\WithPagination;

class AmbientIndex extends Component
{
    use WithPagination;
    public $search;
    public bool $modal=false;
    public $cant=10;
    public $componentName;
    public $selected_id;

    public $name;

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
        $this->componentName='Ambientes';
            
    }
    public function render()
    {
        $ambients=Ambient::where('name','like','%' . $this->search .'%')
        ->latest('id')->paginate($this->cant);
        return view('livewire.ambient.ambient-index',compact('ambients'))->layout('layouts.app');
    }

    public function save()
    {
        $rules=[
            'name'=>'required',
         ];
     
       $this->validate($rules);

       Ambient::create([
 
            'name'=>$this->name,
 
        ]);
        $this->closemodal();
        $this->resetfresh();
        $this->emit('success','Agregado Correctamente');

    }

    public function edit(Ambient $service)
    {
       $record=$service;
       $this->selected_id=$record->id;

       $this->name=$record->name;


        $this->modal=true;
    }
    public function update()
    {
        $rules=[

            'name'=>'required',

         ];
     
       $this->validate($rules);

       $patient=Ambient::findOrFail($this->selected_id);
        
       $patient->update([
        'name'=>$this->name,
    ]);
        $patient->save();
        $this->closemodal();
        $this->emit('success','Cambios guardados Correctamente');

    }

    public function delete(Ambient $service)
    {
      $service->delete();
    }
    public function resetfresh()
    {
        $this->resetValidation();
        $this->reset([

            'name',

            'selected_id'
        ]);
    }
    public function closemodal()
    {
        $this->reset(['modal']);
        $this->resetfresh();
    }
}
