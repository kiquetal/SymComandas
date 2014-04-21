
        <style type="text/css">
             body
            {
                background-color: whitesmoke;
            }
            h2{
                
                
                border-bottom: 1px dotted #CCCCCC;margin-bottom: 10px;}
            
            table.listado tr:first-child
            {
                border-top: 1px solid black;
            }
           
            table.listado tr:last-child
            {
                border-bottom: 1px solid black;
            }
            form label
            {
                display: inline;
                margin-right: 5px;
           
            }
            .pagination
            {
                margin:0 0 0 25%;
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
          
    
    </style>
     <div class="container">
        <div class="row">
            <h2 class="secondary label info">Lista de Productos</h2>                
                  
    <?php
    
    $form=$pager->getResults();

    echo '<table class="listado"><thead><tr><th>ID</th><th>Nombre</th><th>Precio</th><th></th></tr></thead>';
     $array=$sf_data->getRaw('array_with_no_sub');
  
    foreach ($form as $f)
    {
      echo('<tr>');
      $mn='';
      if (in_array($f->getId(), $array))
      {
	  $mn="<h3 class='secondary label info'>No tiene sub_producto</h3>";
	  
      }
      echo("<td>". $f->getId()."</td>");
      echo("<td>".$f->getName().$mn."</td>");
     echo("<td><i class=\"icon-pencil\"></i>".link_to("editar","prod_edit",array("id"=>$f->getId())).'</td>');
     echo('</tr>');
    }
    echo ('</table>');
    ?>
                        
 <?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
              <a href="<?php echo url_for('list_productss') ?>?page=<?php echo $page ?>"><?php echo '<span class="primary badge">'.$page .'</span>'?></a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo $pager->getNbResults() ?></strong> Productos
 
  <?php if ($pager->haveToPaginate()): ?>
    - pag. <strong><br><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>                  
        </div>
     </div>
        