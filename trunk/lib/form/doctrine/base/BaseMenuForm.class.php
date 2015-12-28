<?php

/**
 * Menu form base class.
 *
 * @method Menu getObject() Returns the current form's model object
 *
 * @package    fit2go
 * @subpackage form
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMenuForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'precio'       => new sfWidgetFormInputText(),
      'categoria_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('categoria'), 'add_empty' => false)),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'plato_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Plato')),
      'semana_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Semana')),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'precio'       => new sfValidatorPass(),
      'categoria_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('categoria'))),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'plato_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Plato', 'required' => false)),
      'semana_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Semana', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('menu[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Menu';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['plato_list']))
    {
      $this->setDefault('plato_list', $this->object->Plato->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['semana_list']))
    {
      $this->setDefault('semana_list', $this->object->Semana->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savePlatoList($con);
    $this->saveSemanaList($con);

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

  public function saveSemanaList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['semana_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Semana->getPrimaryKeys();
    $values = $this->getValue('semana_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Semana', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Semana', array_values($link));
    }
  }

}
