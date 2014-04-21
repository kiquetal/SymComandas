<?php

/**
 * PedidosDetalleTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PedidosDetalleTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PedidosDetalleTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PedidosDetalle');
    }
    public function insertPedidoDetalle($p,$pedido_id)
    {
        
        $precio=$p['precio'];
        $id_subprod=$p['idSubProducto'];
        $prod=$p['producto'];
        $subprod_label=$p['subProducto'];
        $connection = Doctrine_Manager::getInstance()->getCurrentConnection()->getDbh();
        $query=" INSERT into pedidos_detalle(pedido_id,item,sub_producto_id)
                      values(?,?,?)";
       $statment=$connection->prepare($query);
       $statment->bindValue(1, $pedido_id);
       $statment->bindValue(2, $prod.' '.$subprod_label);
       $statment->bindValue(3,$id_subprod);
       $statment->execute();  
       return $precio; 
    }
}