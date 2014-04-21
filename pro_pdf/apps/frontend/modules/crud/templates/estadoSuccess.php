<html>
<head>
  <link rel="stylesheet" href="/css/gumby.css">
  <!-- <link rel="stylesheet" href="css/style.css"> -->

  <script src="/js/libs/modernizr-2.6.2.min.js"></script>
        <style type="text/css">
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
 </head>
 <body>
     <div class="container">
        <div class="row">
       
				<h2>Agregue nuevo sub-producto</h2>
                                <div class="row">
				<form action="<?php echo url_for("crud/register");?>" method="POST" data-form="validate" id="form1">
                                    <ul>
                                      
                                  <?php foreach($form as $k=>$sform)
                                    
                                  {
                                      ?>
                                       
                                            <?php
                                            if ($k=='_csrf_token'  || $k=='id' || $k=='name')
                                            {
                                              
                                            }
                                            else
                                            {
                                                echo ' <li class="field">';
                                            echo $sform->Render();
                                            
                                            }
                                     
                                  }
                                    
                                  ?>
                                    

                                        <li class="field">
                                            <label class="inline" for="text1">Precio</label>
<input class="wide text input" type="text" placeholder="Ingrese precio" name="text1">
                                        </li>
              </div>
                                    </ul>
  <?php  echo $form->renderHiddenFields() ?>
                                    <div class="pretty medium default btn margin-left">
                                        <input type="submit" value="Send">
                                    </div>
                                    
                                     <li class="field">
<div class="picker">
<select>
<option value="#" disabled>Favorite Dalek phrase...</option>
<option>EXTERMINATE</option>
<option>EXTERMINATE</option>
<option>EXTERMINATE</option>
<option>EXTERMINATE</option>
<option>EXTERMINATE</option>
<option>EXTERMINATE</option>
<option>EXTERMINATE</option>
<option>EXTERMINATE</option>
</select>
</div>
</li>
                                    
                                </form>
                                </div>
        </div>


                                
                                
        </div>

       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.3.min.js"><\/script>')</script>
       <script type="text/javascript">
      $(document).ready(function ()
  {
      var i=0;
      $("form select").wrap("<div class='picker'>");
    $("div.picker").parent().prepend("<span class='under'>Seleccione Producto</span>");
      $("form input[type=checkbox]").each(function ()
  {
      var chek=this;
      i=i
      var label=$(this).next().text();
     $(chek).wrap("<label class='checkbox'>"); 
     var p=$(chek).parent();
     $(p).append("<span></span>");
     $(p).append(label);
  });
      
    $("label.checkbox").next().remove();
    $(".checkbox_list").prepend("<span><b><u>Ingredientes</u></b></span>")
$("#form1").submit(function ()
{
    return true;
});
 });
      
      </script>
      <script src="/js/libs/gumby.js"> </script>
      <script src="/js/libs/gumby.min.js"></script>
  <script src="/js/plugins.js"></script>
  <script src="/js/main.js"></script>

     </body>
</body>
</html>