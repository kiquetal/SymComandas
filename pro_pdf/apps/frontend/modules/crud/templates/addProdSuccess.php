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
    .field .checkbox.checked i
    {
	top:-2px;   
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


	<h2>Agregue Producto</h2>
	<div class="row">
	    <form action="<?php echo url_for("add_product"); ?>" method="POST" enctype="multipart/form-data"  data-form="validate" id="form1">
		<ul>

		    <?php
		    foreach ($form as $k => $sform) {
			?>

			<?php
			if ($k == '_csrf_token' || $k == 'id') {
			    
			} else {
			    echo ' <li class="field">';

			    echo $sform->RenderRow();
			    echo '</li>';
			}
		    }
		    ?>


		    <?php echo $form->renderHiddenFields() ?>
		    <div class="large btn default">
			<input type="submit" value="Guardar">
		    </div>
		    </div>
		    </div>
		    </div>
		    <script type="text/javascript">
			$(document).ready(function ()
			{
      
			    var container = $('div.container_validate');

			    $("#form1").submit(function()
			    {

				var es=$("#form1");
				es.validate({
				    errorContainer: container,
				    errorLabelContainer: $("ol", container),
				    rules:
					{
					"producto[name]":{
					    required:true
                         
					}
				    },
				    messages: {
					"producto[name]": 
					    {
					    required:"Debe ingresar el nombre del producto."
                        
					}
				    },
				    wrapper: 'li'
                    
				});
	



	
				return   (es.valid());
			    });
      
      
			    $("#producto_name").addClass("normal text input");
 
			    $("#form1").submit(function ()
			    {
				return true;
			    });
			});
      
		    </script>
		    <script src="/js/libs/ui/gumby.checkbox.js"></script>
