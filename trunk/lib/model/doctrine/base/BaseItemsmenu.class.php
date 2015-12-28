<?php

/**
 * BaseItemsmenu
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $menu_id
 * @property integer $plato_id
 * @property Menu $Menu
 * @property Plato $Plato
 * 
 * @method integer   getMenuId()   Returns the current record's "menu_id" value
 * @method integer   getPlatoId()  Returns the current record's "plato_id" value
 * @method Menu      getMenu()     Returns the current record's "Menu" value
 * @method Plato     getPlato()    Returns the current record's "Plato" value
 * @method Itemsmenu setMenuId()   Sets the current record's "menu_id" value
 * @method Itemsmenu setPlatoId()  Sets the current record's "plato_id" value
 * @method Itemsmenu setMenu()     Sets the current record's "Menu" value
 * @method Itemsmenu setPlato()    Sets the current record's "Plato" value
 * 
 * @package    fit2go
 * @subpackage model
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseItemsmenu extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('itemsmenu');
        $this->hasColumn('menu_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('plato_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Menu', array(
             'local' => 'menu_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Plato', array(
             'local' => 'plato_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}