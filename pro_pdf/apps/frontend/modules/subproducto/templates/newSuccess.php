<html>
    <head>
   <?php include_http_metas() ?>
    <?php include_stylesheets() ?>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.7.2.min.js"><\/script>')</script>
        
  <script>
  
    $(document).ready(function ()
    {
     $("#sub_producto_producto_id").removeClass("text").addClass("picker").css({"padding-top":"10px"}); 
     $("#asdm").click(function ()
 {
     $.ajax({
         url: "http://www.proyecto.com.localhost:8080/frontend_dev.php/subproducto/bla"
         
         
     });
 })
    });
  
  </script>
  
    </head>
    <body>
    <div style="background-color: gray">
        <center><h3 style="background-color: #00a6fc">New Sub producto</h3></center>
        <form action="<?php echo url_for('subproducto/hola') ?>" method="POST">
<?php  $form->renderHiddenFields(); ?>
<ul class="field row">

    <?php foreach($form as $k=>$field):?>
    <li>
          <?php
            if ($k=='id' ||$k=='_csrf_token')
            {
               // echo 'es token';
            }
           else
                 echo $field->renderRow(array('class'=>"text"));?>
    
    </li>
    <?php endforeach ;?>
    <li>
        <input type="submit" />
    </li>
</ul>
</form>
    </div>
        
        

        <script type="text/javascript">
            (function(){
                $("#sub_producto_producto_id").addClass("picker");
            })();
        </script>
  <script src="/js/libs/gumby.min.js"></script>
  <script src="/js/plugins.js"></script>
  <script src="/js/main.js"></script>

        
    </body>
</html>