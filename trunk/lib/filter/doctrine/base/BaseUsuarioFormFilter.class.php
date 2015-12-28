<?php

/**
 * Usuario filter form base class.
 *
 * @package    fit2go
 * @subpackage filter
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clave'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'birthday'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'telefono1'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono2'            => new sfWidgetFormFilterInput(),
      'sexo'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'cupon'                => new sfWidgetFormFilterInput(),
      'comoseentero_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('comoseentero'), 'add_empty' => true)),
      'activo'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'recurrente'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'nota_usuario'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nota_administrador'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'tipoingrediente_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Tipoingrediente')),
    ));

    $this->setValidators(array(
      'tipo'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre'               => new sfValidatorPass(array('required' => false)),
      'apellido'             => new sfValidatorPass(array('required' => false)),
      'email'                => new sfValidatorPass(array('required' => false)),
      'clave'                => new sfValidatorPass(array('required' => false)),
      'birthday'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'telefono1'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'telefono2'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sexo'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cupon'                => new sfValidatorPass(array('required' => false)),
      'comoseentero_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('comoseentero'), 'column' => 'id')),
      'activo'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'recurrente'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'nota_usuario'         => new sfValidatorPass(array('required' => false)),
      'nota_administrador'   => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'tipoingrediente_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Tipoingrediente', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addTipoingredienteListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.PreferenciasTipoingrediente PreferenciasTipoingrediente')
      ->andWhereIn('PreferenciasTipoingrediente.tipoingrediente_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'tipo'                 => 'Number',
      'nombre'               => 'Text',
      'apellido'             => 'Text',
      'email'                => 'Text',
      'clave'                => 'Text',
      'birthday'             => 'Date',
      'telefono1'            => 'Number',
      'telefono2'            => 'Number',
      'sexo'                 => 'Boolean',
      'cupon'                => 'Text',
      'comoseentero_id'      => 'ForeignKey',
      'activo'               => 'Boolean',
      'recurrente'           => 'Boolean',
      'nota_usuario'         => 'Text',
      'nota_administrador'   => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'tipoingrediente_list' => 'ManyKey',
    );
  }
}
