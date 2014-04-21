<?php

/**
 * SubProductoIngredientes form base class.
 *
 * @method SubProductoIngredientes getObject() Returns the current form's model object
 *
 * @package    comandas
 * @subpackage form
 * @author     Kiquetal
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSubProductoIngredientesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sub_producto_id' => new sfWidgetFormInputHidden(),
      'ingredientes_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'sub_producto_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('sub_producto_id')), 'empty_value' => $this->getObject()->get('sub_producto_id'), 'required' => false)),
      'ingredientes_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('ingredientes_id')), 'empty_value' => $this->getObject()->get('ingredientes_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sub_producto_ingredientes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubProductoIngredientes';
  }

}
