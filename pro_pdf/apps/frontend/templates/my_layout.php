<!DOCTYPE html> 
<html>
    <head>
                
        <link rel="stylesheet" href="/css/gumby.css">
          
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <script src="/js/libs/modernizr-2.6.2.min.js"></script>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.8.3.min.js"><\/script>')</script>
   <script src="/js/libs/gumby.min.js"></script>
 
 
<title>Comandas-Web <?php echo get_slot("foo", "default value if slot doesn't exist"); ?> </title>  

<style type="text/css">
    
    body
    {
        background-image: url("/images/back_repeat.png");
    }
    .row
    {
	color: white;
    }
    
.row table
    {
	color: black;
    }
    h1,h2,h3,h4,p
    {
        color: white;
    }
    h1,h2
    {
	text-decoration: underline;
    }
        .icon-check
    {
	color: black;
    }
    
   .wrapper
        {
            max-width: 1100px;
        }
        .wrapper
        {
            min-height: 80%;
        }
 #footer
{
    padding-top: 15px;
  height:10%;
 color:white;
 border-bottom-color: #000066;
 border-bottom-style: ridge;
 border-bottom-width: 20px;
 text-align: center;
}
    
</style>

    </head>
    <body>
        <?php if (has_slot('sidebar')): ?>
  <?php include_slot('sidebar') ?>
<?php else: ?>
  <!-- default sidebar code -->
  <div class="row">
  <h3>Comandas</h3>
  <p><a href="/">Comandas demo</a>
 <?php
   if ($sf_user->getAttribute("logged"))
   {
      echo "<span style=\"margin-left:70%;\"><i class=\"icon-logout\" style=\"color:#D04526;\"></i> <a href=\"".url_for("salir")."\">Salir</a></span></p>";  
   } 
   else
   {
       echo "</p>";
   }
 ?>
  </div>
<?php endif; ?>
  <div class="row wrapper">
  <div class="row">
     
          
    <?php echo $sf_content; ?>
    </div>
    </div>

  <div id="footer" >
      <div class="sixteen columns valign"><span>COMANDAS-DROID.</span></div>
  
  </div>

 
  <script type="text/javascript" src="/js/noty/jquery.noty.js"></script>
  <!-- layouts -->
  <script type="text/javascript" src="/js/noty/layouts/bottom.js"></script>
  <script type="text/javascript" src="/js/noty/layouts/bottomCenter.js"></script>
  <script type="text/javascript" src="/js/noty/layouts/bottomLeft.js"></script>
  <script type="text/javascript" src="/js/noty/layouts/bottomRight.js"></script>
  <script type="text/javascript" src="/js/noty/layouts/center.js"></script>
  <script type="text/javascript" src="/js/noty/layouts/centerLeft.js"></script>
  <script type="text/javascript" src="/js/noty/layouts/centerRight.js"></script>
  <script type="text/javascript" src="/js/noty/layouts/inline.js"></script>
  <script type="text/javascript" src="/js/noty/layouts/top.js"></script>
  <script type="text/javascript" src="/js/noty/layouts/topCenter.js"></script>
  <script type="text/javascript" src="/js/noty/layouts/topLeft.js"></script>
  <script type="text/javascript" src="/js/noty/layouts/topRight.js"></script>
  <script type="text/javascript" src="/js/libs/iphone-style-checkboxes.js"></script>
  <!-- themes -->
  <script type="text/javascript" src="/js/noty/themes/default.js"></script>
 
      <script src="/js/libs/gumby.js"> </script>

      <script src="/js/plugins.js"></script>
      <script src="/js/main.js"></script>
      <script src="/js/libs/ui/gumby.checkbox.js"></script>
      <script src="/js/libs/gumby.init.js"></script>
      <script src="/js/libs/gumby.min.js"></script>
 <!-- themes -->
  <script type="text/javascript" src="/js/noty/themes/default.js"></script>
        
    </body>
</html>