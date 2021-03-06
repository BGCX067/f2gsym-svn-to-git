<?php

/**
 * BaseCategoria
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Doctrine_Collection $plato
 * @property Doctrine_Collection $menu
 * 
 * @method string              getName()  Returns the current record's "name" value
 * @method Doctrine_Collection getPlato() Returns the current record's "plato" collection
 * @method Doctrine_Collection getMenu()  Returns the current record's "menu" collection
 * @method Categoria           setName()  Sets the current record's "name" value
 * @method Categoria           setPlato() Sets the current record's "plato" collection
 * @method Categoria           setMenu()  Sets the current record's "menu" collection
 * 
 * @package    fit2go
 * @subpackage model
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategoria extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('categoria');
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Plato as plato', array(
             'local' => 'id',
             'foreign' => 'categoria_id'));

        $this->hasMany('Menu as menu', array(
             'local' => 'id',
             'foreign' => 'categoria_id'));

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