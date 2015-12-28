<?php

/**
 * Plato filter form base class.
 *
 * @package    fit2go
 * @subpackage filter
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePlatoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'disponible'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'precio'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'imagen'           => new sfWidgetFormFilterInput(),
      'calorias'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'proteinas'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'grasas'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'carbohidratos'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'colesterol'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sodio'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'weightwatcher'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'categoria_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('categoria'), 'add_empty' => true)),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'ingrediente_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Ingrediente')),
      'menu_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Menu')),
    ));

    $this->setValidators(array(
      'disponible'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'precio'           => new sfValidatorPass(array('required' => false)),
      'imagen'           => new sfValidatorPass(array('required' => false)),
      'calorias'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'proteinas'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'grasas'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'carbohidratos'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'colesterol'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'sodio'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'weightwatcher'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'categoria_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('categoria'), 'column' => 'id')),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'ingrediente_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Ingrediente', 'required' => false)),
      'menu_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Menu', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('plato_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addIngredienteListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.Ingredientes Ingredientes')
      ->andWhereIn('Ingredientes.ingrediente_id', $values)
    ;
  }

  public function addMenuListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ItemsMenu ItemsMenu')
      ->andWhereIn('ItemsMenu.menu_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Plato';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'disponible'       => 'Boolean',
      'precio'           => 'Text',
      'imagen'           => 'Text',
      'calorias'         => 'Number',
      'proteinas'        => 'Number',
      'grasas'           => 'Number',
      'carbohidratos'    => 'Number',
      'colesterol'       => 'Number',
      'sodio'            => 'Number',
      'weightwatcher'    => 'Number',
      'categoria_id'     => 'ForeignKey',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'ingrediente_list' => 'ManyKey',
      'menu_list'        => 'ManyKey',
    );
  }
}
