
<style type="text/css">
    .checkbox_list li
    {
	height: 40px;
    }
    .row
    {
	color: white;
    }
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

</style>

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


    <h2>Ingrese Ingrediente</h2>
    <form method="POST" action="<?php echo url_for('ingre_add_new'); ?>" name="f1" id="form1">
	<?php echo $form->renderHiddenFields() ?>
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

	    <li>
		<div class="medium info btn ">
		    <input type="submit" id="bt1" value="Guardar"></input>
		</div>


	    </li>

	</ul>
    </form>
</div>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/libs/jquery-1.8.3.min.js"><\/script>')</script>
<script type="text/javascript">
    $(document).ready(function ()
    {
	$("form input[type=checkbox]").each(function ()
	{
	    var chek=this;
      
	    var label=$(this).next().text();
	    $(chek).wrap("<label class='checkbox'>"); 
	    var p=$(chek).parent();
	    $(p).append("<span></span>");
	    $(p).append(label);
	});
  
	$("label.checkbox").next().remove();
	$("ul .checkbox_list").addClass("tiles three_up");
	$(".checkbox_list").parent().prepend("<span><b><u>Productos Relacionados</u></b></span>")
         
	/*
var n=noty({
text: 'Do you want to continue?',
buttons: [
{addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {

 // this = button element
 // $noty = $noty element

 $noty.close();
 noty({text: 'You clicked "Ok" button', type: 'success',layout:'top'});
}
},
{addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {
 $noty.close();
 noty({text: 'You clicked "Cancel" button', type: 'error'});
}
}
]
});
	 */


	$("#ingredientes_name").parent().prepend("<label class='inline'>Nombre</label>");
	$("#ingredientes_name").addClass("wide text input");
     
	$("#form1").submit(function (){
	
	    var container = $('div.container_validate');
	
	    var es=$("#form1");
	    console.log(es);
	    es.validate({
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		rules:
		    {
		    "ingredientes[name]":{
			required:true
                        
		    }
			
		},
		messages: {
		    "ingredientes[name]": 
			{
			required:"Debe ingresar algun nombre para el ingrediente."
                        
		    }
			
		},
		wrapper: 'li'
                    
	    });
	
	
	    return (es.valid());
	
	});
    });
      
</script>
<script src="/js/jquery.validate.js" type="text/javascript"></script>

<script src="/js/libs/gumby.js"> </script>
<script src="/js/libs/gumby.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/main.js"></script>
<script src="/js/libs/ui/gumby.checkbox.js"></script>

