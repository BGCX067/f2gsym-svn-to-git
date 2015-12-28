<?php

/**
 * Itemsmenu form base class.
 *
 * @method Itemsmenu getObject() Returns the current form's model object
 *
 * @package    fit2go
 * @subpackage form
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseItemsmenuForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'menu_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Menu'), 'add_empty' => false)),
      'plato_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Plato'), 'add_empty' => false)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'menu_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Menu'))),
      'plato_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Plato'))),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('itemsmenu[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Itemsmenu';
  }

}
