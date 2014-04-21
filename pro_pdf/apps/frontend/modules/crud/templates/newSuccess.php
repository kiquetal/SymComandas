<link rel="stylesheet" href="/js/libs/style.css">
<style type="text/css">
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
       
				<h2>Agregue nuevo sub-producto</h2>
                                <div class="row">
				<form action="<?php echo url_for("crud/register");?>" method="POST" data-form="validate" id="form1">
                                    <ul>
                                      
                                  <?php foreach($form as $k=>$sform)
                                    
                                  {
                                      ?>
                                       
                                            <?php
                                            if ($k=='_csrf_token'  || $k=='id')
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
<input class="wide text input" type="text" placeholder="Ingrese precio" name="precio">
                                        </li>
              </div>
                                    </ul>
  <?php  echo $form->renderHiddenFields() ?>
                                    <div class="pretty medium default btn margin-left">
                                        <input type="submit" value="Send">
                                    </div>
                                    
                                <input type="button" id="btn" value="click">
  <input type="button" id="aggr_estado" value="agregar estado">
                                </form>
                                </div>
        </div>
    <div class="specific">
        <input id="pedido21" type="checkbox" checked="checked"  disabled="disabled">
          <input id="pedido22" type="checkbox" checked="checked">
          <input id="pedido23" type="checkbox">
    </div>
       <script type="text/javascript">
      $(document).ready(function ()
  {
     
 $('.specific > :checkbox').on('load',function(){
    console.log("checkbox");
    
 });
     $('.specific > :checkbox').iphoneStyle({  checkedLabel: 'Cancelado',
                                            uncheckedLabel: 'Pendiente'});
 $("#btn").click(function ()
  {
     console.log($.each($('div.specific :checkbox:not(:disabled):checked'),function(i,d,m)
 {
     console.log(d);
 }));
      
  });

$("#aggr_estado").click(function ()
{
    /*
   var s="<input type='checkbox' id='aaa'>";
   $("aaa").iphoneStyle({  checkedLabel: 'Cancelado',uncheckedLabel: 'Pendiente'});
   console.log(s);
  $(".specific").append("<input type='checkbox'>")
   */
  
      setInterval(function() {
          // Do something every 2 seconds
            $("<input type='checkbox' id='aaa'>")
    .appendTo(".specific")
    .iphoneStyle({  checkedLabel: 'Cancelado',uncheckedLabel: 'Pendiente'});;
  
    }, 5000);
  
  
});
          $("body").delegate('.rem', 'click', function(){
      
     
             $(this).parent().remove();
          });
       $(document).on('click','.label > span ',function()
   {
   });
      $("#sub_producto_producto_id").change(function ()
    {
     var d="<?php echo url_for("crud/getIngr");?>";
     console.log(d);
    var v=$(this).val();
    $.ajax({
    url:d,
    data:{product_id:v},
    type:'Post',
    success:function(res,es)
    {
        
        var d=$.parseJSON(res);
     $.each(d, function() {
                $.each(this, function(name, val) {
        var elm='<li><label class="checkbox"><input type="checkbox" id="sub_producto_ingredientes_id_"'+val.id +'"value="'+val.id+'"name="sub_producto[ingredientes_id][]"><span></span>'+val.name+'</label>&nbsp;</li>';
        $(".checkbox_list").append(elm);
            
            
            
    });
});
  Gumby.initialize('checkboxes');
      
    }
    
});


$("ul.checkbox_list > li").fadeOut(200,function(){}).delay();
 
})
  
      var i=0;
      $("form select").wrap("<div class='picker'>");
      $("div.picker").parent().prepend("<span class='under'>Seleccione Producto</span>");
      $("form input[type=checkbox]").each(function ()
  {
      var chek=this;
       var label=$(this).next().text();
     $(chek).wrap("<label class='checkbox'>"); 
     var p=$(chek).parent();
     $(p).append("<span></span>");
     $(p).append(label);
  });
      
     $("#sub_producto_name").parent().prepend("<label class='inline'>Nombre</label>");
     $("#sub_producto_name").addClass("wide text input");
     $("label.checkbox").next().remove();
     $(".checkbox_list").parent().prepend("<span><b><u>Ingredientes</u></b></span>")
     $(".checkbox_list").after("<span><a href='#' id='ingr_new'>Agregar ingrediente nuevo</a>");
       
        var ing="<label>Nombre:</label><input type='text' name='new_ingredientes[]' class='normal text input'></input>";
        var el="<div id='in'>"+ing +"</div>";
     $("#ingr_new").after(el);
     $("#in").append("<span id='add_more' style='color:green;cursor:pointer;'><i class='icon-plus-circled'></i></span>");
    
     $("#ingr_new").click(function ()
        {
    
            $("#ingr_new").addClass("colr");
            $("#in").fadeIn(1000, function ()
            {
            });

    

    return false;
    
    
 });
 $("#add_more").click(function ()
{
    $("#in").append("<p>"+ing+"<span class='rem'><i class='icon-minus-circled'></i></span></p>");
    
});



 
 
 
     $("#form1").submit(function ()
     {
       return true;
      });
 });
      
      </script>
      <script src="/js/libs/ui/gumby.checkbox.js"></script>
