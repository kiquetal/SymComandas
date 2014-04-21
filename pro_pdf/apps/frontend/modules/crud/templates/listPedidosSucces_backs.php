<link rel="stylesheet" href="/js/libs/style.css">

  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <script src="/js/libs/modernizr-2.6.2.min.js"></script>


  
  
  
  
  
  
  
  
    <?php
    echo html_entity_decode('<div class="modal" id="modal1"><div class="content"><a class="close switch" gumby-trigger="|#modal1"><i class="icon-cancel" /></i></a><div class="row"><div class="ten columns centered text-center"><h2>This is a modal.</h2><p>Gumby modals are easy to make using Toggles &amp; Switches.</p><p class="btn primary medium"><a href="#" class="switch" gumby-trigger="|#modal1">Close Modal</a></p></div></div></div></div>');    
    echo '<form name="f1" id="f_estados">';
    echo '<table class="striped rounded">';
    echo ("<thead>");
    echo ("<tr><th>Id</th><th>Precio</th><th>Estado</th><th></th><th></th></tr>");
    echo("</thead>");
    
        echo ('<tbody>');
    foreach ($pedidos as $p)
    {
        /* @var $p ClassName */
      echo('<tr>');
      echo("<td>". $p->getId()."</td>");
      echo("<td>".$p->getPrecio()."</td>");
                $ch='';
      if($p->getEstado()==0)
      {
          $ch='';
          $d='';
      }
 else {
        $d='disabled="disabled"';
          $ch='checked="checked" '.$d;
      }

       
      //<?php echo link_to("Ver detalle","pedido_detalle",$p)
      echo("<td><div class='specific'><input type='checkbox' $ch name='ck_{$p->getID()}'></div></td>");
        echo("<td><input type='button' value='actualizar' id_ped='".$p->getID()."' class='btn_update' $d/></td>");
     // echo('<td>'. link_to("Ver detalle","pedido_detalle",$p) ."</td>");
         echo('<td><a href="#" class="dt1">Ver Detalle</a></td>');
      echo('</tr>');
    }
    echo ('</tbody>');
    echo ('</table>');
    echo '<div id="algo"></div>';
  echo'<input type="submit" value="guardar">';
    echo '</form>';

    ?>
                       
        <script type="text/javascript">
        $(document).ready(function ()
  {
     
     $(".dt1").click(function(event)
 {

 event.preventDefault();
 var td=$(this).parent().prev().eq(0);
 
 var pedido_id=$(td).children().eq(0).attr("id_ped");
                     //   $("#modal1").addClass("modal active");        
            var d="<?php echo url_for("modal_view");?>";

      $.ajax({
                    url:d,
                    data:{pedido_id:pedido_id},
                    type:'Post',
                    success:function(data,staus,jXhr)
                    {
                        console.log(data);
                        $("#algo").append(data);
                             $("#modal2").addClass("modal active") 
                             $(".switch").click(function()
                             {
                                $("#modal2").remove();
                             });
                    }
              });

            
 
 });
     
              $(".btn_update:not(:disabled)").click(function()
              {
                 var me=$(this);
               console.log($(this).attr('id_ped'));
                     var id=me.attr('id_ped');
    var ck=$("input[name=ck_"+id+"]");
    if(ck.is(":checked"))
        {
            
            var d="<?php echo url_for("update_status");?>";

      $.ajax({
                    url:d,
                    data:{pedido_id:id},
                    type:'Post',
                    success:function(data,staus,jXhr)
                    {
                        me.attr("disabled","disabled");
                        ck.attr("disabled","disabled");
                         
                    }
              });
              }
              });
 $('.specific > :checkbox').on('load',function(){
    console.log("checkbox");
    
 });
 
          $("form").submit(function() {
              
              console.log($("input[type=checkbox]:checked:not(:disabled)"));
      return false;    
      });
 
 $('.specific>:checkbox').each(function ()
 {
     console.log(this);
 });
     $('.specific > :checkbox').iphoneStyle({checkedLabel: 'List p/ entregar',
                                            uncheckedLabel: 'Preparando'});

  Gumby.initialize('checkboxes');
     $("#form1").submit(function ()
     {
       return true;
      });
 });
      
      </script>
