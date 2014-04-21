<head>

    <link href="/css/flexnav.css" media="screen, projection" rel="stylesheet" type="text/css">
    <script src="/js/libs/gumby.min.js"></script>


    <style type="text/css">  
        li
        {
            float: left;

        }
	.field label
	{
	    display: inline-block;
	    min-width: 90px;
	    width: 100px;
	    color: gray;
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
	fieldset
	{
	    border-color: #D8D8D8;
	    border-style: solid;
	    border-width: 0.0625em;
	    padding: 1.5625em;
	}
	legend
	{
	    color: white;
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
	    <img src="/images/header_pol.png" id="imag1" width="900px" height="400px" />
	</div>


    </div>
    <div class="row">
	<div class="six columns">  
	    <h3> Proyecto Desarrollado por <br>Enrique M. Talavera <br> Programacion de Computadoras</h3>
	    <h4 class="row centered"> <br>Universidad Nacional de Asuncion <br><center> </center></h4>
	</div>
	<div class="six columns">
	    <fieldset>
		<legend>Ingreso de Usuario</legend>
		<ul>
		    <li class="field">
			<label class="inline" for="usuario"><u>Usuario</u></label>
			<input class="wide text input" name="user" id="text1" type="text" placeholder="ingrese usuario" />
		    </li>
		    <li class="field">
			<label class="inline" for="password"><u>Password</u></label>
			<input class="wide password input" name="pass" id="text2" type="password" placeholder="ingrese password" />
		    </li>
		    <li>
			<div class="medium primary btn"><a href="#" id="validate">Ingresar</a></div>
		    </li>
		</ul>
	    </fieldset>
	    <p>Bienvenido Visitante</p>
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
<script>
    $(document).ready(function ()
    {
         
	 
	$("#validate").click(function(e)
	{
	    e.preventDefault();
	    var user=$("input[name='user']").val();
	    var pass=$("input[name='pass']").val();
	    console.log(user);
	    console.log(pass);
	    $.ajax(
	    {
		url:"<?php echo url_for("access_login"); ?>",
		type:'POST',
		data:{"user":user,
		    "pass":pass},
		success:function(e,t,o)
		{
		    console.log(e);
		    if (e.status=="OK")
		    {
			console.log("redireccionamos");
			setTimeout(function(){ window.location = "/" }, 1000);
		    }
		    else
		    {
			alert("Error introduzca de nuevo el password");
		    }
		}
	    });
	});
			 
    });
	 
	 
	 
      
      
</script>