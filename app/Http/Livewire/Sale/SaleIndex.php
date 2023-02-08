<?php

namespace App\Http\Livewire\Sale;

use App\Models\Patient;
use App\Models\Sale;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class SaleIndex extends Component
{
    use WithPagination;
    public $search;
    public bool $modal=false;
    public $cant=10;
    public $componentName;
    public $selected_id;

    public $status,$voucher,$serie,$number,$tax,$discount,$total,$contents,$observation,$user_id,$patient_id;

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
        $this->componentName='Ventas';
            
    }
    public function render()
    {
        $users=User::all();
        $patients=Patient::all();
        $sales=Sale::whereHas('user', function (Builder $query) {
            $query->where('name', 'like', '%'  . $this->search .'%' );
           })
           ->orWhereHas('patient', function (Builder $query) {
            $query->where('name', 'like', '%'  . $this->search .'%' );
           })
        ->latest('id')
        ->paginate($this->cant);
        return view('livewire.sale.sale-index',compact('users','patients','sales') )->layout('layouts.app');
    }
}
