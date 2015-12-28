<?php

/**
 * Itemsorden form base class.
 *
 * @method Itemsorden getObject() Returns the current form's model object
 *
 * @package    fit2go
 * @subpackage form
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseItemsordenForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'orden_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('orden'), 'add_empty' => false)),
      'menu_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('menu'), 'add_empty' => true)),
      'plato_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('plato'), 'add_empty' => true)),
      'cantidad'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'orden_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('orden'))),
      'menu_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('menu'), 'required' => false)),
      'plato_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('plato'), 'required' => false)),
      'cantidad'   => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('itemsorden[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Itemsorden';
  }

}
