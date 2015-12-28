<?php

/**
 * Orden form base class.
 *
 * @method Orden getObject() Returns the current form's model object
 *
 * @package    fit2go
 * @subpackage form
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOrdenForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'usuario_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'placedby_id'  => new sfWidgetFormInputText(),
      'direccion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('direccion'), 'add_empty' => false)),
      'monto'        => new sfWidgetFormInputText(),
      'status'       => new sfWidgetFormInputText(),
      'autorizacion' => new sfWidgetFormInputText(),
      'referencia'   => new sfWidgetFormInputText(),
      'avsresultado' => new sfWidgetFormInputText(),
      'cvv2'         => new sfWidgetFormInputText(),
      'mensajeerror' => new sfWidgetFormInputText(),
      'cupon_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('cupon'), 'add_empty' => true)),
      'manual'       => new sfWidgetFormInputCheckbox(),
      'pago'         => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuario_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'placedby_id'  => new sfValidatorInteger(),
      'direccion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('direccion'))),
      'monto'        => new sfValidatorPass(),
      'status'       => new sfValidatorString(array('max_length' => 20)),
      'autorizacion' => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'referencia'   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'avsresultado' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'cvv2'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'mensajeerror' => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'cupon_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('cupon'), 'required' => false)),
      'manual'       => new sfValidatorBoolean(array('required' => false)),
      'pago'         => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('orden[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Orden';
  }

}
