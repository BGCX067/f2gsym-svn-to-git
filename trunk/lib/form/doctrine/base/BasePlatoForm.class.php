<?php

/**
 * Plato form base class.
 *
 * @method Plato getObject() Returns the current form's model object
 *
 * @package    fit2go
 * @subpackage form
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePlatoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'disponible'       => new sfWidgetFormInputCheckbox(),
      'precio'           => new sfWidgetFormInputText(),
      'imagen'           => new sfWidgetFormInputText(),
      'calorias'         => new sfWidgetFormInputText(),
      'proteinas'        => new sfWidgetFormInputText(),
      'grasas'           => new sfWidgetFormInputText(),
      'carbohidratos'    => new sfWidgetFormInputText(),
      'colesterol'       => new sfWidgetFormInputText(),
      'sodio'            => new sfWidgetFormInputText(),
      'weightwatcher'    => new sfWidgetFormInputText(),
      'categoria_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('categoria'), 'add_empty' => false)),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'ingrediente_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Ingrediente')),
      'menu_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Menu')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'disponible'       => new sfValidatorBoolean(array('required' => false)),
      'precio'           => new sfValidatorPass(),
      'imagen'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'calorias'         => new sfValidatorNumber(array('required' => false)),
      'proteinas'        => new sfValidatorNumber(array('required' => false)),
      'grasas'           => new sfValidatorNumber(array('required' => false)),
      'carbohidratos'    => new sfValidatorNumber(array('required' => false)),
      'colesterol'       => new sfValidatorNumber(array('required' => false)),
      'sodio'            => new sfValidatorNumber(array('required' => false)),
      'weightwatcher'    => new sfValidatorInteger(array('required' => false)),
      'categoria_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('categoria'))),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'ingrediente_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Ingrediente', 'required' => false)),
      'menu_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Menu', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('plato[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Plato';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['ingrediente_list']))
    {
      $this->setDefault('ingrediente_list', $this->object->Ingrediente->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['menu_list']))
    {
      $this->setDefault('menu_list', $this->object->Menu->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveIngredienteList($con);
    $this->saveMenuList($con);

    parent::doSave($con);
  }

  public function saveIngredienteList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['ingrediente_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Ingrediente->getPrimaryKeys();
    $values = $this->getValue('ingrediente_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Ingrediente', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Ingrediente', array_values($link));
    }
  }

  public function saveMenuList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['menu_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Menu->getPrimaryKeys();
    $values = $this->getValue('menu_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Menu', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Menu', array_values($link));
    }
  }

}
