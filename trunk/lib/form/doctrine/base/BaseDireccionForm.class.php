<?php

/**
 * Direccion form base class.
 *
 * @method Direccion getObject() Returns the current form's model object
 *
 * @package    fit2go
 * @subpackage form
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDireccionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'usuario_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('usuario'), 'add_empty' => false)),
      'alias'       => new sfWidgetFormInputText(),
      'direccion'   => new sfWidgetFormInputText(),
      'ciudad'      => new sfWidgetFormInputText(),
      'estado'      => new sfWidgetFormInputText(),
      'zip'         => new sfWidgetFormInputText(),
      'lon'         => new sfWidgetFormInputText(),
      'lat'         => new sfWidgetFormInputText(),
      'facturacion' => new sfWidgetFormInputCheckbox(),
      'ruta'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuario_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('usuario'))),
      'alias'       => new sfValidatorString(array('max_length' => 80)),
      'direccion'   => new sfValidatorString(array('max_length' => 200)),
      'ciudad'      => new sfValidatorString(array('max_length' => 100)),
      'estado'      => new sfValidatorString(array('max_length' => 20)),
      'zip'         => new sfValidatorInteger(),
      'lon'         => new sfValidatorPass(array('required' => false)),
      'lat'         => new sfValidatorPass(array('required' => false)),
      'facturacion' => new sfValidatorBoolean(array('required' => false)),
      'ruta'        => new sfValidatorInteger(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('direccion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Direccion';
  }

}
