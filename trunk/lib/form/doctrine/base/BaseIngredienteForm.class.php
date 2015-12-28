<?php

/**
 * Ingrediente form base class.
 *
 * @method Ingrediente getObject() Returns the current form's model object
 *
 * @package    fit2go
 * @subpackage form
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseIngredienteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'tipoingrediente_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('tipoingrediente'), 'add_empty' => false)),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'plato_list'         => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Plato')),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tipoingrediente_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('tipoingrediente'))),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
      'plato_list'         => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Plato', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ingrediente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ingrediente';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['plato_list']))
    {
      $this->setDefault('plato_list', $this->object->Plato->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savePlatoList($con);

    parent::doSave($con);
  }

  public function savePlatoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['plato_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Plato->getPrimaryKeys();
    $values = $this->getValue('plato_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Plato', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Plato', array_values($link));
    }
  }

}
