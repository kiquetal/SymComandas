<?php

/**
 * Ingredientes form base class.
 *
 * @method Ingredientes getObject() Returns the current form's model object
 *
 * @package    comandas
 * @subpackage form
 * @author     Kiquetal
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseIngredientesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInputText(),
      'producto_id' => new sfWidgetFormDoctrineChoice(array('model'=>'Producto','add_empty'=>false,'multiple'=>true,'expanded'=>true,'table_method'=>'getAvailable')),

    ));

    $this->setValidators(array(
      'id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 30, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ingredientes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ingredientes';
  }

}
