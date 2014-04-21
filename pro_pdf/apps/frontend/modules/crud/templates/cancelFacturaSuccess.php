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
	<table width="100%" style="border: 0.1mm solid #888888;"><tr>
	<td>EMPRESA</td>
	</tr></table>
	</htmlpageheader>
	
	<htmlpagefooter name="myfooter">
	<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
	Pág {PAGENO} of {nb}
	</div>
	</htmlpagefooter>
	
	<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
	<sethtmlpagefooter name="myfooter" value="on" />
	mpdf-->


        <div class="content">
            <div class="row">
                <span class="medium oval btn default"> <a href="/">Menu Principal</a>
		</span>
		<span class="medium oval btn default"> <a href="<?php echo url_for("list_pagados"); ?>">Lista</a>
		</span>

            </div><br>
	    <div class="row">
		<div class="success label" style="height: auto;width: 100%">
		    <h2>Factura Cancelada Exitosamente </h2>
		    <div class="factura" style="text-align: left">
			<div class="row" style="text-align: center">
                            Pedido id:</u><?php echo $sf_user->getAttribute('pedido_id'); ?><br>
                            Factura Nº:</u><?php echo $sf_user->getAttribute("factura_id"); ?><?php echo $factura_id; ?><br><br>
                            Nombre:<?php echo $nombre; ?><br>
                            Monto:<?php echo $monto; ?>
			</div>
		    </div>
                    <ul>
			<li>

			</li>

                    </ul>

                </div>


	    </div>
        </div>



    </body>
</html>
