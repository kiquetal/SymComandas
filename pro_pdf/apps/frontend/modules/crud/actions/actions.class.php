<?php

/**
 * Controlador Principal de 
 * la aplicación
 * 
 *
 * @package    comandas
 * @subpackage crud
 * @author     Kiquetal
 * 
 */
class crudActions extends sfActions {

    /**
     * Controlador de la página index,se desplegará el menu principal
     * siempre que el usuario haya sido correcamente identificado.
     * @param sfWebRequest $request  Requeste manejado por el framework
     * @return string
     */
    public function executeIndex(sfWebRequest $request) {
	$this->getUser()->setAuthenticated(true);
	$logged = $this->getUser()->getAttribute("logged");
	if (!$logged)
	    return 'LogView';

	$this->sub_productos = Doctrine_Core::getTable('SubProducto')
		->createQuery('a')
		->execute();
    }

    /**
     * Método para el ingreso y el registro de los productos
     * 
     * @param sfWebRequest $request
     */
    public function executeAddProd(sfWebRequest $request) {
	if ($request->isMethod(sfRequest::POST)) {
	    $produtos = $request->getPostParameter('producto');
	    $name_prod = $produtos['name'];
	    
	    $aray_files = $request->getFiles('producto');
	    $array_prod = array('name' => $name_prod);
		$producto_id = Doctrine_Core::getTable('Producto')
			    ->insertProducto($array_prod);
		
	    if (strlen($aray_files['image']['name']) > 1) {
		
		$image = $aray_files['image'];
		
		$img = new sfImage($image['tmp_name'], $image['type']);
		$real_ext = explode('/', $image['type']);

		error_log(var_export($real_ext, true));
		$img->thumbnail(150, 150);
		$img->setQuality(100);
		$path = sfConfig::get('sf_upload_dir') . 
			'/producto/producto_' . $producto_id;
		$img->saveAs($path . '.' . $real_ext[1]);
		$array_prod = array('product_id' => $producto_id,
		    'path' => '/uploads/producto/producto_'
		    . $producto_id . '.' . $real_ext[1]);
	    } else {
		error_log("NO LOGUAMOS IMAGES");
		$array_prod = "no";
	    }


	    if ($array_prod !='no') {
		error_log("no deberia de entrar");
		$array_prod = array('product_id' => $producto_id,
		    'path' => '/uploads/producto/producto_' 
		    . $producto_id . '.' . $real_ext[1]);
		$producto_id = Doctrine_Core::getTable('ProductoImages')
			->insertImageProduct($array_prod);
	    } else {
		error_log("no agregamos images");
		$array_prod=array();
	    }
	    $pattern = $this->getFormatedHmtlInsert(array("meta" => 
				    array("img" => @$array_prod['path']),
				    "item" => "producto"
				, "titulo" => $name_prod), $request);
	    $sesion = $this->getUser();
	    $sesion->setAttribute("pattern", $pattern);

	    $this->redirect($this->getModuleName() . '/itemAdded');
	} else {
	    $this->form = new ProductoForm();
	}
    }
    /**
     * Método encargado de actualizar los datos del Producto 
     * @param sfWebRequest $request
     * @return type
     */
    public function executeEditSubProd(sfWebRequest $request) {
	$method = $this->getRoute()->getRequirements();
	$method = $method['sf_method'][0];
	if ($method == 'put') {
	    print_r($request->getPostParameters());
	    $rem = (array) $request->getPostParameter("rem_ingre");
	    $add = (array) $request->getPostParameter("new_ingredientes");
	    $sub_producto_id = $request->getPostParameter("sub_producto_id");
	    $producto_id = $request->getPostParameter("producto_id");
	    $name = $request->getPostParameter("sub_producto_name");
	    $precio = $request->getPostParameter("sub_producto_precio");
	    $connection = Doctrine_Manager::getInstance()
			    ->getCurrentConnection()->getDbh();
	    $query = ' UPDATE  sub_producto SET precio=?, name=? WHERE id=?';
	    $statement = $connection->prepare($query);
	    $statement->bindValue(1, $precio);
	    $statement->bindValue(2, $name);
	    $statement->bindValue(3, $sub_producto_id);
	    $statement->execute();
	    $list = implode(",", $rem);
	    print_r($list);
	    $new_ingre = implode(',', $add);
	    if (count($rem) > 0) {
		$connection = Doctrine_Manager::getInstance()
			->getCurrentConnection()->getDbh();
		$query = ' DELETE  FROM sub_producto_ingredientes
		    WHERE sub_producto_id = ? AND ingredientes_id 
		    IN (' . $list . ')';
		$statement = $connection->prepare($query);
		$statement->bindValue(1, $sub_producto_id);
		$statement->execute();
	    }
	    if (count($add) > 0) {
		$all_new_ingre = array();
		foreach ($add as $k => $v) {
		    if (strlen($v) > 2) {
	      	      $id_ingrediente = Doctrine_Core::getTable('Ingredientes')
				->insertRawRow(array('ingredientes' => 
				    array('producto_id' => $producto_id, 
					    'name' => $v)));
			$all_new_ingre[] = $id_ingrediente;
		    }
		}
	  $id_ingrediente = Doctrine_Core::getTable('SubProductoIngredientes')
			->insertRawRow(array('sub_producto_id'
			    => $sub_producto_id, 'ingredientes_id' => 
					$all_new_ingre));
	    }
	    $pattern = $this->getFormatedHtmlUpdate(array("meta" => 
		array("titulo" => "ALGO"
		    , "extra" => 'Nuevo precio:' . $precio . '<br>
			Nuevo Nombre:' . $name
		),
		"item" => "sub_producto"), $request);
	    $sesion = $this->getUser();
	    $sesion->setAttribute("pattern", $pattern);
	    $this->redirect($this->getModuleName() . '/itemUpdated');
	    return sfView::NONE;
	} else {
	    $this->sub_producto = $this->getRoute()->getObject();
	    $this->sub_producto_id = $this->sub_producto->getId();
	    $this->producto_id = $this->sub_producto->getProductoId();
	    $connection = Doctrine_Manager::connection();
	    $query = 'SELECT ingredientes_id as m
		FROM sub_producto_ingredientes
		WHERE sub_producto_id =' . $this->sub_producto->getId();

	    $statement = $connection->execute($query);
	    $statement->execute();
	    $ingredientes_id_array = array();
	    foreach ($statement->fetchAll() as $k => $v) {
		$ingredientes_id_array[] = $v['m'];
	    }

	    if (count($ingredientes_id_array) > 0) {
		$this->ingredientes = Doctrine_Core::getTable('Ingredientes')
			->createQuery('i')
			->whereIn("i.id", $ingredientes_id_array)
			->execute();
	    } else {
		$this->ingredientes = array();
	    }
	}
    }

