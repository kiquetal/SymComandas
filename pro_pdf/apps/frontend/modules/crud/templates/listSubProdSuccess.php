
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
            <h2 class="secondary label info">Lista de Sub productos</h2>                
                  
    <?php
    
    $form=$pager->getResults();
    echo '<table class="listado"><thead><tr><th>ID</th><th>Nombre</th><th>Precio</th><th></th></tr></thead>';
   
    foreach ($form as $f)
    {
      echo('<tr>');
      echo("<td>". $f->getId()."</td>");
      echo("<td>".$f->getName()."</td>");
      echo("<td>".$f->getPrecio().'</td>');
      echo("<td><i class=\"icon-pencil\"></i>".link_to("editar","subprod_edit",$f).'</td>');
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
              <a href="<?php echo url_for('crud/listSubProd') ?>?page=<?php echo $page ?>"><?php echo '<span class="primary badge">'.$page .'</span>'?></a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo $pager->getNbResults() ?></strong> SubProductos
 
  <?php if ($pager->haveToPaginate()): ?>
    - pag. <strong><br><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>                  
        </div>
     </div>
        
    
