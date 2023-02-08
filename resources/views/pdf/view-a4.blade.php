
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FACTURA A4</title>
    <style>
                         *{
                   margin: 0;
                   box-sizing: border-box;

                 }

                 #invoiceholder{
                   width:100%;
                   height:100% ;
                 }

                 #invoice{

                   background: #FFF;
                   padding: 15px;
                 }

                 #invoice-top{min-height: 120px;}
                 #invoice-mid{min-height: 120px;}

                 .logo{
                   float: left;
                   height: 60px;
                   width: 60px;
                   background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
                   background-size: 60px 60px;
                 }
                 .info2{
                   display: flex;
                   float:left;
                   margin-left: 20px;
                 }
                 .title{
                   float: right;
                   border-style: solid ;
                 }
                 .title2{
                     margin: 30px;
                 }
                 table{
                   border-collapse: collapse;
                   border-spacing: 0;
                   width: 100%;
                 }
                 .tableitems{
                   text-align: center;
                 }
                 th{
                   border-top: 1px solid rgb(0, 0, 0); 
                   border-bottom: 1px solid rgb(0, 0, 0);
                   background: rgb(245, 244, 244)
                 }
                 .fila{
                   border-bottom: 1px solid rgb(0, 0, 0);
                 } 
                 .itemtext{font-size: .9em;
                     font-family:Arial, Helvetica, sans-serif;
                 }
                 .itemtext2{font-size: .7em;
                             font-family:Arial, Helvetica, sans-serif;
                             line-height:20px;
                 }
                 .itemtext3{font-size: .9em;
                             font-family:Arial, Helvetica, sans-serif;
                             font-weight: bolder;
                 }
                 #legalcopy{
                   font-family:Arial, Helvetica, sans-serif;
                   margin-top: 15px;
                 }
                 .legal{
                   width:70%;
                 }
    </style>
</head>
<body>
   <div id="invoiceholder">
       <div id="invoice" >
         <div id="invoice-top">
           <div class="logo"></div>
           <div class="info2">
             <h2>Centro Medico San Jose E.R.L</h2>
             <H2> RUC: 12345678910</H2>
             <H6>JR: Lima #123 </H6>
             <H6>Puno-Puno-Puno </H6>
           </div>
           <div class="title">
               <div class="title2">
               <center>
             <h4>{{$sale->billing->voucher}} ELECTRONICA</h4>
             <h3>{{$sale->billing->serie}}-{{$sale->billing->number}}   </h3></center>
            </div>
           </div>
         </div>
         <div id="invoice-mid">
           <div class="info">
             <p  class="itemtext2">FECHA DE EMICION<span style="margin-left: 50px">: </span> {{$sale->created_at->isoFormat('L')}}  </p>
             <p  class="itemtext2">FECHA DE VENCIMIENTO<span style="margin-left: 20px">: </span> {{$sale->created_at->addDay(5)->isoFormat('L')}} </p>
             <p  class="itemtext2">CLIENTE<span style="margin-left: 110px">: </span> {{$sale->billing->client_name}}  </p>
             <p  class="itemtext2">DOCUMENTO<span style="margin-left: 84px">: </span> {{$sale->billing->client_number}}  </p>
             <p  class="itemtext2">DIRECCIÓN<span style="margin-left: 94px">: </span> Jr: Loas angeles $133 </p>
           </div>
         </div>
         <div>
                <div id="table">
                    <table>
                    <tr class="tableitems" >
                        <th ><p class="itemtext3">UNIDAD</p></th>
                        <th ><p class="itemtext3">DESCRIPCION</p></th>
                        <th ><p class="itemtext3">P.UNIT</p></th>
                        <th ><p class="itemtext3">CANTIDAD</p></th>
                        <th ><p class="itemtext3">TOTAL</p></th>
                    </tr>
                    @foreach ($items as $item)
                    <tr class="tableitems">
                        <td class="fila" ><p class="itemtext">Uni</p></td>
                        <td class="fila" ><p class="itemtext">{{$item->name}} - {{$item->options->descripcion}}</p></td>
                        <td class="fila" ><p class="itemtext">{{$item->price}}</p></td>
                        <td class="fila" ><p class="itemtext">{{$item->qty}}</p></td>
                        <td class="fila" ><p class="itemtext">{{$item->price *$item->qty}}</p></td>
                    </tr>  
                    @endforeach
                        
                    <tr  >
                        <td></td>
                        <td style="text-align:right;"   colspan="2"><p class="itemtext3">OP. GRAVADAS: S/.</p></td>
                        <td></td>
                        <td style="text-align:center;"><p class="itemtext3">{{$sale->billing->net}}</p></td>
                    </tr> 
                    <tr  >
                        <td></td>
                        <td style="text-align:right;"  colspan="2" ><p class="itemtext3">IGV: S/.</p></td>
                        <td></td>
                        <td style="text-align:center;" ><p class="itemtext3">{{$sale->billing->tax}}</p></td>
                    </tr>
                    <tr  >
                        <td></td>
                        <td colspan="2" style="text-align:right;" ><p class="itemtext3">TOTAL A PAGAR: S/.</p></td>
                        <td></td>
                        <td style="text-align:center;"><p class="itemtext3">{{$sale->billing->total}}</p></td>
                    </tr> 
                    </table>
                </div>
                <div> 
                <div id="legalcopy">
                    <h5 class="legal">Son:<strong> CINCUENTA Y UN CON 00/100 SOLES</strong>
                    </h5>
                </div>
        
                        </div>
                        <div style="margin-top: 200px" >
                            <p><strong> Condicion de Pago: </strong> Contado</p>
                            <P><strong>*Pagos: </strong> EFECTIVO - S/. 120.00</P>
                        </div>
                        <div style="margin-top: 50px;border:solid 1px rgb(0, 0, 0)" >
                        <div style="margin: 5px;margin-bottom:50px">
                        <p><strong>BSERVACIONES :</strong>  Gracias Por su preferencia </p>
                        </div>
                    </div>
           
         </div>
       </div>
     </div>
</body>
</html>