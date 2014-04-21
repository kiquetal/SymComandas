<link rel="stylesheet" href="/js/libs/style.css">

<!-- <link rel="stylesheet" href="css/style.css"> -->
<script src="/js/libs/modernizr-2.6.2.min.js"></script>

<div class="row">

    <h1>Pedidos Detalle </h1>
    <div class="six colgrid">  
	<?php
	$tot = 0;
	foreach ($precios as $p => $v) {
	    $tot+=$v['precio'];
	    ?>
    	<div class="row"> 
    	    <div class="three columns"><?php echo $v['item']; ?>
    	    </div><div class="three columns"><?php echo $v['precio']; ?></div>
    	</div>
	    <?php
	}
	?>
    </div>
    <div class="row"><hr></div>
    <div class="nine colgrid">
	<div class="row">
	    <div class="three columns" >Total:</div>
	    <div class="five columns"> <?php echo $tot; ?></div>

	</div>

    </div>

    <script type="text/javascript">
	$(document).ready(function ()
	{
     
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
	    $('.specific > :checkbox').iphoneStyle({checkedLabel: 'Cancelado',
		uncheckedLabel: 'Pendiente'});

	    Gumby.initialize('checkboxes');
	    $("#form1").submit(function ()
	    {
		return true;
	    });
	});
      
    </script>
