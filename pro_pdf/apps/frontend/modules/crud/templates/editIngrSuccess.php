<style type="text/css">
    body
    {
	background-color: whitesmoke;
    }
    form label
    {
	display: inline;
	margin-right: 5px;

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
    .field .checkbox.checked i
    {
	top:-2px;   
    }

</style>

<div class="container">
    <div class="row">
	<form action="<?php echo url_for("edit_ingre") ?>" method="POST" id="form1">
	    <h2>Editar Ingrediente</h2>
	    <div class="row">
		<?php
		echo '<input type="hidden" value="' . $ingrediente->getId() . '" name="id"/>';

		echo '<ul>';

		//echo '<input type="text" disabled="disabled" value="'.$ingrediente->getId().'"></input><br>';
		echo '<li class="field"><label class="inline" for="Name">Nombre: </label><input type="text" name="ingrediente[nombre]" class="wide text input" value="' . $ingrediente . '"></li>';
		$ar = explode(',', $id);
		$n = 0;
		$ke = array();
		$nke = array();
		foreach ($produt as $p) {
		    if (in_array($p->getId(), $ar)) {
			$k = array();
			$k['id'] = $p->getId();
			$k['name'] = $p->getName();
			$ke[] = $k;
		    } else {
			$nk = array();
			$nk['id'] = $p->getId();
			$nk['name'] = $p->getName();
			$nke[] = $nk;
		    }
		}
		echo 'Productos Asociados<br>';
		foreach ($ke as $k => $v) {
		    echo '<span class="field"><label class="checkbox checked"><input type="checkbox"  name="owner_prod_id[]" value="' . $v['id'] . '"/><span></span>' . $v['name'] . '</span>';
		}

		echo '<br>Productos no asociados<br>';
		foreach ($nke as $ke => $v) {
		    echo '<span class="field"><label class="checkbox"><input type="checkbox" name="owner_prod_id[]" value="' . $v['id'] . '"/><span></span>' . $v['name'] . '</label></span>';
		}

		echo'</ul><br><br><div class="seven columns">';
		echo '<div class="row">';
		echo '<div class="four columns">';
		echo '<div class="medium primary btn icon-left entypo icon-pencil" id="send"> <a href="#">Enviar Datos</a></div>
                                    </div><div>
                                    <div class="medium danger btn icon-left entypo icon-minus" id="remove" ><a href="#">Remover</a>
                                    </div></div></div>';
		echo'</div><br><span>';
		echo '<div class="pill-left">' . link_to('Volver a la Lista.', 'ingre_list') . '</div>';
		echo '</span>';
		?>                        
	    </div>
	</form>
    </div>
</div>
<script>
    $(document).ready(function ()
    {
             
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
				data:{id:$("input[name='id']").val(),
				    type:"ingredientes"},
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
			    noty({text: 'You clicked "Cancel" button', type: 'error',timeout:"300"});
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

					$("#form1").submit();    
				    }
				}});
			    $noty.close();
         
			}
		    },
		    {addClass: 'pretty small warning btn', text: '<a class="pointer">cancel</a>', onClick: function($noty) {
			    $noty.close();
			    noty({text: 'You clicked "Cancel" button', type: 'error',timeout:"300"});
			}
		    }
		]
	    });      
	    return false;
	})
           
    });
</script>