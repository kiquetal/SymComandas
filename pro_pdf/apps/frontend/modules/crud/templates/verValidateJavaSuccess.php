<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Test for jQuery validate() plugin</title>
<script src="/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/js/jquery.validate.js" type="text/javascript"></script>

<style>
.cmxform fieldset p.error label { color: red; }
div.container {
	background-color: #eee;
	border: 1px solid red;
	margin: 5px;
	padding: 5px;
}
div.container ol li {
	list-style-type: disc;
	margin-left: 20px;
}
div.container { display: none }
.container label.error {
	display: inline;
}
form.cmxform { width: 30em; }
form.cmxform label.error {
	display: block;
	margin-left: 1em;
	width: auto;
}
</style>

<script>


$().ready(function() {

	var container = $('div.container');

                                                        $("#button").click(function()
                                                        {


           var es=$("#form2");
           es.validate({
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		rules:
                    {
                    name:{
                        required:true,
                         number:true
                        }
                    },
                messages: {
                    name: 
                        {
                        required:"Debe ingresar algun valor(requerido).",
                        number:"DEBE SER NUMERICO ANIMAL"
                        }
                    },
                wrapper: 'li'
                    
	});
        alert(es.valid());

                                                        });



	$(".cancel").click(function() {
		validator.resetForm();
	});
});
</script>

</head>
<body>

<h1 id="banner"><a href="http://bassistance.de/jquery-plugins/jquery-plugin-validation/">jQuery Validation Plugin</a> Demo</h1>
<div id="main">

<div class="container">
	<h4>Existen algunos errores, por favor ingrese los datos correctos.</h4>
	<ol>
		<li><label for="email" class="error">Please kiquetal your email address</label></li>
		<li><label for="phone" class="error">Please enter your phone <b>number</b> (between 2 and 8 characters)</label></li>
		<li><label for="address" class="error">Please enter your address (at least 3 characters)</label></li>
		<li><label for="avatar" class="error">Please select an image (png, jpg, jpeg, gif)</label></li>
		<li><label for="cv" class="error">Please select a document (doc, docx, txt, pdf)</label></li>
	</ol>
</div>

<form class="cmxform" id="form2" method="get" action="">
	<fieldset>
		<legend>Validating a complete form</legend>
                <input type="button" id="button" value="clickeame"/>
                <p>
			<label for="name">Name</label>
			<input id="name" name="name">
		</p>
                
		<p>
			<label for="address">Address</label>
                        
                        <label for="address" class="error">Please enter your email address</label>
                        
			<input id="address" name="address" required minlength="3">
		</p>
		<p>
			<label for="agree">Please agree to our policy</label>
			<input type="checkbox" class="checkbox" id="agree" title="Please agree to our policy!" name="agree" required>
		</p>
		<p>
			<input class="submit" type="submit" value="Submit"/>
			<input class="cancel" type="submit" value="Cancel"/>
		</p>
	</fieldset>
</form>

<div class="container">
	<h4>There are serious errors in your form submission, please see details above the form!</h4>
</div>

<a href="index.html">Back to main page</a>

</div>


</body>
</html>
