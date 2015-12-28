<?php

/**
 * Direccion filter form base class.
 *
 * @package    fit2go
 * @subpackage filter
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDireccionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('usuario'), 'add_empty' => true)),
      'alias'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ciudad'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zip'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lon'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lat'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'facturacion' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'ruta'        => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'usuario_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('usuario'), 'column' => 'id')),
      'alias'       => new sfValidatorPass(array('required' => false)),
      'direccion'   => new sfValidatorPass(array('required' => false)),
      'ciudad'      => new sfValidatorPass(array('required' => false)),
      'estado'      => new sfValidatorPass(array('required' => false)),
      'zip'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lon'         => new sfValidatorPass(array('required' => false)),
      'lat'         => new sfValidatorPass(array('required' => false)),
      'facturacion' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'ruta'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('direccion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Direccion';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'usuario_id'  => 'ForeignKey',
      'alias'       => 'Text',
      'direccion'   => 'Text',
      'ciudad'      => 'Text',
      'estado'      => 'Text',
      'zip'         => 'Number',
      'lon'         => 'Text',
      'lat'         => 'Text',
      'facturacion' => 'Boolean',
      'ruta'        => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
