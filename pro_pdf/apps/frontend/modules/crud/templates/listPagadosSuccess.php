<link rel="stylesheet" href="/js/libs/style.css">
<style type="text/css">


    table thead tr th
    {
        text-align: center;
    }


</style>
<!-- <link rel="stylesheet" href="css/style.css"> -->
<script src="/js/libs/modernizr-2.6.2.min.js"></script>
<?php
$pedidos = $pager->getResults();
echo '<table class="listado">';
echo '<thead><tr><th></th><th>Precio</th><th class="text-align:center">Estado</th><th></th><th></th><th></th></thead><tbody>';
foreach ($pedidos as $p) {

    echo('<tr>');
    echo("<td>" . $p->getId() . "</td>");
    echo("<td>" . $p->getPrecio() . "</td>");
    $ch = '';
    if ($p->getEstado() == 1) {
	$ch = '';
	$d = '';
    } else {
	$d = 'disabled="disabled"';
	$ch = 'checked="checked" ' . $d;
    }


    //<?php echo link_to("Ver detalle","pedido_detalle",$p)
    echo("<td><div class='specific'><input type='checkbox' $ch name='ck_{$p->getID()}'></div></td>");

    // echo('<td>'. link_to("Ver detalle","pedido_detalle",$p) ."</td>");
    echo('<td><a href="#" class="dt1">Ver Detalle</a></td>');
    if ($p->getEstado() != 2) {
	$url = url_for("prepare_factura_get", array('pedido_id' => $p->getID()));
	echo('<td><a href="' . $url . '">Prepara factura</a></td>');
    } else {
	$url = url_for("ver_pdf", array('pedido_id' => $p->getID(), 'ver_pdf' => true));
	echo('<td><a href="' . $url . '">Ver Factura</a></td>');
    }
    echo('</tr>');
}
echo '</tbody>';
echo ('</table>');
?>


<?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
	<?php foreach ($pager->getLinks() as $page): ?>
	    <?php if ($page == $pager->getPage()): ?>
		<?php echo $page ?>
	    <?php else: ?>
	        <a href="<?php echo url_for('list_pagados') ?>?page=<?php echo $page ?>"><?php echo '<span class="primary badge">' . $page . '</span>' ?></a>
	    <?php endif; ?>
	<?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="pagination_desc">
    <strong><?php echo $pager->getNbResults() ?></strong> Pedidos a pagar

    <?php if ($pager->haveToPaginate()): ?>
        - pag. <strong><br><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>
</div>                  







<?php
echo html_entity_decode('<div class="modal" id="modal1"><div class="content"><a class="close switch" gumby-trigger="|#modal1"><i class="icon-cancel" /></i></a><div class="row"><div class="ten columns centered text-center"><h2>This is a modal.</h2><p>Gumby modals are easy to make using Toggles &amp; Switches.</p><p class="btn primary medium"><a href="#" class="switch" gumby-trigger="|#modal1">Close Modal</a></p></div></div></div></div>');
echo '<form name="f1" id="f_estados">';
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
	    var td=$(this).parent().parent().children().eq(0);
	    console.log(td.html());
	    var pedido_id=td.html();
	    console.log(pedido_id);
	    //   $("#modal1").addClass("modal active");        
	    var d="<?php echo url_for("modal_view"); ?>";

	    $.ajax({
		url:d,
		data:{pedido_id:pedido_id},
		type:'Post',
		success:function(data,staus,jXhr)
		{
		    console.log(data);
		    $("#algo").append(data);
		    $("#modal2").addClass("modal active") 
		    $(document).keydown(function(e) {
			// ESCAPE key pressed
			if (e.keyCode == 27) {
			    $("#modal2").remove()
			}
		    });
                             
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
            
		var d="<?php echo url_for("update_status"); ?>";

		$.ajax({
		    url:d,
		    data:{pedido_id:id,state:2},
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
	$('.specific > :checkbox').iphoneStyle({checkedLabel: 'Pagado',
	    uncheckedLabel: 'Pendiente de pago'});

	Gumby.initialize('checkboxes');
	$("#form1").submit(function ()
	{
	    return true;
	});
    });
      
</script>
