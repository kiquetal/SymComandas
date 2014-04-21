<html>
<head>
<style>
body {font-family: sans-serif;
    font-size: 10pt;

}
p {    margin: 0pt;
}
td { vertical-align: top; }
.items td {
    border-left: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
}
table tbody td{
    text-align: right;
}

table thead td { background-color: #EEEEEE;
    text-align: center;
    border: 0.1mm solid #000000;
}
.items td.blanktotal {
    background-color: #FFFFFF;
    border: 0mm none #000000;
    border-top: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
}
.items td.totals {
    text-align: right;
    border: 0.1mm solid #000000;
}
.left
{
    text-align: left;
}

tr .ma {
    text-align: left;
}
.va
{
    border-color: #000000;
    border-width: medium;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<table width="100%" style="border: 0.1mm solid #888888;background-color:black;"><tr>
<td style="color:white;text-align:center;">FACTURA</td>
</tr>
</table>
<table>
<tr>
<td style="width:50%;"><table><tr><td></td></tr></td>
</tr>
</table>
</td><td></td></tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Pág {PAGENO} de {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->


<table width="100%" style="font-family: serif;" cellpadding="10">
<tr>
    <td style="width: 50%"><table><tr><td style="text-align: left;width: 10%;background-color: #EEEEEE;border-right: 0.1mm solid #000000;"><u>Nombre:</u></td><td style="width: 80%;text-align: left;border-bottom:  0.1mm solid #000000;border-top:  0.1mm solid #000000;border-right:  0.1mm solid #000000"><?php echo $sf_user->getAttribute('nombre');?></td></tr>

<tr><td style="text-align: left;width: 10%;background-color: #EEEEEE;border-right: 0.1mm solid #000000;"><u>Ruc:</u></td><td style="width: 80%;text-align: left;border-bottom:  0.1mm solid #000000;border-top:  0.1mm solid #000000;border-right:  0.1mm solid #000000"><?php echo $sf_user->getAttribute('ruc');?></td></tr>
</table></td><td>
      <table  style="border-collapse: collapse;width: 100%">
          <tr><td style="text-align: left;width: 10%;background-color: #EEEEEE;border-right: 0.1mm solid #000000;"><u>Pedido id:</u></td><td style="width: 80%;text-align: left;border-bottom:  0.1mm solid #000000;border-top:  0.1mm solid #000000;border-right:  0.1mm solid #000000"><?php echo $sf_user->getAttribute('pedido_id');?></td></tr>
      <tr><td style="text-align: left;width: 10%;background-color: #EEEEEE;border-right: 0.1mm solid #000000; "><u>Factura Nº:</u></td><td style="width: 80%;text-align: left;border-bottom:  0.1mm solid #000000;border-right:  0.1mm solid #000000"><?php echo $sf_user->getAttribute("factura_id");?></td></tr>
    <?php  
    
      
    $d=new \DateTime();
    $date=$d->format(DateTime::W3C);
    if ($sf_user->hasAttribute("ts"))
    {
       $date=$sf_user->getAttribute("ts");   
    };
    ?>
      <tr><td style="text-align: left;width: 21%;background-color: #EEEEEE;border-right: 0.1mm solid #000000;border-bottom:  0.1mm solid #000000;">
      <u>Fecha:</u></td><td style="text-align: left;border-bottom:  0.1mm solid #000000;border-right:  0.1mm solid #000000"><?php echo $date;  ?>    
       </td> </tr>
        </table></td>
    </div>

</tr>
</table>
<hr>

<table class="items" width="100%"  style="font-size: 9pt; border-collapse: collapse;" cellpadding="8">
<thead>
<tr>
<td width="10%">Cantidad</td>
<td width="45%">Descripcion</td>
<td width="15%">Precio Uni.</td>
<td width="15%">Total</td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->

<?php 
$datos=$sf_user->getAttribute("pedidos_detalle");
$subtotal=0;
foreach($datos as $k=>$v)
{

?>
<tr class="ma">
<td align="center"><?php echo $v['cant'];?></td>
<td class="ma"><?php echo $v['descripcion'];?></td>
<td align="right">Gs. <?php echo $v['precio_unitario'];?></td>
<td align="right">Gs. <?php echo $v['precio_total'];?></td>
</tr>


<?php
$subtotal=sprintf('%0.2f', ($subtotal+ $v['precio_total']));
}
?>
<!-- END ITEMS HERE -->
<tr style="text-align: left">
<td class="blanktotal" colspan="2" rowspan="6"></td>
<td class="totals">Subtotal:</td>
<td class="totals">Gs.<?php echo number_format($subtotal,2,',','.');?></td>
</tr>
<tr>
<td class="totals">I.V.A(10%):</td>
<td class="totals">Gs.<?php echo number_format(($subtotal/100)*10,2,',','.');?></td>
</tr>
<tr>
<td class="totals"><b>TOTAL:</b></td>
<td class="totals"><b>Gs.<?php echo  number_format(($subtotal/100)*10 + $subtotal,2,',','.');?></b></td>
</tr>
</tbody>
</table>

</body>
</html>
