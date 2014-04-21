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
     			<h2>Lista de Ingredientes</h2>                
                  
                                 <?php foreach ($ingredientes as $sub_producto): ?>
    <tr>
        <td><?php echo $sub_producto->getId()?></td>
      <td><?php echo $sub_producto->getName() ?></td>
      <td><?php echo $sub_producto->getOwnerProdId()?></td>
      <td><?php echo link_to("editar","ingre_edit",$sub_producto) ?></td><br>
    </tr>
    <?php endforeach; ?>
                                
    <tr><td><?php echo link_to("agregar","ingre_add")?></td></tr>                          
    
                      </table>   
                                
                                
                                
                                
                                </div>
        </div>


                                
                                
        </div>

      

     </body>
</body>
</html>