<script src="/js/jquery.validate.js" type="text/javascript"></script>

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
    
    #factura
    {
        background-color: gray;
        padding: 10px 10px 10px 10px;
        height: auto;
        
    }
    
        #factura table thead tr td
    {
        color: black;
        
    }
    </style>
<form name="f1" method="POST" action="<?php echo url_for("prepare_factura");?>" id="form1">
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

            <ul>

                <li class="field">
                    <label for="Nombre">Nombre</label>
                    <input type="text" id="nombre" class="normal text input" name="nombre"/></li>
                <li class="field">
                    <label for="RUC/CI"  name="ruc">RUC/C.I</label>
                    <input type="text"  id="ruc" name="ruc" class="normal text input"/></li>

                  <?php
                  $c='';
                  if ($pedido_id)
                  {
                      $c="disabled";
                  }
                  
                  ?>
                    
                <li class="field"><label for="Pedido">Pedido Id</label><input id="pedido_id" name="pedido_id" type="text" value="<?php echo $pedido_id;?>" <?php echo $c; ?> class="normal text input"/></li>
                 
                <li><div  id="s1" class="medium secondary btn icon-left entypo icon-tools"> <a href="#">Preparar factura</a></div><span class="medium info secondary btn icon-left icon-upload" id="save"><a href="#">Guardar Factura y Registrar Pago</a> </span> </li>
            </ul>
        </div>
    <div id="factura">
        
    </div>
    </form>

  <script type="text/javascript">
   $(document).ready(function ()
    {
        $("#save").hide();
         var container = $('div.container_validate');
        $("#save").click(function ()
    {
        
       
               var n=noty({
        text: '¿Esta seguro de guardar el registro?',
        modal:true,
        template:'<div class="noty_message warning alert" style="margin-bottom:0"><span class="noty_text"></span><div class="noty_close"></div></div>',
        buttons: [
            {
                addClass: 'pretty small success btn', 
                text: '<a class="pointer">Si</a>', 
                onClick: function($noty) {
                   
                    
                    var d="<?php echo url_for("save_factura");?>";
                     $.ajax({
                        
                    url:d,
                    data:{pedido_id:$("input[name='pedido_id']").val(),
                          name:$("input[name='nombre']").val(),
                          ruc:$("input[name='ruc']").val()},
                    type:'Post',
                    success:function(data,staus,jXhr)
                    {
                        var t="<?php echo url_for("cancel_factura");?>";
                        window.location.href=t;
                        
                    }
                     });
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
       

       
       
       
        
    });
        
               $("#save").next().attr("disabled", "disabled");
        $(document).delegate("#pdf",'click',function()
    {
       window.location.href="<?php echo url_for("crud/pruebaPdf")?>";
        console.log("llamada pdf!!!");
    });
        
       $("#s1").click(function ()
        {
            var d="<?php echo url_for("prepare_factura");?>";
                  
		  var es=$("#form1");
           es.validate({
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		rules:
                    {
                    "nombre":{
                        required:true
                         
                        },
			"ruc":
			    {
			    required: true
			    }
                    },
                messages: {
                    "nombre": 
                        {
                        required:"Debe ingresar el nombre del cliente."
                        
                        },
			"ruc":
			    {
			    required:"De ingresar el RUC!"
			    }
                    },
                wrapper: 'li'
                    
	});
	
		  
		  if (es.valid())
		  {
		  
		  $.ajax({
                    url:d,
                    data:{pedido_id:$("#pedido_id").val(),
                        ruc:$("#ruc").val(),
                        nombre:$("#nombre").val()},
                    type:'Post',
                    success:function(data,staus,jXhr)
                    {
                       $("#factura").empty();
                        $("#factura").html(data);
                        $("#pdf").remove();
                        $("#save").show();
                            $("#s1").after("<li class='field'><div class='medium btn default icon-right entypo icon-newspaper '><a id='pdf' href='#'>PDF</a></div></li>");
                    }
              });
            
		  }
         return false;
        });
           
   });

  </script>