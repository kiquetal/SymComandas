<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Ingredientes', 'doctrine');

/**
 * BaseIngredientes
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $owner_prod_id
 * @property string $state
 * @property timestamp $fec_upd
 * 
 * @method integer      getId()            Returns the current record's "id" value
 * @method string       getName()          Returns the current record's "name" value
 * @method string       getOwnerProdId()   Returns the current record's "owner_prod_id" value
 * @method string       getState()         Returns the current record's "state" value
 * @method timestamp    getFecUpd()        Returns the current record's "fec_upd" value
 * @method Ingredientes setId()            Sets the current record's "id" value
 * @method Ingredientes setName()          Sets the current record's "name" value
 * @method Ingredientes setOwnerProdId()   Sets the current record's "owner_prod_id" value
 * @method Ingredientes setState()         Sets the current record's "state" value
 * @method Ingredientes setFecUpd()        Sets the current record's "fec_upd" value
 * 
 * @package    comandas
 * @subpackage model
 * @author     Kiquetal
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIngredientes extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ingredientes');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('owner_prod_id', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('state', 'string', 1, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'default' => 'F',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('fec_upd', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}