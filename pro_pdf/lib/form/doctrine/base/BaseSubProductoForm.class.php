<?php

/**
 * SubProducto form base class.
 *
 * @method SubProducto getObject() Returns the current form's model object
 *
 * 
 *  'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'producto_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Producto'), 'add_empty' => false)),
      'ingredientes_id'=>new sfWidgetFormDoctrineChoice(array('model'=>'Ingredientes','add_empty'=>false,'multiple'=>true,'expanded'=>true,
      'query'=>Doctrine_Query::create()->select('i.*')->from("ingredientes i")->where("i.state='T'")))));
 * @package    comandas
 * @subpackage form
 * @author     Kiquetal
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSubProductoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'producto_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Producto'), 'add_empty' => false,'table_method'=>'getAvailable'))));
 
    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'producto_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Producto'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sub_producto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubProducto';
  }

}
