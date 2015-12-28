<?php

/**
 * Ingredientes filter form base class.
 *
 * @package    fit2go
 * @subpackage filter
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseIngredientesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'plato_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Plato'), 'add_empty' => true)),
      'ingrediente_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ingrediente'), 'add_empty' => true)),
      'grms'           => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'plato_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Plato'), 'column' => 'id')),
      'ingrediente_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ingrediente'), 'column' => 'id')),
      'grms'           => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ingredientes_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ingredientes';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'plato_id'       => 'ForeignKey',
      'ingrediente_id' => 'ForeignKey',
      'grms'           => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
