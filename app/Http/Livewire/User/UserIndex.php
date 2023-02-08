<?php

namespace App\Http\Livewire\User;

use App\Models\Ambient;
use App\Models\Specialty;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    public $search;
    public bool $modal=false;
    public $cant=10;
    public $componentName;
    public $selected_id;

    public $name,$email,$specialty,$ambient,$role,$status;

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
        $this->componentName='Usuarios';
            
    }
    public function render()
    {
        $specialties=Specialty::all();
        $ambients=Ambient::all();
        $users=User::where('name','like','%' . $this->search .'%')
        ->orWhere('email','like','%' . $this->search .'%')
        ->orWhere('role','like','%' . $this->search .'%')
        ->latest('id')
        ->paginate($this->cant);

        return view('livewire.user.user-index',compact('users','specialties','ambients') )->layout('layouts.app');
    }

    public function save()
    {
        $rules=[
      
            'name'=>'required',
            'email'=>'required',
            'specialty'=>'required',
            'ambient'=>'required',
            'role'=>'required',
            'status'=>'required',
         ];
     
       $this->validate($rules);

        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'specialty_id'=>$this->specialty,
            'ambient_id'=>$this->ambient,
            'role'=>$this->role,
            'status'=>$this->status,
 
        ]);
        $this->closemodal();
        $this->resetfresh();
        $this->emit('success','Agregado Correctamente');

    }

    public function edit(User $user)
    {
       $record=$user;

       $this->selected_id=$record->id;
       
        $this->name=$record->name;
       $this->email=$record->email;
       $this->specialty=$record->specialty_id;
       $this->ambient=$record->ambient_id;
        $this->role=$record->role;
        $this->status=$record->status;


        $this->modal=true;
    }
    public function update()
    {
        $rules=[
      
            'name'=>'required',
            'email'=>'required',
            'specialty'=>'required',
            'ambient'=>"required",
            'role'=>'required',
            'status'=>'required',
 
         ];
     
       $this->validate($rules);

       $patient=User::findOrFail($this->selected_id);
        
       $patient->update([
        'name'=>$this->name,
        'email'=>$this->email,
        'specialty_id'=>$this->specialty,
        'ambient_id'=>$this->ambient,
        'role'=>$this->role,
        'status'=>$this->status,

    ]);
        $patient->save();
        $this->closemodal();
        $this->emit('success','Cambios guardados Correctamente');

    }

    public function delete(User $user)
    {
      $user->delete();
    }
    public function resetfresh()
    {
        $this->resetValidation();
        $this->reset([
            'name',
            'email',
            'specialty',
            'ambient',
            'role',
            'status',
            'selected_id'
        ]);
    }
    public function closemodal()
    {
        $this->reset(['modal']);
        $this->resetfresh();
    }
}
