<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePdf extends Controller
{
    public function pdfA4(Sale $sale)
    {
 
    /*  $qr='1098456123|'.$sale->comprobante_type.'|'.$sale->comprobante_serie.'|'.$sale->comprobante_num.'|'.$sale->impuesto.'|'.$sale->total.'|'.$fecha; */
 
    $items= json_decode($sale->contents);


     $pdf = Pdf::loadView('pdf.view-a4' , ['sale'=>$sale,'items'=>$items/* ,'qr'=>$qr */]);
     return $pdf->stream();   

  

    }
    public function pdfTicket(Sale $sale)
    {

      /*   $qr='1098456123|'.$sale->comprobante_type.'|'.$sale->comprobante_serie.'|'.$sale->comprobante_num.'|'.$sale->impuesto.'|'.$sale->total.'|'.$fecha; */
    
      $items= json_decode($sale->contents);

        $pdf = Pdf::setPaper( [0, 0,280,1000])->loadView('pdf.view-ticket', ['sale'=>$sale,'items'=>$items,/* 'qr'=>$qr */]);
       return $pdf->stream();  
       /*     $items=json_decode($sale->contenido);
           return view('proof.proof-pdf-ticket',compact('sale','items','qr') );*/
       }
}
