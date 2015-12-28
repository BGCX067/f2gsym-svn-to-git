<?php

/**
 * Creditcard filter form base class.
 *
 * @package    fit2go
 * @subpackage filter
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCreditcardFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'numero'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'codigo'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fechavencimiento' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'usuario_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id')),
      'numero'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre'           => new sfValidatorPass(array('required' => false)),
      'codigo'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fechavencimiento' => new sfValidatorPass(array('required' => false)),
      'tipo'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('creditcard_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Creditcard';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'usuario_id'       => 'ForeignKey',
      'numero'           => 'Number',
      'nombre'           => 'Text',
      'codigo'           => 'Number',
      'fechavencimiento' => 'Text',
      'tipo'             => 'Number',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
