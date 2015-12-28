<?php

/**
 * Orden filter form base class.
 *
 * @package    fit2go
 * @subpackage filter
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOrdenFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'placedby_id'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('direccion'), 'add_empty' => true)),
      'monto'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'autorizacion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'referencia'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'avsresultado' => new sfWidgetFormFilterInput(),
      'cvv2'         => new sfWidgetFormFilterInput(),
      'mensajeerror' => new sfWidgetFormFilterInput(),
      'cupon_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('cupon'), 'add_empty' => true)),
      'manual'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pago'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'usuario_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id')),
      'placedby_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'direccion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('direccion'), 'column' => 'id')),
      'monto'        => new sfValidatorPass(array('required' => false)),
      'status'       => new sfValidatorPass(array('required' => false)),
      'autorizacion' => new sfValidatorPass(array('required' => false)),
      'referencia'   => new sfValidatorPass(array('required' => false)),
      'avsresultado' => new sfValidatorPass(array('required' => false)),
      'cvv2'         => new sfValidatorPass(array('required' => false)),
      'mensajeerror' => new sfValidatorPass(array('required' => false)),
      'cupon_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('cupon'), 'column' => 'id')),
      'manual'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pago'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('orden_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Orden';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'usuario_id'   => 'ForeignKey',
      'placedby_id'  => 'Number',
      'direccion_id' => 'ForeignKey',
      'monto'        => 'Text',
      'status'       => 'Text',
      'autorizacion' => 'Text',
      'referencia'   => 'Text',
      'avsresultado' => 'Text',
      'cvv2'         => 'Text',
      'mensajeerror' => 'Text',
      'cupon_id'     => 'ForeignKey',
      'manual'       => 'Boolean',
      'pago'         => 'Boolean',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
