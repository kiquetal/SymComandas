<head>

    <link href="/css/flexnav.css" media="screen, projection" rel="stylesheet" type="text/css">


    <style type="text/css">  
        li
        {
            float: left;

        }
	.small.item-with-ul {
	    width: 150px;
	}
	.item-with-ul.another {
	    width: 210px;
	}

        .flexnav
        {
            background-color: #00ACED;
        }
        .item-with-ul
        {
            background-color: #00ACED;
        }

        .flexnav li a
        {
            background-color: #00ACED;
            color: white;

        }
        .flexnav li {
	    background-color: #003580;
        }
        .flexnav li ul li a:hover
        {
	    background: none repeat scroll 0 0 #000066;
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
	    <img src="/images/logo.png" id="imag1" width="120px" height="70px" />
	</div>

	<div class="menu-button">Menu</div>
	<nav>
	    <div class="row">
		<ul data-breakpoint="650" class="flexnav">
		    <li class="small"><a href="">Productos</a>
			<ul>
			    <li class="medium metro rounded"><a href="<?php echo url_for("list_productss"); ?>">Listado de Productos</a></li>
			    <li><a href="<?php echo url_for("add_product"); ?>">Agregar Producto</a>

			    </li>
			</ul>
		    </li>
		    <li><a href="">Ingredientes</a>
			<ul>

			    <li><a href="<?php echo url_for("ingrem_lista"); ?>">Listado de Ingredientes</a></li>
			    <li><a href="<?php echo url_for("ingre_add"); ?>">Agregar Ingredientes</a>
			    </li>
		    </li>
		</ul>
		</li>
		<li><a href="">Sub Producto</a>
		    <ul>
			<li><a href="<?php echo url_for("list_subprod"); ?>">Listado de Sub Productos</a></li>
			<li><a href="<?php echo url_for("add_sub_product"); ?>">Agregar SubProducto </a></li>
		    </ul>
		</li>
		<li><a href="">Facturas</a>
		    <ul>
			<li><a href="<?php echo url_for("list_facturas"); ?>">Ver facturas</a></li>

		    </ul>
		</li>
		<li class="another"><a href="">Monitorear estado</a>
		    <ul>
			<li><a href="<?php echo url_for("list_pedidos"); ?>">Pedidos pendientes de entrega</a></li>
			<li><a href="<?php echo url_for("list_pagados") ?>">Pedidos pendientes de pago</a></li>
			<li><a href="<?php echo url_for("view_stats") ?>">Estadistica</a></li>
		    </ul>
		</li>

		</ul>
        </nav>




    </div>
    <div class="row">
	<div class="eight columns">  
	    <h3>Comandas Droid, <br>un nuevo mundo <br>de facilidades para las
		ordenes enviadas por<br> un dispositivo móvil.</h3>
	</div>
	<div class="one column">
	    <p>Bienvenido Admin</p>
	    <p>
		<?php
		$dt = new DateTime();
		$dt->setTimestamp(time());
		echo $dt->format(DateTime::RFC3339);
		?> 
	    </p>
	</div>
    </div>

</div>
</div>

<script src="js/jquery.flexnav.js" type="text/javascript"></script>
<script>
    $(document).ready(function ()
    {
         
	 
		     
	 
	 
	 
	$(".flexnav").flexNav();
	$("#a").flexNav();
    });
      
      
</script>