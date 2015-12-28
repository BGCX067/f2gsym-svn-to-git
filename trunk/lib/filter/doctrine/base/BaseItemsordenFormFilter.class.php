<?php

/**
 * Itemsorden filter form base class.
 *
 * @package    fit2go
 * @subpackage filter
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseItemsordenFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'orden_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('orden'), 'add_empty' => true)),
      'menu_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('menu'), 'add_empty' => true)),
      'plato_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('plato'), 'add_empty' => true)),
      'cantidad'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'orden_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('orden'), 'column' => 'id')),
      'menu_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('menu'), 'column' => 'id')),
      'plato_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('plato'), 'column' => 'id')),
      'cantidad'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('itemsorden_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Itemsorden';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'orden_id'   => 'ForeignKey',
      'menu_id'    => 'ForeignKey',
      'plato_id'   => 'ForeignKey',
      'cantidad'   => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
