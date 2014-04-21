<!doctype html>
<html>
    <head>
	<title>Comandas-Web <?php echo get_slot("foo", "default value if slot doesn't exist"); ?> </title>  

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.8.3.min.js"><\/script>')</script>
   <script src="/js/libs/modernizr-2.6.2.min.js"></script>

<script src="/js/libs/gumby.min.js"></script>
<script src="/js/main.js"></script>
	      <link rel="stylesheet" href="/css/gumby.css">
	    <style type="text/css">
		h1,span,h3
		{
		  color:#F4F4F4;
		}
		body {
    background-image: url("/images/back_repeat.png");
}
	 #table	table {
    background-color: #aaa;
    margin-left: 600px;
}
th{
    text-align: center;
} #table thead
{
    text-align: center;
    
}
#table tbody {
    background-color: #ddd;
    height: 250px;
    overflow: auto;
}
#table2 tbody {
    background-color: #ddd;
    height: 250px;
    overflow: auto;

}
td {
    padding: 3px 10px;
}

thead > tr, tbody{
    display:block;}
		
		#table
		{
		    display: inline;
		    height: 400px;
		    overflow-y: auto;
		    margin-left: 145px;
		}
		
		#container
		{
		    float: left;
		    height: 220px;
		}
		#pie
		{
float:left;
		}
		#table2
		{
		 float: left;
		}
	    </style>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.8.3.min.js"><\/script>')</script>
   
		<script type="text/javascript">
		   
		   
		   <?php $data= json_encode($sf_data->getRaw('matrix')); 
		   
		   ?>
		       $(document).ready(function ()
		       {
			   $(document).on("click","#dt2",function(e)
		       {
			   var attr=e.target.attributes;
			  var pedido=attr[0].nodeValue;
			  var d="<?php echo url_for("modal_view");?>";

      $.ajax({
                    url:d,
                    data:{pedido_id:pedido},
                    type:'Post',
                    success:function(data,staus,jXhr)
                    {
                       $("#table3").append(data);
                             $("#modal2").addClass("modal active") 
                             $(document).keydown(function(e) {
                                    // ESCAPE key pressed
                                if (e.keyCode == 27) {
                                    $("#modal2").remove()
                                }
                            });
                             
                             $(".switch").click(function()
                             {
                                $("#modal2").remove();
                             });
                    }

			  
		       });
			 });  
			   $(document).on("click","#dt1",function(e)
		       {
			  console.log(e.target.attributes);
			  var attr=e.target.attributes;
			  var pedido=attr[0].nodeValue;

console.log(pedido);
console.log("creado")

var d="<?php echo url_for("modal_view");?>";

      $.ajax({
                    url:d,
                    data:{pedido_id:pedido},
                    type:'Post',
                    success:function(data,staus,jXhr)
                    {
                        console.log(data);
                        $("#algo").append(data);
                             $("#modal2").addClass("modal active") 
                             $(document).keydown(function(e) {
                                    // ESCAPE key pressed
                                if (e.keyCode == 27) {
                                    $("#modal2").remove()
                                }
                            });
                             
                             $(".switch").click(function()
                             {
                                $("#modal2").remove();
                             });
                    }
              });
;		       });
		       
			var datos= (JSON.stringify(<?php echo $data;?>));
		      var category=[];
		      var pedidos=[];
		       for (var k in datos)
			   {
			       var ob=datos[k];
			       category.push(ob.mes_anho);
			       pedidos[ob.mes_anho]=ob.conta;
 			   }

		       });
		       
