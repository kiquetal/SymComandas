<head>
    <style type="text/css">
        
        li
        {
            float: left;
        
        }
       .btn.twitter
        {
     background: none repeat scroll 0 0 #00ACED;
    border: 1px solid #00ACED;
        }
        .btn.twitter:hover
        {
     background: none repeat scroll 0 0 #003399;
    border: 1px solid #003399;
        }
    </style>
</head>
<div class="wrapper">
            
            <div class="row">
                <div class="image rounded">
                    <img src="/images/logo.png" width="120px" height="70px" />
                </div>
            
        <div class="row">
            <div class="eight columns">  
        <h3>Comandas Droid, <br>un nuevo mundo <br>de facilidades para las
        ordenes enviadas por<br> un dispositivo móvil.</h3>
            </div>
            <div class="one column">
                <p>Bienvenido Visitante</p>
                <p>
                 <?php 
                          $dt=new DateTime();
                         $dt->setTimestamp(time());
                         echo $dt->format(DateTime::RFC3339);
             ?> 
                </p>
            </div>
        </div>
      <div class="row centered valign">
                <span class="medium metro rounded twitter btn"><a href="<?php echo url_for("add_product");?>">Agregar Producto</a></span>
                <span class="medium metro rounded twitter btn">   <a href="<?php echo url_for("add_sub_product");?>">Agregar Sub Producto</a></span>
                <span class="medium metro rounded twitter btn"><a href="<?php echo url_for("list_pedidos");?>">Monitorear Estado </a> </span>
                <span class="medium metro rounded twitter btn"> Generar Reporte </span>
                <span class="medium metro rounded twitter btn"><a href="<?php echo url_for("ingre_list"); ?>">Listar Ingredientes</a></span>
         </div>
            
            </div>
    </div>
    