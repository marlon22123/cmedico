<?php

namespace App\Http\Livewire\Service;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceIndex extends Component
{
    use WithPagination;
    public $search;
    public bool $modal=false;
    public $cant=10;
    public $componentName;
    public $selected_id;

    public $baseprice,$tax,$totalprice;

    public $code,$name,$description,$price,$stock;

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
        $this->componentName='Servicios';
            
    }

    public function render()
    {
        $services=Service::where('code','like','%' . $this->search .'%')
        ->orWhere('name','like','%' . $this->search .'%')
        ->orWhere('description','like','%' . $this->search .'%')
        ->latest('id')->paginate($this->cant);
        return view('livewire.service.service-index',compact('services'))->layout('layouts.app');
    }

    public function save()
    {
        $rules=[
      
            'code'=>'required|unique:services',
            'name'=>'required',
            'description'=>'required',
            'stock'=>'required',
            'totalprice'=>'required',

         ];
     
       $this->validate($rules);
       $bp=number_format($this->baseprice,2);
         $tx=number_format($this->tax,2);
        Service::create([
            'code'=>$this->code,
             'name'=>$this->name,
            'description'=>$this->description,
            'stock'=>$this->stock,
            'base_price'=>$bp,
            'tax'=>$tx,
            'total_price'=>$this->totalprice, 
        ]);
       
         $this->closemodal();
        $this->resetfresh();
        $this->emit('success','Agregado Correctamente');

    }

    public function edit(Service $service)
    {
       $record=$service;

       $this->selected_id=$record->id;
        $this->code=$record->code;
       $this->name=$record->name;
       $this->description=$record->description;
       $this->totalprice=$record->total_price;
        $this->stock=$record->stock;

        $this->modal=true;
        $this->updatedTotalprice();
    }
    public function update()
    {
        $rules=[
            'code'=>"required|unique:services,code,{$this->selected_id}",
            'name'=>'required',
            'description'=>'required',
            'totalprice'=>'required',
            'stock'=>'required',
         ];
     
       $this->validate($rules);

       $patient=Service::findOrFail($this->selected_id);
       $bp=number_format($this->baseprice,2);
       $tx=number_format($this->tax,2);
       $patient->update([
        'code'=>$this->code,
        'name'=>$this->name,
        'description'=>$this->description,
        'stock'=>$this->stock,
        'base_price'=>$bp,
        'tax'=>$tx,
        'total_price'=>$this->totalprice, 

    ]);
        $patient->save();
        $this->closemodal();
        $this->emit('success','Cambios guardados Correctamente');

    }

    public function delete(Service $service)
    {
      $service->delete();
    }
    public function resetfresh()
    {
        $this->resetValidation();
        $this->reset([
            'code',
            'name',
            'description',
            'stock',
            'totalprice',
            'baseprice',
            'tax',
            'selected_id'
        ]);
    }
    public function closemodal()
    {
        $this->reset(['modal']);
        $this->resetfresh();
    }

    public  function updatedTotalprice()
    {
        if($this->totalprice!=null){
            $this->baseprice=( $this->totalprice/1.18);
            $this->tax=($this->totalprice-$this->baseprice);
        }else{
            $this->baseprice=null;
            $this->tax=null;
        }
    }
}
