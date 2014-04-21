<h1>New Producto</h1>
<?php echo $form->renderHiddenFields() ?>

<form action="<?php echo url_for("foto/sube")?>" method="POST" enctype="multipart/form-data" >
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
               
        <input type="submit" value="clickeame"/>
            </li>

 </form>