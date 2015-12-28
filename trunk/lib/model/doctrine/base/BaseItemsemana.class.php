<?php

/**
 * BaseItemsemana
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $menu_id
 * @property integer $semana_id
 * @property integer $dia
 * @property Semana $Semana
 * @property Menu $Menu
 * 
 * @method integer    getMenuId()    Returns the current record's "menu_id" value
 * @method integer    getSemanaId()  Returns the current record's "semana_id" value
 * @method integer    getDia()       Returns the current record's "dia" value
 * @method Semana     getSemana()    Returns the current record's "Semana" value
 * @method Menu       getMenu()      Returns the current record's "Menu" value
 * @method Itemsemana setMenuId()    Sets the current record's "menu_id" value
 * @method Itemsemana setSemanaId()  Sets the current record's "semana_id" value
 * @method Itemsemana setDia()       Sets the current record's "dia" value
 * @method Itemsemana setSemana()    Sets the current record's "Semana" value
 * @method Itemsemana setMenu()      Sets the current record's "Menu" value
 * 
 * @package    fit2go
 * @subpackage model
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseItemsemana extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('itemsemana');
        $this->hasColumn('menu_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('semana_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('dia', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Semana', array(
             'local' => 'semana_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Menu', array(
             'local' => 'menu_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}