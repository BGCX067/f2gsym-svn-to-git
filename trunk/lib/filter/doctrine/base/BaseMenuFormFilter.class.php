<?php

/**
 * Menu filter form base class.
 *
 * @package    fit2go
 * @subpackage filter
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMenuFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'precio'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'categoria_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('categoria'), 'add_empty' => true)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'plato_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Plato')),
      'semana_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Semana')),
    ));

    $this->setValidators(array(
      'precio'       => new sfValidatorPass(array('required' => false)),
      'categoria_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('categoria'), 'column' => 'id')),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'plato_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Plato', 'required' => false)),
      'semana_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Semana', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('menu_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addPlatoListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ItemsMenu.plato_id', $values)
    ;
  }

  public function addSemanaListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.Itemsemana Itemsemana')
      ->andWhereIn('Itemsemana.semana_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Menu';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'precio'       => 'Text',
      'categoria_id' => 'ForeignKey',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
      'plato_list'   => 'ManyKey',
      'semana_list'  => 'ManyKey',
    );
  }
}
