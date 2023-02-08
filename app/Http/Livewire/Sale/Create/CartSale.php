<?php

namespace App\Http\Livewire\Sale\Create;

use App\Models\Service;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartSale extends Component
{
    public $modal=false;
    public function render()
    {
        


        $services=Service::all();
        $services=Service::select('id','code','name','description','base_price','tax','total_price' ,'stock',DB::raw("0 as checked"))
        ->where('stock', '>',0)->get();

        foreach($services as $key => $servicio){
            $cart=Cart::content();
            $item =$cart->where('id',$servicio->id)->first();
            if($item){  
                if(!is_null(Cart::get($item->rowId))){
                                    $servicio->checked=1;                             
                                } 
            }             
            } 
        return view('livewire.sale.create.cart-sale',compact('services'));
    }

    public function serviceAdd($checked,$id)
    {
   
                $item=Service::find($id);
            
            if($checked){   
            /*   $item->checked=12; */
                Cart::add(['id' => $item->id,
                'name' =>  $item->name,
                'qty' => 1,
                'price' =>  $item->base_price,
                'weight' => 550,
                'options' => [
                    'descripcion' => $item->description,
                    'total_price' => $item->total_price,]
            ]);
                         $this->emit('success','Servicio agregado correctamente');
            }
           /*  else{

                $cart=Cart::content();
                $item =$cart->where('id',$id)->first();
                Cart::remove($item->rowId);

                $this->emit('success','Item eliminado');
            } */

            
    }
    public function deleteItem($item)
    {
         Cart::remove($item);   
         /* $this->quitar_desc(); */
         $this->emit('success','Item eliminado');
         $this->emit('serviceChange',Cart::total(2));
    }
    public function closeModal(){
        $this->modal=false;
        $this->emit('serviceChange',Cart::total(2));
    }
}