    /**
     * Método encargado de registrar y agregar sub-productos
     * @param sfWebRequest $request
     */
    public function executeAddSubProd(sfWebRequest $request) {
	if ($request->isMethod(sfRequest::POST)) {
	    $sub_producto = $request->getPostParameter("sub_producto");
	    $result = Doctrine_Core::getTable('SubProducto')
		    ->insert($request->getPostParameters());
	    $pattern = $this->getFormatedHmtlInsert(array("meta" =>
		array("img" => null
		    , "extra" => "Sub producto: " . $sub_producto['name'] . '
			<br>Precio:' . $request->getPostParameter("precio")),
		"item" => "sub_producto"
		, "titulo" => "a"), $request);
	    $sesion = $this->getUser();
	    $sesion->setAttribute("pattern", $pattern);
	    $this->redirect($this->getModuleName() . '/itemAdded');
	} else {
	    $this->form = new SubProductoForm();
	}
    }

    public function executeNew(sfWebRequest $request) {
	$this->form = new SubProductoForm();
    }

    public function executeListProd(sfWebRequest $request) {
	$this->pager = new sfDoctrinePager('Producto', 15);
    }

    public function executeListSubProd(sfWebRequest $request) {

	$this->pager = new sfDoctrinePager('SubProducto', 15);
	$this->pager->setQuery(Doctrine_Core::getTable('SubProducto')
			->createQuery('u')
			->leftJoin('u.Producto p')
			->where("u.state=0")
			->andWhere('p.state=0')
	);
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
    }

    public function executeSalirUser(sfWebRequest $request) {
	$this->getUser()->setAttribute("logged", false);


	$this->redirect('crud/index');
    }

    public function executeListIngr(sfWebRequest $request) {
	/*
	  $this->ingredientes=Doctrine_Core::getTable('Ingredientes')
	  ->createQuery('u')
	  ->execute();
	 */
	$this->pager = new sfDoctrinePager(
			'Ingredientes',
			15
	);
	$this->pager->setQuery(Doctrine_Core::getTable('Ingredientes')
			->createQuery('u')
			->where("u.state='0'")
	);
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
    }

    public function executeInvoice(sfWebRequest $request) {
	ini_set("magic_quotes_runtime", 0);
	$mpdf = new mPDF('win-1252', 'A4', '', '', 20, 15, 48, 25, 10, 10);
	$mpdf->useOnlyCoreFonts = true;    // false is default
	$mpdf->SetProtection(array('print'));
	$mpdf->SetTitle("Acme Trading Co. - Invoice");
	$mpdf->SetAuthor("Acme Trading Co.");
	$mpdf->SetDisplayMode('fullpage');
	$html = '
    <html>
    <head>
    <style>
    body {font-family: sans-serif;
    font-size: 10pt;
    }
    p {    margin: 0pt;
    }
    td { vertical-align: top; }
    .items td {
    border-left: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
    }
    table thead td { background-color: #EEEEEE;
    text-align: center;
    border: 0.1mm solid #000000;
    }
    .items td.blanktotal {
    background-color: #FFFFFF;
    border: 0mm none #000000;
    border-top: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
    }
    .items td.totals {
    text-align: right;
    border: 0.1mm solid #000000;
    }
</style>
</head>
<body>
<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="50%" style="color:#0000BB;">
<span style="font-weight: bold; font-size: 14pt;">Acme Trading Co.</span>
<br />123 Anystreet<br />Your City<br />GD12 4LP<br />
<span style="font-size: 15pt;">&#9742;</span> 01777 123 567</td>
<td width="50%" style="text-align: right;">Invoice No.<br />
<span style="font-weight: bold; font-size: 12pt;">0012345</span></td>
</tr></table>
</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; 
text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
<div style="text-align: right">Date: ' . date('jS F Y') . '</div>
    <table width="100%" style="font-family: serif;" cellpadding="10">
    <tr>
        <td width="45%" style="border: 0.1mm solid #888888;">
	<span style="font-size: 7pt; color: #555555; font-family: sans;">
	SOLD TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />
	Their City<br />CB22 6SO</td>
        <td width="10%">&nbsp;</td>
        <td width="45%" style="border: 0.1mm solid #888888;">
	<span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:
	</span><br /><br />345 Anotherstreet<br />Little Village<br />
	Their City<br />CB22 6SO</td>
    </tr>
    </table>
    <table class="items" width="100%" style="font-size: 9pt; 
    border-collapse: collapse;" cellpadding="8">
    <thead>
    <tr>
        <td width="15%">REF. NO.</td>
        <td width="10%">QUANTITY</td>
        <td width="45%">DESCRIPTION</td>
        <td width="15%">UNIT PRICE</td>
        <td width="15%">AMOUNT</td>
    </tr>
    </thead>
    <tbody>
    <!-- ITEMS HERE -->
    <tr>
        <td align="center">MF1234567</td>
        <td align="center">10</td>
        <td>Large pack Hoover bags</td>
        <td align="right">&pound;2.56</td>
        <td align="right">&pound;25.60</td>
    </tr>
    <tr>
        <td align="center">MX37801982</td>
        <td align="center">1</td>
        <td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
        <td align="right">&pound;112.56</td>
        <td align="right">&pound;112.56</td>
    </tr>
    <tr>
        <td align="center">MR7009298</td>
        <td align="center">25</td>
        <td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
        <td align="right">&pound;12.26</td>
        <td align="right">&pound;325.60</td>
    </tr>
    <tr>
        <td align="center">MF1234567</td>
        <td align="center">10</td>
        <td>Large pack Hoover bags</td> 
        <td align="right">&pound;2.56</td>
        <td align="right">&pound;25.60</td>
    </tr>
    <tr>
        <td align="center">MX37801982</td>
        <td align="center">1</td>
        <td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
        <td align="right">&pound;112.56</td>
        <td align="right">&pound;112.56</td>
    </tr>
    <tr>
        <td align="center">MR7009298</td>
        <td align="center">25</td>
        <td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
        <td align="right">&pound;12.26</td>
        <td align="right">&pound;325.60</td>
    </tr>
    <tr>
        <td align="center">MF1234567</td>
        <td align="center">10</td>
        <td>Large pack Hoover bags</td>
        <td align="right">&pound;2.56</td>
        <td align="right">&pound;25.60</td>
    </tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<!-- END ITEMS HERE -->
<tr>
<td class="blanktotal" colspan="3" rowspan="6"></td>
<td class="totals">Subtotal:</td>
<td class="totals">&pound;1825.60</td>
</tr>
<tr>
<td class="totals">Tax:</td>
<td class="totals">&pound;18.25</td>
</tr>
<tr>
<td class="totals">Shipping:</td>
<td class="totals">&pound;42.56</td>
</tr>
<tr>
<td class="totals"><b>TOTAL:</b></td>
<td class="totals"><b>&pound;1882.56</b></td>
</tr>
<tr>
<td class="totals">Deposit:</td>
<td class="totals">&pound;100.00</td>
</tr>
<tr>
<td class="totals"><b>Balance due:</b></td>
<td class="totals"><b>&pound;1782.56</b></td>
</tr>
</tbody>
</table>
<div style="text-align: center; font-style: italic;">Payment terms: 
payment due in 30 days</div>
</body>
</html>
';
	$mpdf->WriteHTML($html);

	$mpdf->Output('mpdf.pdf', 'D');
	return sfView::NONE;
    }

    public function executePruebaPdf(sfWebRequest $request) {

	
	ini_set("magic_quotes_runtime", 0);
	
	$mpdf = new mPDF('en-GB', 'A4', '', '', 32, 25, 27, 25, 16, 13);
	$mpdf->useOnlyCoreFonts = false;
	$file_name = "Factura";
	if ($request->hasParameter('ver_pdf')) {
	    $pedido_id = $request->getGetParameter('pedido_id');
	    $connection = Doctrine_Manager::connection();
	    $query = ' Select count(pd.sub_producto_id)as cant, pd.pedido_id,
		sb.precio as precio_unitario ,sum(sb.precio) as precio_total ,
		pd.item as descripcion from pedidos_detalle pd 
		JOIN sub_producto sb ON pd.sub_producto_id=sb.id 
		JOIN pedidos p on p.id=pd.pedido_id 
		WHERE pd.pedido_id = :pedido_id and p.estado<>0
		group by pedido_id,sub_producto_id';
	    $params = array(
		"pedido_id" => $pedido_id);
	    $statement = $connection->prepare($query);
	    $statement->execute($params);
	    $factura_pedido = $statement->fetchAll(PDO::FETCH_ASSOC);

	    $query = ' Select id as factura_id, name,ruc,ts from factura 
		where pedido_id = :pedido_id';
	    $params = array(
		"pedido_id" => $pedido_id);
	    $statement2 = $connection->prepare($query);
	    $statement2->execute($params);
	    $factura = $statement2->fetch();
	    $sesion = $this->getUser();
	    $file_name.=$factura['factura_id'];
	    $sesion->setAttribute('factura_id', $factura['factura_id']);
	    $sesion->setAttribute('nombre', $factura['name']);
	    $sesion->setAttribute('ruc', $factura['ruc']);
	    $sesion->setAttribute("pedidos_detalle", $factura_pedido);
	    $sesion->setAttribute("ts", $factura['ts']);
	    $sesion->setAttribute("pedido_id", $pedido_id);
	    sfContext::getInstance()->getLogger()
			->err(var_export($factura, true));
	}

	// LOAD a stylesheet
	$stylesheet = file_get_contents(sfConfig::get('sf_web_dir') . 
		    '/css/cm.css');

	$html = $this->getController()->getPresentationFor($this->
			    getModuleName(), 'maquetadoFactura');
	$mpdf->WriteHTML($html);

	/*
	  $mpdf->Output('mpdf.pdf','D');
	 */
	$mpdf->Output($file_name . '.pdf', 'I');
	return sfView::NONE;
    }

    public function executeVerPhp(sfWebRequest $request) {
	ini_set("zlib.output_compression", "On");
	if (function_exists("gzcompress")) {
	    echo "OK";
	} else {
	    echo("zlib missing");
	}
	phpinfo();
	return sfView::NONE;
    }

    public function executeVerValidateJava(sfWebRequest $request) {
	
    }

    public function executeCancelFactura(sfWebRequest $request) {
	$pedido_id = $this->getUser()->getAttribute("pedido_id");

	$factura = Doctrine::getTable("Factura")->findByPedidoId($pedido_id)->toArray();
	print_r($factura);
	if (count($factura) > 0) {
	    $this->factura_id = $factura[0]['id'];
	    $this->nombre = $factura[0]['name'];
	    $this->monto = $factura[0]['total'];
	}
    }

    public function executeDeleteIngrediente(sfWebRequest $request) {
	$pa = $request->getParameter("nombre");
	//  $this->getResponse()->setSlot("sidebar","veamos que tal");
	$this->nombre = $pa;
	$this->owner = "dueñño";
    }

    public function executeItemUpdated(sfWebRequest $request) {

	$pattern = $this->getUser()->getAttribute("pattern");
	//print_r($pattern);
	$this->pattern = $pattern;
	$this->texto = $pattern['text'];
	$this->img = $pattern['img'];
	$this->dir = $pattern['url'];
	// 
    }
    /**
     * Simple método para remover algun ingrediente,producto o subproducto.
     *
     * 
     * @param sfWebRequest $request
     * @return type
     */

    public function executeRemoveItem(sfWebRequest $request) {
	$prod = $request->getPostParameter('type');


	switch ($prod) {

	    case 'ingredientes':
		$ob = Doctrine_Core::getTable('Ingredientes')
		    ->findOneById($request->getPostParameter("id"));
		$resul = Doctrine_Core::getTable('Ingredientes')
			->deleteIngre($request->getPostParameter("id"));
		$pattern = $this->getFormatedHtmlRemove(array("meta" => 
		    array("titulo" => "ALGO",
			"extra" => "El ingrediente con nombre:" . $ob->getName() . '
			    fue eliminado'
		    ), "item" => "ingredientes"), $request);

		break;
	    case 'sub_producto':
		$this->getUser()->setFlash("item_deleted", "Sub Producto borrado");
		$ob = Doctrine_Core::getTable('SubProducto')
			->findOneById($request->getPostParameter("id"));
		$resul = Doctrine_Core::getTable('SubProducto')
			->removeSubProduct(array('sub_producto_id' => 
			    $request->getPostParameter("id")));
		$pattern = $this->getFormatedHtmlRemove(array("meta" => 
		    array("titulo" => "ALGO",
			"extra" =>
			"El sub_producto con nombre:" . $ob->getName() . ' 
			    fue eliminado'
		    ), "item" => "sub_producto"), $request);
		break;
	    case 'producto':
		$this->getUser()->setFlash("item_deleted", "Producto borrado");
		$ob = Doctrine_Core::getTable('Producto')
			->findOneById($request->getPostParameter("id"));
		$result = Doctrine::getTable("Producto")
			->changeStatus(1, $request->getPostParameter("id"));
		$pattern = $this->getFormatedHtmlRemove(array("meta" => 
		    array("titulo" => "ALGO",
			"extra" => "El producto con nombre:" . $ob->getName() . ' 
			    <br> fue eliminado'
		    ), "item" => "producto"), $request);


		break;
	    default:
		break;
	}
	$sesion = $this->getUser();
	$sesion->setAttribute("pattern", $pattern);
	return sfView::NONE;
    }

    public function executeItemDelete(sfWebRequest $request) {

	$pattern = $this->getUser()->getAttribute("pattern");
	//	print_r($pattern);
	$this->pattern = $pattern;
	$this->texto = $pattern['text'];
	$this->img = $pattern['img'];
	$this->dir = $pattern['url'];
	// 
    }

    
    public function executeMaquetadoFactura(sfWebRequest $request) {
	$sesion = $this->getUser();
	$this->pedido_id = $sesion->getAttribute("pedido");


    }

    public function executeEmitirFactura(sfWebRequest $request) {
	if ($request->isMethod(sfRequest::POST)) {
	    //array[subproducto]{name,producto_id,ingrediente_id}
	    //array[new_ingredientes]
	    return sfView::NONE;
	}
    }

    /**
     * Método encargado de la elaboración de la factura.
     * @param sfWebRequest $request
     * @return type
     */
    public function executePrepareFactura(sfWebRequest $request) {
	if ($request->isMethod(sfRequest::POST)) {
	    //array[subproducto]{name,producto_id,ingrediente_id}
	    //array[new_ingredientes]
	    $name = $request->getPostParameter("nombre");
	    $ruc = $request->getPostParameter("ruc");
	    $pedido_id = $request->getPostParameter("pedido_id");
	    $request->setParameter('nombre', $name);
	    $request->setParameter('ruc', $ruc);
	    $request->setParameter('pedido_id', $pedido_id);
	    $sesion = $this->getUser();
	    $sesion->getAttributeHolder()->remove('factura_id');
	    $sesion->getAttributeHolder()->remove('ts');
	    $sesion->setAttribute("pedido_id", $pedido_id);
	    $sesion->setAttribute("nombre", $name);
	    $sesion->setAttribute("ruc", $ruc);
	    $connection = Doctrine_Manager::connection();
	    $query = ' Select count(pd.sub_producto_id)as cant, pd.pedido_id, 
		sb.precio as precio_unitario ,sum(sb.precio) as precio_total ,
		pd.item as descripcion from pedidos_detalle pd 
		JOIN sub_producto sb ON pd.sub_producto_id=sb.id 
		JOIN pedidos p on p.id=pd.pedido_id 
		WHERE pd.pedido_id = :pedido_id and p.estado<>0 
		group by pedido_id,sub_producto_id';
	    $params = array(
		"pedido_id" => $pedido_id);
	    $statement = $connection->prepare($query);
	    $statement->execute($params);
	    $factura_pedido = $statement->fetchAll(PDO::FETCH_ASSOC);
	    $sesion->setAttribute("pedidos_detalle", $factura_pedido);
	    //   print_r($factura_pedido);
	    $html = $this->getController()
		    ->getPresentationFor($this->getModuleName(), 
				    'maquetadoFactura');
	    return $this->renderText($html);
	} else {
	    if ($request->hasParameter('pedido_id')) {

		$this->pedido_id = $request->getParameter("pedido_id");
	    } else {
		echo('no tiene pedido_');
	    }
	}
    }

    /**
     * Método encargado de actualizar las modificaciones
     * hechas en los ingredientes.
     * @param sfWebRequest $request
     * 
     */
    public function executeEditIngr(sfWebRequest $request) {
	$method = $this->getRoute()->getRequirements();
	$method = $method['sf_method'][0];
	if ($method == 'put') {
	    $add = Doctrine_Core::getTable('Ingredientes')
			->updateRow($request->getPostParameters());
	    $objec = Doctrine::getTable("Ingredientes")->createQuery("i")
		    ->select("i.name, i.owner_prod_id")
		    ->where("i.id=?", $request['id'])
		    ->fetchOne();


	    $productos = Doctrine_Core::getTable('Producto')
		    ->createQuery('p')
		    ->whereIn("p.id", $request
					->getPostParameter("owner_prod_id"))
		    ->fetchArray();
	    $produ = '';
	    foreach ($productos as $p => $v) {
		$produ.=',' . $v['name'];
	    }

	    $ingredientes = $request->getParameter("ingrediente");
	    $pattern = $this->getFormatedHtmlUpdate(array("meta" => 
					array("titulo" => "ALGO"
		    , "extra" => '<br>Nombre:' . $ingredientes['nombre'] . '
			<br>productos asociados:<br>' . substr($produ, 1)
		),
		"item" => "ingredientes"), $request);
	    $sesion = $this->getUser();
	    $sesion->setAttribute("pattern", $pattern);
	    $this->redirect($this->getModuleName() . '/itemUpdated');


	} else {
	    $this->ingrediente = $this->getRoute()->getObject();
	    $this->forward404Unless($this->ingrediente);
	    $this->id = $this->getRoute()->getObject()->getOwnerProdId();
	    $resutl = Doctrine::getTable("Ingredientes")
		    ->checkState($this->ingrediente->getId());
	    sfContext::getInstance()->getLogger()->err(" A EXPLOTAR!!");

	    if ($resutl === '1') {
		print ("EL INGREDIENTE NO SE ENCUENTRA ACTIVO");
		$this->getUser()->setFlash("item_inactivo", 
				    "No se encuentra en estado activo-");
		$this->
			redirect($this->getModuleName() . '/deleteIngrediente');
		error_log("enviar a otro lado");
		//$this->forward404Unless(false); 
	    } else {
		$this->produt = Doctrine_Core::getTable("Producto")
			->createQuery('p')
			->select('p.id,p.name')
			->where('p.state=?', 0)
			->execute();
	    }
	}
    }

    /**
     * Obtener todos los ingredientes que pertenece a un grupo de productos
     * @param sfWebRequest $request
     * @return type
     */
    public function executeGetIngr(sfWebRequest $request) {

	$parm = $request->getPostParameters();
	$this->logMessage('Mensaaaa');

	$id = $parm['product_id'];
	$produ = Doctrine_Core::getTable('Ingredientes')->createQuery('u')
		->where('owner_prod_id LIKE ?', '%' . $id . '%')
		->execute();
	$ar = array();
	foreach ($produ as $p) {
	    $id = $p->getId();
	    $name = $p->getName();
	    $ar[] = array('name' => $name, 'id' => $id);
	}


	$this->logMessage($this->produ);
	echo json_encode(array('ingredientes' => $ar));
	return sfView::NONE;
    }

    /**
     * Formulario de ingreso para los ingredientes
     * 
     * @param sfWebRequest $request
     */
    public function executeAddIngr(sfWebRequest $request) {
	$this->setLayout(false);
	sfConfig::set('sf_web_debug', false);
	$this->form = new SubProductoForm();
    }

    public function executeItemAdded(sfWebRequest $request) {
	$pattern = $this->getUser()->getAttribute("pattern");
	//print_r($pattern);
	$this->pattern = $pattern;
	$this->texto = $pattern['text'];
	$this->img = $pattern['img'];
	$this->dir = $pattern['url'];
	//   echo "aca va un layout genererico de item agregado";
	//     return sfView::NONE;
    }

    public function executeListPedidos(sfWebRequest $request) {
	$this->pager = new sfDoctrinePager('Pedidos', 15);
	$this->pager->setQuery(Doctrine_Core::getTable('Pedidos')
			->createQuery('p')
			->select("p.id, p.precio,p.estado")
			->where("p.estado=?", 0)
			->orderBy("p.fec_reg DESC")
	);
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();

    }

    public function executeAddIngrem(sfWebRequest $request) {
	if ($request->isMethod(sfRequest::POST)) {
	    $parm = $request->getPostParameters();

	    sfContext::getInstance()->getLogger()->err(var_export($parm));


	    $ingre = Doctrine_Core::getTable('Ingredientes')->insertRawRow($parm);

	    if (!empty($parm['ingredientes']["producto_id"])) {
		$productos = Doctrine_Core::getTable('Producto')
			->createQuery('p')
			->whereIn("p.id", $parm['ingredientes']["producto_id"])
			->fetchArray();
		$produ = '';
		foreach ($productos as $p => $v) {
		    $produ.=',' . $v['name'];
		}
	    } else {


		$produ = 'Sin productos asociados.';
	    }

	    $pattern = $this->getFormatedHmtlInsert(array("meta" => 
		array("img" => $array_prod['path']
		    , "extra" => '<br>Nombre:' . $parm['ingredientes']['name'] . '
			<br>Producto Asociados' . $produ),
		"item" => "ingredientes"
		    ), $request);
	    $sesion = $this->getUser();
	    $sesion->setAttribute("pattern", $pattern);

	    $this->redirect($this->getModuleName() . '/itemAdded');


//$this->redirect('crud/listIngr');l
	    // return sfView::NONE;
	} else {
	    $this->form = new IngredientesForm();
	}
    }

    /**
     * Simple helper para desplegar el usuario si la operación de 
     * eliminación fue exitosa.
     * @param type $datos
     * @param type $request

     */
    public function getFormatedHtmlRemove($datos, $request) {
	$uri = strval($request->getUri());
	$spl = explode($this->getActionName(), $uri);
	$base = $spl[0];

	$b = "";
	$a = "Se ha eliminado exitosamente el ";
	switch ($datos['item']) {
	    case 'ingredientes':
		$a.='ingrediente con los valores' . $datos['meta']['extra'];
		$url2 = $this->generateUrl('ingre_list');
		break;
	    case 'producto':
		$path = @$datos['meta']['img'];
		$a.='producto con los valores:<br> ' . $datos['meta']['extra'];
		$url2 = $this->generateUrl('list_productss');
		break;
	    case 'sub_producto':
		$a.="subproducto con los valores:<br>" . $datos['meta']['extra'];
		$url2 = $this->generateUrl("list_subprod");
		break;
	    default:
		break;
	}
	return array("text" => $a, 'link' => $b, 'img' => @$path, 'url' => $url2);
    }
    /**
     * 
     * Simple helper para desplegar al usuario si la operación
     * de actualización fue éxitosa.
     * 
     * @param type $datos
     * @param type $request
     * @return type
     */

    public function getFormatedHtmlUpdate($datos, $request) {

	$uri = strval($request->getUri());
	$spl = explode($this->getActionName(), $uri);
	$base = $spl[0];
	error_log($base);
	$b = "";
	$a = "Se ha actualizado exitosamente el ";
	//   $b="<a href=".$request->getUri().">lista</a>";
	switch ($datos['item']) {
	    case 'ingredientes':
		$a.='ingrediente con los valores' . $datos['meta']['extra'];
		$url2 = $this->generateUrl('ingre_list');
		break;
	    case 'producto':
		$path = $datos['meta']['img'];
		$a.='producto con los valores:<br> ' . $datos['meta']['extra'];
		$url2 = $this->generateUrl('list_productss');
		break;
	    case 'sub_producto':
		$a.="subproducto con los valores:<br>" . 
			$datos['meta']['extra'];
		$url2 = $this->generateUrl("list_subprod");
		break;
	    default:
		break;
	}
	//   error_log($b);
	return array("text" => $a, 'link' => $b, 'img' => @$path, 'url' 
							    => $url2);
    }

    /**
     * Simple helper para desplegar una plantilla al ususario indicando
     * si la operación de ingreso fue éxitosa.
     * @param type $datos
     * @param type $request
     * @return type
     */
    public function getFormatedHmtlInsert($datos, $request) {
	$uri = strval($request->getUri());
	$spl = explode($this->getActionName(), $uri);
	$base = $spl[0];
	error_log($base);
	$b = "";
	$a = "Se ha agregado exitosamente el ";
	//   $b="<a href=".$request->getUri().">lista</a>";
	switch ($datos['item']) {
	    case 'ingredientes':
		$a.='ingrediente con los valores' . $datos['meta']['extra'];
		$url2 = $this->generateUrl("ingre_list");
		break;
	    case 'producto':
		$path = $datos['meta']['img'];
		$a.='producto con los valores:<br> ' . 
			    $datos['titulo'];
		$url2 = $this->generateUrl('list_productss');
		break;
	    case 'sub_producto':
		$a.="subproducto con los valores:<br>" . 
				$datos['meta']['extra'];
		$url2 = $this->generateUrl('list_subprod');
		break;
	    default:
		break;
	}
	//   error_log($b);
	return array("text" => $a, 'link' => $b, 'img' => @$path, 'url'
						    => $url2);
    }

    /**
     * Obtener una Lista de los productos en estado activo.
     * 
     * @param sfWebRequest $request
     */
    public function executeListProduct(sfWebRequest $request) {

	$this->pager = new sfDoctrinePager('Producto', 15);
	$this->pager->setQuery(Doctrine_Core::getTable('Producto')
			->createQuery('p')
			->where("p.state=?", 0)
	);
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
	$connection = Doctrine_Manager::connection();
	$query = ' select tm.producto_id from (
		    select producto_id,count(*)as total ,
	    count(case when state=0 then 1 end) as valido, 
	    count(case when state=1 then 1 end) as novalido
	    from sub_producto group by producto_id 
		having novalido=total) as tm ';
	$statement = $connection->prepare($query);
	$statement->execute();
	$with_no_sub = $statement->fetchAll(PDO::FETCH_ASSOC);
	$this->array_with_no_sub = array();
	foreach ($with_no_sub as $k => $v) {

	    $this->array_with_no_sub[] = $v['producto_id'];
//	$original_array = $sf_data->getRaw('array_with_no_sub');
	}

	$query = ' select id,state from producto where id 
	    not in (select producto_id from sub_producto)';
	$statement = $connection->prepare($query);
	$statement->execute();
	$with_no_sub_ = $statement->fetchAll(PDO::FETCH_ASSOC);

	foreach ($with_no_sub_ as $k => $v) {

	    $this->array_with_no_sub[] = $v['id'];
	}


    }

    public function executeEditProd(sfWebRequest $request) {
	$method = $this->getRoute()->getRequirements();
	$method = $method['sf_method'][0];
	if ($method == 'put') {


	    //      print_r($request->getPostParameters());
	    $array_files = $request->getFiles('producto');
	    $image = $array_files['image'];
	    $image_view = '';
	    if ($image['size'] > 0) {

		if ($request->getPostParameter("old_path") !== 'no_img') {

		    $old_image = sfConfig::get('sf_upload_dir') . 
			    substr($request->getPostParameter("old_path"), 8);
		    unlink($old_image);
		}
		ob_start();
		$img = new sfImage($image['tmp_name'], $image['type']);
		$real_ext = explode('/', $image['type']);
		$img->thumbnail(150, 150);
		$img->setQuality(100);
		$path = sfConfig::get('sf_upload_dir') . 
			'/producto/producto_' . $request
			->getPostParameter("producto_id");
		$img->saveAs($path . '.' . $real_ext[1]);
		ob_clean();
		$array_prod = array();
		$array_prod['product_id'] = $request->getPostParameter("producto_id");
		$array_prod['path'] = "/uploads/producto/producto_" . 
			$request->getPostParameter("producto_id") . '.' . 
			$real_ext[1];
		$image_view = $array_prod['path'];
		if ($request->getPostParameter("old_path") == 'no_img')
		    Doctrine_Core::getTable('ProductoImages')
		    ->insertImageProduct($array_prod);
		else
		    $producto_id = Doctrine_Core::getTable('ProductoImages')
			->replaceImageProduct($array_prod);
	    }


	    Doctrine_Core::getTable('Producto')->updateProduct(array('name' =>
			$request->getPostParameter("producto_name"),
		"id" => $request->getPostParameter("producto_id")));

	    $pattern = $this->getFormatedHtmlUpdate(array("meta" => 
					array("titulo" => "ALGO"
		    , "extra" => '<br>Nuevo Nombre:' . $request
				    ->getPostParameter("producto_name")
		    , "img" => $image_view
		),
		"item" => "producto"), $request);

	    $sesion = $this->getUser();
	    $sesion->setAttribute("pattern", $pattern);
	    $this->redirect($this->getModuleName() . '/itemUpdated');
	    //   return sfView::NONE;
	}
	else {
	    $this->producto = Doctrine::getTable("Producto")
		    ->findOneById($request->getParameter("id"));
	    $image = Doctrine::getTable("ProductoImages")
		    ->findOneByProductId($request->getParameter("id"));
	    $this->image = false;
	    if ($image) {
		$this->image = $image;
	    }
	}
    }

    public function executeDeleteIngr(sfWebRequest $request) {

	//echo '<pre>';
	// print_r($request->getPostParameters());
	// echo '<pre>';
	$view = $this->context->getController()->getView('crud', 'itemUpdated', 'Success');
	$view->setTemplate('holaSuccess.php');
	$view->execute();
	$view->getAttributeHolder()->add("asda");
	$result = $view->render();
	echo $result;

	return sfView::NONE;
    }

    public function executeRegister(sfWebRequest $request) {
	print_r($request->getPostParameters());
	return sfView::NONE;
    }

    public function executeCreate(sfWebRequest $request) {
	$this->forward404Unless($request->isMethod(sfRequest::POST));
	$this->form = new SubProductoForm();
	$this->processForm($request, $this->form);
	$this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
	$this->forward404Unless($sub_producto = Doctrine_Core::getTable('SubProducto')
		->find(array($request->getParameter('id'))), sprintf('Object sub_producto does not exist (%s).', 
			$request->getParameter('id')));
	$this->form = new SubProductoForm($sub_producto);
    }

    public function executeUpdate(sfWebRequest $request) {
	$this->forward404Unless($request->isMethod(sfRequest::POST) || $request
		->isMethod(sfRequest::PUT));
	$this->forward404Unless($sub_producto = Doctrine_Core::getTable('SubProducto')
		->find(array($request->getParameter('id'))), sprintf('Object sub_producto does not exist (%s).', $request->getParameter('id')));
	$this->form = new SubProductoForm($sub_producto);
	$this->processForm($request, $this->form);
	$this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
	$request->checkCSRFProtection();

	$this->forward404Unless($sub_producto = Doctrine_Core::getTable('SubProducto')->find(array($request->getParameter('id'))), sprintf('Object sub_producto does not exist (%s).', $request->getParameter('id')));
	$sub_producto->delete();

	$this->redirect('crud/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
	$form->bind($request
		    ->getParameter($form->getName()), $request->getFiles($form->getName()));
	if ($form->isValid()) {
	    $sub_producto = $form->save();

	    $this->redirect('crud/edit?id=' . $sub_producto->getId());
	}
    }

    public function executeLoginUser(sfWebRequest $request) {

	if ($request->isXmlHttpRequest()) {
	    error_log("ajax");
	}
	error_log("adas");
	echo "asdas";
	return sfView::NONE;
    }

    public function executeAnotherLogin(sfWebRequest $request) {
	//  echo 'algo';
	sfContext::getInstance()->getLogger()->err("asda");

	if ($request->isXmlHttpRequest()) {
	    $this->getResponse()
		    ->setHttpHeader('Content-Type', 'application/json');
	    $user = $request->getPostParameter("user");
	    $pass = $request->getPostParameter("pass");

	    $response = array();
	    if ($user != 'admin' || $pass != 'admin') {

		$response['status'] = 'ER';
		$response['msg'] = 'El usuario o el password es invalido';
	    } else {
		$response['status'] = 'OK';
		$response['msg'] = 'Usuario reconocido';
		$this->getUser()->setAttribute("logged", true);
	    }
	}
	return $this->renderText(json_encode($response));
    }

    public function executeUpdateStatus(sfWebRequest $request) {
	$pedido_id = $request->getPostParameter('pedido_id');
	$type_state = $request->getPostParameter('state');
	error_log($pedido_id);
	$this->pr = Doctrine::getTable("Pedidos")
		->updateStatus($pedido_id, $type_state);
	$this->executeInsertNotification($pedido_id, $type_state);
	return $this->renderText("Actualizacion exitosa");
    }

    public function executeListPagados(sfWebRequest $request) {

	$this->pager = new sfDoctrinePager('Pedidos', 15);
	$this->pager->setQuery(Doctrine_Core::getTable('Pedidos')
			->createQuery('p')
			->select("p.id, p.precio,p.estado")
			->where("p.estado<>?", 0)
			->orderBy("p.id desc")
	);
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
    }

    public function executeListFacturas(sfWebRequest $request) {

	$this->pager = new sfDoctrinePager('Factura', 15);
	$this->pager->setQuery(Doctrine_Core::getTable('Factura')
			->createQuery('f')
			->select("f.id, f.ts,f.total,f.pedido_id")
			->orderBy("f.ts desc")
	);
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
    }

    public function executeRetrieveCantPedidoProd(sfWebRequest $request) {
	
    }

    public function executeSaveFactura(sfWebRequest $request) {
	/*
	 *  select PD.id,PD.pedido_id, (sum(SP.precio)) as sub_total, 
	 * (sum(SP.precio)*10)/100 as IVA  from pedidos_detalle PD 
	 * JOIN sub_producto SP on SP.id=PD.sub_producto_id  where PD.pedido_id=32
	 */
	$nombre = $request->getPostParameter("name");
	$ruc = $request->getPostParameter("ruc");
	$datos = array();
	$datos['nombre'] = $nombre;
	$datos['ruc'] = $ruc;
	$pedido_id = $request->getPostParameter("pedido_id");
	$connection = Doctrine_Manager::connection();
	$query = ' select PD.id,PD.pedido_id, (sum(SP.precio)) as sub_total, 
	    (sum(SP.precio)*10)/100 as iva  from pedidos_detalle PD JOIN 
	    sub_producto SP on SP.id=PD.sub_producto_id  where PD.pedido_id=:pedido_id';
	$params = array(
	    "pedido_id" => $pedido_id);
	$statement = $connection->prepare($query);
	$statement->execute($params);
	$factura_pedido = $statement->fetch(PDO::FETCH_ASSOC);
	$factura_pedido = array_merge($factura_pedido, $datos);
	$factura_id = Doctrine::getTable("Factura")->insertRow($factura_pedido);
	$this->updateStatusFuc($pedido_id, 2);
	return sfView::NONE;
    }

    public function executeCountProdMonth(sfWebRequest $request) {

	$month = $request->getPostParameter('month', '0');
	$sub_product = $request->getPostParameter("sub_prod_id");
	$query = "select group_concat(sub_producto_id),pedido_id,
	    fec_reg,trim(pr.name) as pr_name, trim(sub.name) as name_sub
	    from pedidos_detalle pd left join pedidos p on p.id=pd.pedido_id 
	    join (sub_producto sub  left join producto pr 
	    on pr.id=sub.producto_id)on sub.id=pd.sub_producto_id
	    where extract(month from fec_reg) =:month 
	    group by pedido_id having group_concat(sub_producto_id)
	    like :prod_id";
	$connection = Doctrine_Manager::connection();

	$params = array(
	    "month" => $month + 1,
	    "prod_id" => '%' . $sub_product . '%');
	$statement = $connection->prepare($query);
	$statement->execute($params);
	$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

	$object = Doctrine::getTable("SubProducto")->createQuery("i")
		->select("i.name")
		->where("i.id=?", $sub_product)
		->fetchOne();

	$name = $datos[0]['name_sub'];
	$table = '<table style="width: 400px"><thead><th>ID</th>
	    <th>Fec de pedido</th><th>Pedidos:' . count($datos) . '
		</th><th>Prod:' . $object->getName() . '</th></thead>';
	$table.='<tbody>';
	foreach ($datos as $k => $v) {
	    $table.='<tr><td>' . $v['pedido_id'] . '</td><td>' . $v['fec_reg'] .
		    '</td><td><a id="dt2" style="cursor:pointer;" 
			prod="' . $v['pedido_id'] . '">Ver mas detalle </td></tr>';
	}
	$table.='</tbody></table>';

	$this->getResponse()->setHttpHeader('Content-Type', 'text/html');
	return $this->renderText($table);
    }

    function executeRetrievePedidosByMonth(sfWebRequest $request) {

	$month = $request->getParameter('month', '0');
	$months_split = preg_split('/-/', $month);
	$month = $months_split[0];

	// $query="Select count(sub_producto_id) as cantidad,sub_producto_id,
	// trim(sp.name)as sub_prod_name ,trim(pr.name) as prod_name 
	// from pedidos_detalle pd left join pedidos p on (p.id=pd.pedido_id)
	// right join  (sub_producto sp left join producto pr 
	// on pr.id=sp.producto_id)  on (sp.id=pd.sub_producto_id)
	//  where EXTRACT(month from fec_reg) =:month and 
	//  EXTRACT(year from fec_reg)= 2013  group by pd.sub_producto_id";
	$query = "select id,fec_reg from pedidos where 
		extract(month from fec_reg)=:month";
	$connection = Doctrine_Manager::connection();

	$params = array(
	    "month" => $month);
	$statement = $connection->prepare($query);
	$statement->execute($params);
	$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

	$table = '<table style="width: 400px"><thead><th>ID</th>
	    <th>Fec de pedido</th><th>Pedidos:' . count($datos) . '
		</th><th>Mes:' . $month . '</th></thead>';
	$table.='<tbody>';
	foreach ($datos as $k => $v) {
	    $table.='<tr><td>' . intval($k + 1) . '</td><td>' . $v['fec_reg'] . '
		</td><td><a id="dt1" style="cursor:pointer;"  prod="' . 
			    $v['id'] . '">Ver mas detalle </td></tr>';
	}
	$table.='</tbody></table>';

	$this->getResponse()->setHttpHeader('Content-Type', 'text/html');
	return $this->renderText($table);
    }

    function executeStats(sfWebRequest $request) {

	$connection = Doctrine_Manager::getInstance()->getCurrentConnection();
	$query = "select count(id) AS conta, 
	    CONCAT_WS('-',LPAD(EXTRACT(MONTH FROM FEC_REG),2,'0'),
	    EXTRACT(YEAR FROM FEC_REG)) as mes_anho 
	    from pedidos where extract(YEAR from fec_reg)=2013 
	    group by  EXTRACT(MONTH from fec_reg),extract(YEAR FROM FEC_REG) ";
	$this->matrix = $connection->fetchAssoc($query);
	$connec = Doctrine_Manager::getInstance()->getCurrentConnection();
	$query2 = "select id,fec_reg from pedidos where 
		extract(month from fec_reg)=08";
	$this->pedidos = $connec->fetchAssoc($query2);
    }

    function executeStastsOff(sfWebRequest $request) {
	
    }

    function updateStatusFuc($pedido_id, $type_state) {
	$this->pr = Doctrine::getTable("Pedidos")
		    ->updateStatus($pedido_id, $type_state);
	    $this->executeInsertNotification($pedido_id, $type_state);
    }

    public function executeMonthRetrieve(sfWebRequest $request) {

	$month = $request->getParameter('month', '0');

	/*
	 * 
	 * select m.sub_producto_id,m.sub_prod_name,
	 * m.prod_name count(m.sub_producto_id) as cantidad 
	 * from (select count(sub_producto_id) as sub_producto,sub_producto_id,
	 *  pedido_id,trim(sp.name)as sub_prod_name ,trim(pr.name) as prod_name 
	 * from pedidos_detalle pd left join pedidos p on (p.id=pd.pedido_id)
	 *  right join  (sub_producto sp left join producto pr 
	 * on pr.id=sp.producto_id)  on (sp.id=pd.sub_producto_id) 
	 * where EXTRACT(month from fec_reg) =09 and 
	 * EXTRACT(year from fec_reg)= 2013  
	 * group by pd.pedido_id,sub_producto_id) as m 
	 * group by m.sub_producto_id;
	 * 
	 */
	$query = "select m.sub_producto_id,m.sub_prod_name,m.prod_name, 
	    sum(m.sub_producto) as cantidad from (select count(sub_producto_id)
	    as sub_producto,sub_producto_id, pedido_id,trim(sp.name)as sub_prod_name
	    ,trim(pr.name) as prod_name from pedidos_detalle pd left join
	    pedidos p on (p.id=pd.pedido_id) right join  (sub_producto sp left join 
			    producto pr on pr.id=sp.producto_id) 
			    on (sp.id=pd.sub_producto_id) 
			    where EXTRACT(month from fec_reg) =:month and 
			    EXTRACT(year from fec_reg)= 2013  group by
			    pd.pedido_id,sub_producto_id) as m group by
			    m.sub_producto_id";
	$connection = Doctrine_Manager::connection();

	$params = array(
	    "month" => $month + 1);
	$statement = $connection->prepare($query);
	$statement->execute($params);
	$datos = $statement->fetchAll(PDO::FETCH_ASSOC);


	$this->getResponse()->setHttpHeader('Content-Type', 'application/json');
	return $this->renderText(json_encode($datos));
    }

    public function executeVerFacturaPdf(sfWebRequest $request) {
	
    }

    public function executeVerDetallePedido(sfWebRequest $request) {

	$this->pedido = $this->getRoute()->getObject();

	$this->detalles = Doctrine::getTable('PedidosDetalle')
		->findByPedidoId($this->pedido->getId())->toArray();
	$sub_prod_precio = array();
	foreach ($this->detalles as $k => $v) {
	    $sub_prod = Doctrine::getTable('SubProducto')
		    ->findOneById($v['sub_producto_id'])->toArray();
	    $sub_prod_precio[$v['sub_producto_id']] = array('precio' => 
		$sub_prod['precio'],
		'item' => $v['item']);
	}
	$this->precios = $sub_prod_precio;
    }

    public function executeInsertNotification($pedido_id, $state) {
	$this->notificacion = Doctrine::getTable('Notificacion')
		->insertReq($pedido_id, $state);
	return sfView::NONE;
    }

    public function executeOpenModal(sfWebRequest $request) {
	$ped = $request->getPostParameter("pedido_id");
	$detalles = Doctrine::getTable('PedidosDetalle')
		->findByPedidoId($ped)->toArray();
	$dta = '<table><thead><tr><th>Item</th><th>Precio</th></tr></thead><tbody>';
	foreach ($detalles as $k => $v) {
	    $sub_prod = Doctrine::getTable('SubProducto')
		    ->findOneById($v['sub_producto_id'])->toArray();
	    $sub_prod_precio[$v['sub_producto_id']] = array('precio' => 
		$sub_prod['precio'],
		'item' => $v['item']);
	    $dta.='<tr><td>' . $v['item'] . '</td><td>' . $sub_prod['precio'] . '
		</td></tr>';
	}

	$dta.='</tbody></table>';
	return $this->renderText('<div class="modal" id="modal2">
            <div class="content">
            <a class="close switch" gumby-trigger="|#modal2">
	    <i class="icon-cancel" /></i></a>
            <div class="row">
            <div class="ten columns centered text-center">
                        <h4>PEDIDO:' . $ped . '</h4>
                  <div id="tb">' . $dta . '</div>
            </div>
            </div>
            </div>
            </div>');
    }

    public function executeOpenModalProduct(sfWebRequest $request) {
	$ped = $request->getPostParameter("pedido_id");
	$detalles = Doctrine::getTable('PedidosDetalle')->findByPedidoId($ped)->toArray();
	$dta = '<table><thead><tr><th>Item</th><th>Precio</th></tr></thead><tbody>';
	foreach ($detalles as $k => $v) {
	    $sub_prod = Doctrine::getTable('SubProducto')->findOneById($v['sub_producto_id'])->toArray();
	    $sub_prod_precio[$v['sub_producto_id']] = array('precio' => $sub_prod['precio'],
		'item' => $v['item']);
	    $dta.='<tr><td>' . $v['item'] . '</td><td>' . $sub_prod['precio'] . '</td></tr>';
	}

	$dta.='</tbody></table>';
	return $this->renderText('<div >
            <div class="content">
            <a class="close switch" ><i class="icon-cancel" /></i></a>
            <div class="row">
            <div class="ten columns centered text-center">
                        <h4>PEDIDO:' . $ped . '</h4>
                  <div id="tb">' . $dta . '</div>
            </div>
            </div>
            </div>
            </div>');
    }

}