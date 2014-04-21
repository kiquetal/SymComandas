<style type="text/css">
    body
    {
	background-color: whitesmoke;
    }
    form label
    {
	display: list-item;
	margin-right: 5px;

    }
    .rem
    {
	color:red;
	cursor:pointer;
    }

    .rem_ingre
    {
	visibility: hidden;
    }
    .pointer
    {
	cursor: pointer;
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
    #in
    {
	width: 470px;
	height: 100px;
	border: 1px solid;
	display: none;
	overflow: auto;
    }

    .field .checkbox.checked i
    {
	top:-2px;   
    }
    .colored
    {
	color:red;
	cursor: pointer;
    }
    .crossout
    {   color: red;
	text-decoration: line-through;
    }

    .checkbox_list
    {
	list-style: none;
    }
</style>

<div class="container">
    <div class="row">
	<form action="<?php echo url_for("edit_subprod"); ?>" method="POST">
	    <h2>Editar SubProducto</h2>
	    <div class="row">
		<ul>
		    <li class="field">
			<label for="sub_producto_name">Nombre</label>
			<input type="text" class="normal text input" name="sub_producto_name" value="<?php echo $sub_producto; ?> ">           
		    </li>
		    <li class="field">
			<label for="sub_producto_precio">Precio</label>
			<input type="text" class="normal text input" name="sub_producto_precio" value="<?php echo $sub_producto->getPrecio(); ?>">
		    </li>

	    </div>
	    <h2>Ingredientes</h2>
	    <?php
	    foreach ($ingredientes as $k => $v) {
		?><div id="<?php echo $v->getId(); ?>"><span><?php echo $v; ?></span><i class="icon-minus-circled colored"></i><input type="checkbox" name="rem_ingre[]" class="rem_ingre" value="<?php echo $v->getId(); ?>"></div>

		<?php
	    }
	    ?>
	    <li class="checkbox_list"></li>
	    </ul>
    </div>
    <div class="row"
	 > 
	<input type="hidden" value="<?php echo $sub_producto_id ?>" name="sub_producto_id">
	<input type="hidden" value="<?php echo $producto_id ?>" name="producto_id">

	<div class="medium primary btn icon-left entypo icon-pencil" id="send"><a href="#">Enviar Datos</a></div>
	<div class="medium danger btn icon-left entypo icon-minus" id="remove"><a href="#">Remover</a></div>
	</form>
    </div>
</div>
<script>
    $(document).ready(function ()
    {
	$("#proof").click(function()
	{
	    var l=$("input.rem_ingre[type=checkbox]:checked");
	    console.log(l.parent());
             
	});
             
	$(".colored").click(function ()
	{
	    $(this).prev().toggleClass("crossout");
	    var c=$(this).next();
	    console.log(c);
	    if (!$(c).prop("checked"))
	    {
		$(c).prop("checked", true);
	    }
	    else
	    {
		console.log("desmarcar");
		$(c).prop("checked", false);
	    }
	});
             
	$("#remove").click(function ()
	{
	    console.log("eliminar");
	    var n=noty({
		text: '¿Esta seguro de querer eliminar el registro?',
		modal:true,
		template:'<div class="noty_message warning alert" style="margin-bottom:0"><span class="noty_text"></span><div class="noty_close"></div></div>',
		buttons: [
		    {
			addClass: 'pretty small success btn', 
			text: '<a class="pointer">Si</a>', 
			onClick: function($noty) {
                   
                    
			    var d="<?php echo url_for("item_remove"); ?>";
			    $.ajax({
                        
				url:d,
				data:{id:$("input[name='sub_producto_id']").val(),
				    type:"sub_producto"},
				type:'Post',
				success:function(data,staus,jXhr)
				{
				    var t="<?php echo url_for("item_deleted"); ?>";
				    window.location.href=t;
          
				    $noty.close();
				}
                        
			    });
                     
			}
		    },
		    {addClass: 'pretty small warning btn', text: '<a class="pointer">cancel</a>', onClick: function($noty) {
			    $noty.close();
			    noty({text: 'No se realizara ninguna accion', type: 'error',timeout:"300"});
			}
		    }
            
		]           
	    });
	});
           
	$("#send").click(function ()
	{
	    me=this;
	    var n=noty({
		text: '¿Desea Guardar los cambios?',
		modal:true,
		template:'<div class="noty_message warning alert" style="margin-bottom:0"><span class="noty_text"></span><div class="noty_close"></div></div>',
		buttons: [
		    {addClass: 'pretty small success btn', text: '<a class="pointer">ok</a>', onClick: function($noty) {

			    // this = button element
			    // $noty = $noty element

			    noty({text: 'You clicked "Ok" button', type: 'success',layout:'top',timeout:"300",callback:{
				    onClose:function()
				    {
					console.log(this); 

					$("form").submit();    
				    }
				}});
			    $noty.close();
         
			}
		    },
		    {addClass: 'pretty small warning btn', text: '<a class="pointer">cancel</a>', onClick: function($noty) {
			    $noty.close();
			    noty({text: 'No se realizara accion alguna.', type: 'error',timeout:"300"});
			}
		    }
		]
	    });      
	    return false;
	})
           
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
	$("body").delegate('.rem', 'click', function(){
      
     
	    $(this).parent().remove();
	});
	$(document).on('click','.label > span ',function()
	{
	});
      
  
           
    });
</script>