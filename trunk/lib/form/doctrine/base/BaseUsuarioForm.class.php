<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    fit2go
 * @subpackage form
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'tipo'                 => new sfWidgetFormInputText(),
      'nombre'               => new sfWidgetFormInputText(),
      'apellido'             => new sfWidgetFormInputText(),
      'email'                => new sfWidgetFormInputText(),
      'clave'                => new sfWidgetFormInputText(),
      'birthday'             => new sfWidgetFormDate(),
      'telefono1'            => new sfWidgetFormInputText(),
      'telefono2'            => new sfWidgetFormInputText(),
      'sexo'                 => new sfWidgetFormInputCheckbox(),
      'cupon'                => new sfWidgetFormInputText(),
      'comoseentero_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('comoseentero'), 'add_empty' => false)),
      'activo'               => new sfWidgetFormInputCheckbox(),
      'recurrente'           => new sfWidgetFormInputCheckbox(),
      'nota_usuario'         => new sfWidgetFormTextarea(),
      'nota_administrador'   => new sfWidgetFormTextarea(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'tipoingrediente_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Tipoingrediente')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tipo'                 => new sfValidatorInteger(array('required' => false)),
      'nombre'               => new sfValidatorString(array('max_length' => 120)),
      'apellido'             => new sfValidatorString(array('max_length' => 120)),
      'email'                => new sfValidatorString(array('max_length' => 60)),
      'clave'                => new sfValidatorString(array('max_length' => 60)),
      'birthday'             => new sfValidatorDate(),
      'telefono1'            => new sfValidatorInteger(),
      'telefono2'            => new sfValidatorInteger(array('required' => false)),
      'sexo'                 => new sfValidatorBoolean(),
      'cupon'                => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'comoseentero_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('comoseentero'))),
      'activo'               => new sfValidatorBoolean(array('required' => false)),
      'recurrente'           => new sfValidatorBoolean(array('required' => false)),
      'nota_usuario'         => new sfValidatorString(array('max_length' => 500)),
      'nota_administrador'   => new sfValidatorString(array('max_length' => 500)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'tipoingrediente_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Tipoingrediente', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Usuario', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['tipoingrediente_list']))
    {
      $this->setDefault('tipoingrediente_list', $this->object->Tipoingrediente->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveTipoingredienteList($con);

    parent::doSave($con);
  }

  public function saveTipoingredienteList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tipoingrediente_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Tipoingrediente->getPrimaryKeys();
    $values = $this->getValue('tipoingrediente_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Tipoingrediente', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Tipoingrediente', array_values($link));
    }
  }

}
