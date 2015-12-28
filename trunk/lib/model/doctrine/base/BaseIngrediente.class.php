<?php

/**
 * BaseIngrediente
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $tipoingrediente_id
 * @property Doctrine_Collection $Plato
 * @property Doctrine_Collection $Ingredientes
 * @property Tipoingrediente $tipoingrediente
 * 
 * @method string              getName()               Returns the current record's "name" value
 * @method integer             getTipoingredienteId()  Returns the current record's "tipoingrediente_id" value
 * @method Doctrine_Collection getPlato()              Returns the current record's "Plato" collection
 * @method Doctrine_Collection getIngredientes()       Returns the current record's "Ingredientes" collection
 * @method Tipoingrediente     getTipoingrediente()    Returns the current record's "tipoingrediente" value
 * @method Ingrediente         setName()               Sets the current record's "name" value
 * @method Ingrediente         setTipoingredienteId()  Sets the current record's "tipoingrediente_id" value
 * @method Ingrediente         setPlato()              Sets the current record's "Plato" collection
 * @method Ingrediente         setIngredientes()       Sets the current record's "Ingredientes" collection
 * @method Ingrediente         setTipoingrediente()    Sets the current record's "tipoingrediente" value
 * 
 * @package    fit2go
 * @subpackage model
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIngrediente extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ingrediente');
        $this->hasColumn('name', 'string', 70, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 70,
             ));
        $this->hasColumn('tipoingrediente_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Plato', array(
             'refClass' => 'Ingredientes',
             'local' => 'ingrediente_id',
             'foreign' => 'plato_id'));

        $this->hasMany('Ingredientes', array(
             'local' => 'id',
             'foreign' => 'ingrediente_id'));

        $this->hasOne('Tipoingrediente as tipoingrediente', array(
             'local' => 'tipoingrediente_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($i18n0);
    }
}