<?php

/**
 * NotificacionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class NotificacionTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object NotificacionTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Notificacion');
    }
    public function insertReq($pedido_id,$state)
    {
        $connection = Doctrine_Manager::getInstance()->getCurrentConnection()->getDbh();
        $query = "INSERT INTO notificacion (seen,text,pedido_id,state) VALUES( ? , ?, ?,? );";
        $statement = $connection->prepare($query);
        $statement->bindValue(1, 0);
        if ($state==1)
        {
        $statement->bindValue(2, "Pedido nro:". "{$pedido_id}" . " listo para ser entregado");
        }
        else
        {
            $statement->bindValue(2, "Pedido nro:". "{$pedido_id}" . " fue cancelado");
         
        
        }
        $statement->bindValue(3,$pedido_id);
           $statement->bindValue(4, $state);
        $statement->execute();    
    }
    
    
}