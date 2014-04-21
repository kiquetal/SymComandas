
<style type="text/css">
    body
    {
	background-color: whitesmoke;
    }
    h2{


	border-bottom: 1px dotted #CCCCCC;margin-bottom: 10px;}


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
    .field .checkbox.checked i
    {
	top:-2px;   
    }

</style>
</head>
<body>
    <div class="container">
	<div class="row">
            <h2 class="secondary label info">Lista de Ingredientes</h2>                



	    <?php
	    $form = $pager->getResults();

	    echo '<table class="listado"><tr><thead><th>Id</th><th>Nombre</th><th></th></thead></tr><tbody>';
	    foreach ($form as $f) {
		echo('<tr>');
		echo("<td>" . $f->getId() . "</td>");
		echo("<td>" . $f->getName() . "</td>");

		echo("<td><i class=\"icon-pencil\"></i>" . link_to("editar", "ingre_edit", $f) . '</td>');
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
	    		<a href="<?php echo url_for('crud/listIngr') ?>?page=<?php echo $page ?>"><?php echo '<span class="primary badge">' . $page . '</span>' ?></a>
			<?php endif; ?>
		    <?php endforeach; ?>
    	    </div>
		<?php endif; ?>

	    <div class="pagination_desc">
		<strong><?php echo $pager->getNbResults() ?></strong> ingredientes

<?php if ($pager->haveToPaginate()): ?>
    		- pag. <strong><br><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
		<?php endif; ?>
	    </div>                  
        </div>
    </div>

