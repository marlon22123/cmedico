<?php

namespace App\Http\Livewire\Specialty;

use App\Models\Specialty;
use Livewire\Component;
use Livewire\WithPagination;

class SpecialtyIndex extends Component
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
        $this->componentName='Especialidades';
    }


    public function render()
    {
        $specialties=Specialty::where('name','like','%'.$this->search.'%')->paginate($this->cant);
        return view('livewire.specialty.specialty-index',compact('specialties'))->layout('layouts.app');
    }

    public function save()
    {
        $rules=[
            'name'=>'required|unique:specialties',
        ];
        $this->validate($rules);

        Specialty::create([
            'name'=>$this->name,
        ]);

        $this->closemodal();
        $this->resetfresh();
        $this->emit('alert','La especialidad se ha creado con éxito');
        
     
    }


    public function edit(Specialty $specialty)
    {
        $this->selected_id=$specialty->id;
        $this->name=$specialty->name;

        $this->modal=true;
    }
    public function update()
    {
        $rules=[
            'name'=>'required|unique:specialties,name,'.$this->selected_id,
        ];
        $this->validate($rules);

        $specialty=Specialty::find($this->selected_id);
        $specialty->update([
            'name'=>$this->name,
        ]);

        $this->closemodal();
        $this->resetfresh();
        $this->emit('success','La especialidad se ha actualizado con éxito');
    }

    public function delete(Specialty $specialty)
    {
        $specialty->delete();

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
