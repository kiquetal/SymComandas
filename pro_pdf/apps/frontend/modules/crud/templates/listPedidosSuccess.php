<link rel="stylesheet" href="/js/libs/style.css">

<!-- <link rel="stylesheet" href="css/style.css"> -->
<script src="/js/libs/modernizr-2.6.2.min.js"></script>
<style type="text/css">

    h4
    {
	color: black;
    }

</style>

<?php
$pedidos = $pager->getResults();
echo '<table class="listado">';
foreach ($pedidos as $p) {

    echo('<tr>');
    echo("<td>" . $p->getId() . "</td>");
    echo("<td>" . $p->getPrecio() . "</td>");
    $ch = '';
    if ($p->getEstado() == 0) {
	$ch = '';
	$d = '';
    } else {
	$d = 'disabled="disabled"';
	$ch = 'checked="checked" ' . $d;
    }


    //<?php echo link_to("Ver detalle","pedido_detalle",$p)
    echo("<td><div class='specific'><input type='checkbox' $ch name='ck_{$p->getID()}'></div></td>");
    echo("<td><input type='button' value='actualizar' id_ped='" . $p->getID() . "' class='btn_update' $d/></td>");
    // echo('<td>'. link_to("Ver detalle","pedido_detalle",$p) ."</td>");
    echo('<td><a href="#" class="dt1">Ver Detalle</a></td>');
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
	        <a href="<?php echo url_for('list_pedidos') ?>?page=<?php echo $page ?>"><?php echo '<span class="primary badge">' . $page . '</span>' ?></a>
	    <?php endif; ?>
	<?php endforeach; ?>
    </div>
    <?php endif; ?>

<div class="pagination_desc">
    <strong><?php echo $pager->getNbResults() ?></strong> List Pendientes

<?php if ($pager->haveToPaginate()): ?>
        - pag. <strong><br><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
<?php endif; ?>
</div>                  



<div id="algo"></div>  


<script type="text/javascript">
    $(document).ready(function ()
    {
     
	$(".dt1").click(function(event)
	{

	    event.preventDefault();
	    var td=$(this).parent().prev().eq(0);
 
	    var pedido_id=$(td).children().eq(0).attr("id_ped");
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
		    data:{pedido_id:id,state:1},
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
	$('.specific > :checkbox').iphoneStyle({checkedLabel: 'Listo p/ entregar',
	    uncheckedLabel: 'Preparando'});

	Gumby.initialize('checkboxes');
	$("#form1").submit(function ()
	{
	    return true;
	});
    });
      
</script>
