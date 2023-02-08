<?php

namespace App\Http\Livewire\Sale\Create;

use Livewire\Component;
use App\Models\Patient;
use App\Models\Billing;
use App\Models\Sale;
use App\Models\Service;
use Gloudemans\Shoppingcart\Facades\Cart;
class BillingSale extends Component
{
    public $event;    
    public $patient;
    public $modalpdf=false;

    public $url;
    public $voucher,$serie,$number,$tax,$discount,$total,$contents,$observation;
    public $company_name,$company_number;
    public $serie_number,$date;
    public $pay,$change,$cash;

    

    protected $listeners = ['setPatient','patientCreate','companySearch','serviceChange'];

    public function mount()
    {
        
        $this->date=today()->toDateString();
        $this->voucher=2;
        $this->total=number_format(round(Cart::total(2),1,PHP_ROUND_HALF_DOWN),2);
    
     
    }
    public function render()
    {
        
    /*     $this->total=Cart::total(2); */
   
        return view('livewire.sale.create.billing-sale');
    }

    public function setPatient(Patient $patient)
    {
        $this->patient = $patient;
    }

    public function patientCreate(Patient $patient)
    {
        $this->patient = $patient;
    }

    public function removePatient(){
        $this->patient = null;
    }

    public function companySearch($name,$number){
        $this->company_name=$name;
        $this->company_number=$number;
    }
    public function removeCompany(){
        $this->company_name=null;
        $this->company_number=null;
    }
    public function serviceChange($total)
    {
            $t=number_format(round($total,1,PHP_ROUND_HALF_DOWN),2);
             $this->total=$t;
    }
    public function billingData(){
        if ($this->voucher==1) {
            $boleta=Billing::where('voucher','BOLETA')->count();
            $aux=str_pad($boleta+1, 6, "0", STR_PAD_LEFT);
            $this->number=$aux;
            $this->serie='B001';
            $this->serie_number=$this->serie.'-'.$this->number;
            /* $this->company_name=null;
            $this->company_number=null; */
           
        };
         if($this->voucher==0) 
         {
            $factura=Billing::where('voucher','FACTURA')->count();
            $aux=str_pad($factura+1, 6, "0", STR_PAD_LEFT);
            $this->number=$aux;
            $this->serie='F001';
            $this->serie_number=$this->serie.'-'.$this->number;
      
        }
        if($this->voucher==2){
            $this->serie_number='';
    /*         $this->company_name=null;
            $this->company_number=null; */
        }
    }

    public function updatedCash()
    {
        if ($this->cash < $this->total) {
            $this->change = 0;
        }
        if($this->cash >= $this->total){
            $this->change = ($this->cash - $this->total );
        } 
    }
    public function exact(){
        $this->cash=$this->total;
        $this->change=0;
    }

    public function saveSale()
    {   
        $rules=[
            'voucher'=>'required',
            'serie_number'=>'required',
            'date'=>'required',
 
            'total'=>'required',
            'cash'=>'required',
            'patient'=>'required',
 
        ];

        if(Cart::count()==0){
            $this->emit('success','No hay servicios en la lista');
        } 
        else {

        if($this->voucher==0){
            $rules['company_name']='required';
    
        }

        $this->validate($rules);
        if($this->company_name && $this->company_number ){

                $billing=Billing::create([
                    'client_name'=>$this->company_name,
                    'client_number'=>$this->company_number,
                    'status'=>1,
                    'voucher'=>$this->voucher,
                    'serie'=>$this->serie,
                    'number'=>$this->number,
                    'tax'=>cart::tax(2),        
                    'net'=>Cart::subtotal(2),
                    'total'=>number_format(round(Cart::total(2),1,PHP_ROUND_HALF_DOWN),2),               
                ]);

                $sale=Sale::create([
                    'contents'=>Cart::content(),
                    'observation'=>$this->observation,
                    'user_id'=>auth()->user()->id,
                    'patient_id'=>$this->patient->id,
                    'billing_id'=>$billing->id,
                ]);

                if($sale){
                    $items=Cart::content();
                    foreach($items as $item){
    
                        $service=Service::find($item->id);
                        $service->stock=$service->stock-$item->qty;
                        $service->save();
                    }
                        Cart::destroy();
                        $this->url='oe';
                 $this->emit('success','Venta realizada');
                 $this->modalpdf=true;
                }
                

            }
            else{
                $billing=Billing::create([
                    'client_name'=>$this->patient->id,
                    'client_number'=>$this->patient->number,
                    'status'=>1,
                    'voucher'=>$this->voucher,
                    'serie'=>$this->serie,
                    'number'=>$this->number,
                    'tax'=>cart::tax(2),        
                    'net'=>Cart::subtotal(2),
                    'total'=>number_format(round(Cart::total(2),1,PHP_ROUND_HALF_DOWN),2),               
                ]);

                $sale=Sale::create([
                    'contents'=>Cart::content(),
                    'observation'=>$this->observation,
                    'user_id'=>auth()->user()->id,
                    'patient_id'=>$this->patient->id,
                    'billing_id'=>$billing->id,
                ]);

                if($sale){
                    $items=Cart::content();
                    foreach($items as $item){
    
                        $service=Service::find($item->id);
                        $service->stock=$service->stock-$item->qty;
                        $service->save();
                    }
                        Cart::destroy();

                        $this->url='ptm';
                      /*   $this->url=$link; */
                        $this->emit('success','Venta realizada');
                        $this->modalpdf=true;
            }

        
        }
       

        }
    } 
    
}

