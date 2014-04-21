<link rel="stylesheet" href="/js/libs/style.css">
<style type="text/css">

    table tr td, table tbody tr td {
	font-size: 16px;
	text-align: center;
    }   

    table thead tr th {
	font-size: 16px;
	font-weight: bold;
	text-align: center;
	vertical-align: bottom;
    }

</style>
<!-- <link rel="stylesheet" href="css/style.css"> -->
<script src="/js/libs/modernizr-2.6.2.min.js"></script>
<?php
$facturas = $pager->getResults();
echo '<table class="listado">';
echo '<thead><tr><th>Nª Factura</th><th>Fecha</th><th class="text-align:center">Monto</th><th></th></thead><tbody>';
foreach ($facturas as $f) {

    echo('<tr>');
    echo("<td>" . $f->getId() . "</td>");
    echo ("<td>" . $f->getTs() . "</td>");
    echo("<td>" . number_format($f->getTotal(), 2, ',', '.') . "</td>");
    $url = url_for("ver_pdf", array('pedido_id' => $f->getPedidoId(), 'ver_pdf' => true));
    echo('<td><a href="' . $url . '">Ver Factura</a></td>');

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
	        <a href="<?php echo url_for('list_facturas') ?>?page=<?php echo $page ?>"><?php echo '<span class="primary badge">' . $page . '</span>' ?></a>
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