$(function () {
    
    $('#draw').click(function()
{
    console.log($('select[name="month"]').val());
    var month=parseInt($('select[name="month"]').val());
    
			   $.ajax({
			       url:"<?php echo url_for('graph_month');?>"
,			       data:{month:month},
			    success:function(d,e,o)
			    {
				var serie=[];
				for (var i in d)
				    {
					var ob=d[i];
					var dato={};
					   dato.name=ob.prod_name + " "+ob.sub_prod_name;
					   
					   dato.y=parseInt(ob.cantidad);
					   dato.sub_producto_id=ob.sub_producto_id;
					   serie.push(dato);
					
				    }

var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'pie',
            type:'pie',
	    height:500,
	    width:500
        },


	    title:{text:"Cant de productos pedidos"},
        tooltip:
	    
        {
            headerFormat:"<b>{point.key}</b>",
            pointFormat:"<br>Se pidieron {point.y},veces el producto en el mes.",
            useHtml:true
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Math.round(this.percentage*100)/100 + ' %';
                    },
                    distance: -40,
                    color:'white'
                }
            },
            pie:
            {
                dataLabels:
                {
                    enabled:false
                },
            showInLegend:true
             }
        },
        
        series: [{
            name:"Productos",
            data: serie,
	     point:
			 {
			 events:{
			     click: function(e)
			     {
				 console.log(e.point);
				 var month=$("select[name=\"month\"]").val();
				 var url="<?php echo url_for("count_prod_month");?>"
;				 $.ajax({
				     url:url,
				     type:"POST",
				     data:{"month":month,
				           "sub_prod_id":e.point.options.sub_producto_id},
				    success:function(e,t,o)
				    {
					console.log(e);
					$("#table2").html(e);
				    }
				 })
				 
			     }
			 }
			 }
        }]
    });




;			    }
			   });
    
    
});
    
    			var datos= <?php echo $data;?>;
			var category=[];
		      var pedidos=[];
		      console.log(datos);
		       for (var k in datos)
			   {
			       var ob=datos[k];
			       category.push(ob.mes_anho);
			       pedidos.push(parseInt(ob.conta));
 			   }
			   console.log(category);
			   console.log(pedidos);

//var chart_pie=new Highcharts.Chart({});

var char_bar=new Highcharts.Chart({
            chart: {
                type: 'column',
		height:220,
		width:500,
		renderTo:"container"
            },
            title: {
                text: 'Cantidad de pedidos por Mes'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: category
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pedidos '
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0"></td>' +
                    '<td style="padding:0"><b>{point.y} pedidos.</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
		    name:"Pedidos registrados por mes",
		    data:pedidos,
		    point:
			 {
			 events:{
			     click: function(e)
			     {
				 
		$.ajax({
		     url:"<?php echo url_for("retrieve_pedidos_month");?>",
		    data:{month:e.point.category}	,
		    success:function(e,x,d)
		    {
		          
		$("#table").html(e);
              
	}
		});
				 
			     }
			 }
			 }
	    }]
        });
    });
    

		</script>
	</head>
	<body>
	    <div class="row centered">
		<h3>Comandas</h3>
  <p><a href="/">Comandas demo</a></p>
		<h1>Resumen de los pedidos</h1>
	    </div>
	    <div class="row centered">
	    <div id="algo"></div>
<script src="/js/highcharts.js"></script>


<div id="container" style="min-width: 310px; height: 220px; margin: 0 auto"></div>
<div id="table" style="max-height: 250px;"><table style="width: 400px">
	<?php $pedi=$sf_data->getRaw('pedidos');?>
	
	<thead><th>ID</th><th>Fecha de pedido</th><th>Pedidos:<?php echo  count($pedi);?> </th><th>Mes 08</th></thead>
	<tbody>
	    
	 <?php foreach ($pedi as $k=>$v):?>
	    
	    <tr>
		<td>
		    <?php echo $v['id'] ;?>
		</td><td> <?php echo $v['fec_reg'];?></td>
		<td><a id="dt1" style="cursor:pointer;" prod="<?php echo $v['id'];?>"> Ver mas detalle</a></td>
		
	    </tr>
	    
	    <?php endforeach;?>
	</tbody>
    </table></div>
<div style="height: 85px"></div>
	<div style="clear:both;">
	<div>
	    <span>Seleccione Un mes, para obtener los productos vendidos en el mes.</span>
	    <select name="month">
		<option value="0">Enero</option>
		<option value="1">Febrero</option>
		<option value="2">Marzo</option>
		<option value="3">Abril</option>
		<option value="4">Mayo</option>
		<option value="5">Junio</option>
		<option value="6">Julio</option>
		<option value="7">Agosto</option>
		<option value="8">Setiembre</option>
		<option value="9">Octubre</option>
		<option value="10">Noviembre</option>
		<option value="11">Diciembre</option>
	    </select>
<input type="button" value="Dibujar" id="draw">
<div>
<div id="pie"></div>
<div id="table2"><table style="width: 470px;"><tr><td>Los datos tabulados.</td></tr></table></div>
	</div>
	</div>
	</div>	
	    </div>
	    <div id="table3">
		adas
		
	    </div>
</html>
