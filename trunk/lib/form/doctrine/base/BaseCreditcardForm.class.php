<?php

/**
 * Creditcard form base class.
 *
 * @method Creditcard getObject() Returns the current form's model object
 *
 * @package    fit2go
 * @subpackage form
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCreditcardForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'usuario_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'numero'           => new sfWidgetFormInputText(),
      'nombre'           => new sfWidgetFormInputText(),
      'codigo'           => new sfWidgetFormInputText(),
      'fechavencimiento' => new sfWidgetFormInputText(),
      'tipo'             => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuario_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'numero'           => new sfValidatorInteger(),
      'nombre'           => new sfValidatorString(array('max_length' => 80)),
      'codigo'           => new sfValidatorInteger(),
      'fechavencimiento' => new sfValidatorString(array('max_length' => 7)),
      'tipo'             => new sfValidatorInteger(),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('creditcard[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Creditcard';
  }

}
