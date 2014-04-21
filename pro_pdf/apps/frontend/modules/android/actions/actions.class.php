<?php

/**
 * android actions.
 *
 * @package    comandas
 * @subpackage android
 * @author     Kiquetal
 *
 */
class androidActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
	$this->forward('default', 'module');
    }

    public function executeWriteOrders(sfWebRequest $request) {

	return sfView::NONE;
    }

    public function executeDameProductos(sfWebRequest $request) {

	$productos = Doctrine::getTable("Producto")->createQuery("a")->execute();
	$connection = Doctrine_Manager::connection();
	$query = 'select m.id,m.name as nombre_Producto,group_concat(d.id)
	    as idSub, group_concat(d.precio) as precios_subProductos,
	    group_concat(d.name) as sub_productos from producto m join 
	    sub_producto d on d.producto_id=m.id where m.state=0 and d.state=0
	    group by m.name';
	$statement = $connection->execute($query);
	$m = $statement->execute();
	$men = $statement->fetchAll(PDO::FETCH_ASSOC);
	$datos = array();
	foreach ($men as $k => &$v) {
	    foreach ($v as $key => &$val) {
		if ($key == 'precios_subProductos' 
		    || $key == 'sub_productos' || $key == 'idSub')
		    $val = explode(',', $val);
	    }
	    $datos[] = $v;
	}
	return $this->renderText(json_encode($datos));
    }

    public function executeDameLogin(sfWebRequest $request) {

	$user = $request->getPostParameter("username");
	$pass = $request->getPostParameter("userpass");

	if ($user == 'admin' && $pass == 'admin')
	    return $this->renderText("Accept");
	else
	    return $this->renderText("Error");
    }

    public function executeLogin(sfWebRequest $request) {
	$logPath = sfConfig::get('sf_log_dir') . '/debug_chat.log';
	$logger = new sfFileLogger(new sfEventDispatcher(), array('file' => $logPath));
	$logger->info("Info");
	sfConfig::set('sf_web_debug', false);
	$this->logMessage('Mensaaaa' . $request->getPostParameters());
	$logger->info(var_export($request->getPostParameters(), true));
	$user = $request->getPostParameter("username");
	$pass = $request->getPostParameter("userpass");
	error_log("usuraio" . $user);
	error_log("password" . $pass);
	if ($user == 'admin' && $pass == 'admin')
	    return $this->renderText("Accept");
	else
	    return $this->renderText("Error");
    }

    public function executeObtenerPedidosActuales(sfWebRequest $request) {

	date_default_timezone_set('America/Asuncion');
	$_10_minutes = date("Y-m-d H:i:s", mktime(date('H'), (date('i') - 20),
		        date('s'), date('m'), date('d'), date('Y')));

	// echo $_10_minutes;
	$connection = Doctrine_Manager::connection();
	$query = 'Select p.id, p.mesa_id,p.estado, p.fec_reg , 
	    group_concat(pd.item) as detalle,UNIX_TIMESTAMP(fec_reg) as ts 
	    from pedidos p JOIN pedidos_detalle pd on p.id=pd.pedido_id 
	    where UNIX_TIMESTAMP(fec_reg) > "' . strtotime($_10_minutes) . '"
		group by p.id order by fec_reg DESC';
	sfConfig::set('sf_web_debug', false);
	$statement = $connection->execute($query);
	$m = $statement->execute();
	$pedidos = $statement->fetchAll(PDO::FETCH_ASSOC);
	$datos = array();
	$dt = new \DateTime();
	foreach ($pedidos as $k => $v) {

	    $dt->setTimestamp($v['ts']);

	    $datos[] = array('estado' => $v['estado'],
		'id' => $v['id'],
		'fecha' => $dt->format(\DateTime::ISO8601),
		'ts' => $v['ts'],
		'mesa_id' => $v['mesa_id'],
		'detalle' => $v['detalle']);
	}
	if (count($datos) < 1) {
	    $datos[]['N'] = 'VACIO';
	}
	return $this->renderText(json_encode($datos));
    }

    public function executeGetDetails(sfWebRequest $request) {
	$connection = Doctrine_Manager::getInstance()
		        ->getCurrentConnection()->getDbh();
	sfConfig::set('sf_web_debug', false);
	/*   $query=' Select i.name from sub_producto_ingredientes sp join ingredientes i 
	  on i.id=sp.ingredientes_id

	  where sp.sub_producto_id = :sub_producto_id
	  ';
	 * 
	 */
	$query = ' select i.name, sp.ingredientes_id,pi.path_img, p.id 
	    from sub_producto_ingredientes sp right join (sub_producto sub left 
	    join (producto p  left join producto_images pi on pi.product_id=p.id)
	    on p.id=sub.producto_id)  on sp.sub_producto_id =sub.id    
	    left join ingredientes i ON i.id=sp.ingredientes_id    
	    where sub.id= :sub_producto_id';
	$params = array(
	    "sub_producto_id" => $request->getParameter("sub_producto_id"));   //$request->getPostParemeter("sub_producto_id"));
	$statement = $connection->prepare($query);
	$statement->execute($params);
	$para_notificar['ingredientes'] = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $this->renderText(json_encode($para_notificar));
    }

    public function executePedidosNotificacion(sfWebRequest $request) {
	$connection = Doctrine_Manager::connection();

	$query = 'select group_concat(d.item) as items,n.id,d.pedido_id,n.text,
	    n.state as state from notificacion n join pedidos_detalle d 
	    ON d.pedido_id=n.pedido_id group by n.pedido_id,n.id;';
	sfConfig::set('sf_web_debug', false);
	$statement = $connection->execute($query);
	$m = $statement->execute();
	$para_notificar = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $this->renderText(json_encode($para_notificar));
    }

    public function executePedidos(sfWebRequest $request) {

//      error_log($request->getRequestParameters());
	// $this->logMessage('Mensaaaa'.$request->getPostParameters());      


	$pedidos = json_decode($request->getPostParameter("pedido"), true);

	$id_pedidos = Doctrine_Core::getTable('Pedidos')->insertPedido();
	$precio = 0;
	foreach ($pedidos as $k => $v) {

	    $precio+=Doctrine_Core::getTable('PedidosDetalle')
		                  ->insertPedidoDetalle($v, $id_pedidos);
	}

	Doctrine_Core::getTable('Pedidos')->updatePrecioPedido($precio, $id_pedidos);
	return $this->renderText($precio);
    }

    public function executeLastTenPedidos(sfWebRequest $request) {

	$last_pedidos = array();
	$connection = Doctrine_Manager::connection();
	$query = 'select group_concat(d.item) as items,p.id,p.mesa_id from 
	    pedidos p join pedidos_detalle d on p.id=d.pedido_id
	    where p.estado=1 group by p.id order by p.fec_can desc limit 10';
	sfConfig::set('sf_web_debug', false);
	$statement = $connection->execute($query);
	$m = $statement->execute();
	$last_cancel = $statement->fetchAll(PDO::FETCH_ASSOC);
	$last_pedidos['entregados'] = $last_cancel;
	$query = 'select group_concat(d.item) as items,p.id,p.mesa_id from 
	    pedidos p join pedidos_detalle d on p.id=d.pedido_id
	    where p.estado=0 group by p.id order by p.id desc limit 10';
	sfConfig::set('sf_web_debug', false);
	$statement = $connection->execute($query);
	$m = $statement->execute();
	$last_pending = $statement->fetchAll(PDO::FETCH_ASSOC);
	$last_pedidos['pendientes'] = $last_pending;
	$query = 'select group_concat(d.item) as items,p.id,p.mesa_id from
	       pedidos p join pedidos_detalle d on p.id=d.pedido_id 
	       where p.estado=2 group by p.id order by p.fec_can desc limit 10';
	sfConfig::set('sf_web_debug', false);
	$statement = $connection->execute($query);
	$m = $statement->execute();
	$last_paid = $statement->fetchAll(PDO::FETCH_ASSOC);
	$last_pedidos['pagados'] = $last_paid;



	return $this->renderText(json_encode($last_pedidos));
    }

}
