<script src="/js/jquery.validate.js" type="text/javascript"></script>
<link rel="stylesheet" href="/js/libs/style.css">
<style type="text/css">

    div.container_validate{

	border: 1px solid red;
	margin: 5px;
	padding: 5px;
    }
    div.container_validate ol li {
	list-style-type: disc;
	margin-left: 20px;
    }
    div.container_validate{ display: none }
    .container_validate label.error {
	display: inline;
    }

    .switch.ios
    {
        max-width: 260px;
    }
    body
    {
	background-color: whitesmoke;
    }
    .rem
    {
	color:red;
	cursor:pointer;
    }
    .colr
    {
	color: black;
    }
    #in
    {
	width: 470px;
	height: 100px;
	border: 1px solid;
	display: none;
	overflow: auto;
    }
    #in p
    {
	margin-bottom: 4px;
	margin-top: 2px;
    }
    form label
    {
	display: inline;
	margin-right: 5px;


    }
    .margin-left
    {
	margin-left: 10px;
    }
    .underline
    {
	text-decoration: underline;
	font-weight: bold;
    }
    li.field > span.under
    {
	display:block;
    }
    label.checkbox > span 
    {
	margin-right: 5px;
	cursor:pointer;
    }
    .picker select
    {
	cursor:pointer;
    }

</style>
<div class="container">
    <div class="row">
	<div class="container_validate">
	    <h4>Existen algunos errores, por favor ingrese los datos correctos.</h4>
	    <ol>
		<li><label for="email" class="error">Please kiquetal your email address</label></li>
		<li><label for="phone" class="error">Please enter your phone <b>number</b> (between 2 and 8 characters)</label></li>
		<li><label for="address" class="error">Please enter your address (at least 3 characters)</label></li>
		<li><label for="avatar" class="error">Please select an image (png, jpg, jpeg, gif)</label></li>
		<li><label for="cv" class="error">Please select a document (doc, docx, txt, pdf)</label></li>
	    </ol>
	</div>

	<h2>Agregue nuevo sub-producto</h2>
	<div class="row">
	    <form action="<?php echo url_for("add_sub_product"); ?>" method="POST" data-form="validate" id="form1">
		<ul>

		    <?php
		    foreach ($form as $k => $sform) {
			?>

			<?php
			if ($k == '_csrf_token' || $k == 'id') {
			    
			} else {
			    echo ' <li class="field">';
			    echo $sform->Render();
			}
		    }
		    ?>

		    <li class="checkbox_list">


		    </li>



		    <li class="field">
			<label class="inline" for="text1">Precio</label>
			<input class="wide text input" type="text" placeholder="Ingrese precio" name="precio">
		    </li>


<?php echo $form->renderHiddenFields() ?>
		    <div class="large btn default">
			<input type="submit" id="bt1" value="Save">
		    </div>
		    </div>
		    </div>
		    </div>


		    <script type="text/javascript">
			$(document).ready(function ()
			{


			    $("form select").wrap("<div class='picker'>");
			    $("div.picker").parent().prepend("<span class='under'>Seleccione Producto</span>");
			    console.log($("#sub_producto_producto_id option:selected").val());
			    var prod_id=$("#sub_producto_producto_id option:selected").val();
     
			    $("#sub_producto_producto_id").trigger("change");
     
			    $("#sub_producto_name").parent().prepend("<label class='inline'>Nombre</label>");
			    $("#sub_producto_name").addClass("wide text input");
			    $("label.checkbox").next().remove();
			    $(".checkbox_list").before("<span><b><u>Ingredientes</u></b></span>")
			    $(".checkbox_list").after("<span class='field' ><a href='#' id='ingr_new'>Agregar ingrediente nuevo</a>");
       
			    var ing="<label>Nombre:</label><input type='text' name='new_ingredientes[]' class='normal text input'></input>";
			    var el="<div id='in'>"+ing +"</div>";
			    $("#ingr_new").after(el);
			    $("#in").append("<span id='add_more' style='color:green;cursor:pointer;'><i class='icon-plus-circled'></i></span>");
			    $("#ingr_new").click(function ()
			    {
    
				$("#ingr_new").addClass("colr");
				$("#in").slideToggle('slow');
				/*        $("#in").fadeIn(1000, function ()
{
});

				 */

				return false;
    
    
			    });
			    $("#add_more").click(function ()
			    {
				$("#in").append("<p>"+ing+"<span class='rem'><i class='icon-minus-circled'></i></span></p>");
    
			    });
     
     
			    $("#btn").click(function ()
			    {
				console.log($.each($('div.specific :checkbox:not(:disabled):checked'),function(i,d,m)
				{
				    console.log(d);
				}));
      
			    });

			    $("#aggr_estado").click(function ()
			    {
				/*
var s="<input type='checkbox' id='aaa'>";
$("aaa").iphoneStyle({  checkedLabel: 'Cancelado',uncheckedLabel: 'Pendiente'});
console.log(s);
$(".specific").append("<input type='checkbox'>")
				 */
  
				setInterval(function() {
				    // Do something every 2 seconds
				    $("<input type='checkbox' id='aaa'>")
				    .appendTo(".specific")
				    .iphoneStyle({  checkedLabel: 'Cancelado',uncheckedLabel: 'Pendiente'});;
  
				}, 5000);
  
  
			    });
			    $("body").delegate('.rem', 'click', function(){
      
     
				$(this).parent().remove();
			    });
			    $(document).on('click','.label > span ',function()
			    {
			    });
      
    
    
			});
			$("#add_more").click(function ()
			{
			    $("#in").append("<p>"+ing+"<span class='rem'><i class='icon-minus-circled'></i></span></p>");
    
			});



 
			$("#sub_producto_producto_id").change(function ()
			{
			    var d="<?php echo url_for("crud/getIngr"); ?>";
			    console.log(d);
			    var v=$(this).val();
			    $.ajax({
				url:d,
				data:{product_id:v},
				type:'Post',
				success:function(res,es)
				{
				    $(".checkbox_list").empty(); 
				    var d=$.parseJSON(res);
				    $.each(d, function() {
					$.each(this, function(name, val) {
					    console.log(val);
					    var elm='<li class="field"><label for="sub_producto_ingredientes_id_'+val.id +'"class="checkbox" ><input type="checkbox" id="sub_producto_ingredientes_id_'+val.id +'" value="'+val.id+'" name="sub_producto[ingredientes_id][]"><span></span>'+val.name+'</label></li>';
					    console.log(elm);
					    $(".checkbox_list").append(elm);
            
            
            
					});
				    });
  

				    Gumby.initialize('checkboxes');
				}
    
			    });


			    $("ul.checkbox_list > li").fadeOut(200,function(){}).delay();
 
			});
  
 
 
			$("#form1").submit(function ()
			{
	 
			    var container = $('div.container_validate');
	
			    var es=$("#form1");
			    es.validate({
				errorContainer: container,
				errorLabelContainer: $("ol", container),
				rules:
				    {
				    "precio":{
					required:true,
					number:true
				    }
				    ,
				    "sub_producto[name]":
					{
					required:true
				    }
				},
				messages: {
				    "precio": 
					{
					required:"Debe ingresar el precio del subproducto.",
					number:"Debe ingresar valores numericos."
				    },
				    "sub_producto[name]":
					{
					required:"Debe ingresar el nombre del sub producto."
				    }
				},
				wrapper: 'li'
                    
			    });
	
	
			    return es.valid();
			    //   return es.valid();
			});
 
      
		    </script>

