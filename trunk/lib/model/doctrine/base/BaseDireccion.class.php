<?php

/**
 * BaseDireccion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $usuario_id
 * @property string $alias
 * @property string $direccion
 * @property string $ciudad
 * @property string $estado
 * @property integer $zip
 * @property double $lon
 * @property double $lat
 * @property boolean $facturacion
 * @property integer $ruta
 * @property Usuario $usuario
 * @property Orden $orden
 * 
 * @method integer   getUsuarioId()   Returns the current record's "usuario_id" value
 * @method string    getAlias()       Returns the current record's "alias" value
 * @method string    getDireccion()   Returns the current record's "direccion" value
 * @method string    getCiudad()      Returns the current record's "ciudad" value
 * @method string    getEstado()      Returns the current record's "estado" value
 * @method integer   getZip()         Returns the current record's "zip" value
 * @method double    getLon()         Returns the current record's "lon" value
 * @method double    getLat()         Returns the current record's "lat" value
 * @method boolean   getFacturacion() Returns the current record's "facturacion" value
 * @method integer   getRuta()        Returns the current record's "ruta" value
 * @method Usuario   getUsuario()     Returns the current record's "usuario" value
 * @method Orden     getOrden()       Returns the current record's "orden" value
 * @method Direccion setUsuarioId()   Sets the current record's "usuario_id" value
 * @method Direccion setAlias()       Sets the current record's "alias" value
 * @method Direccion setDireccion()   Sets the current record's "direccion" value
 * @method Direccion setCiudad()      Sets the current record's "ciudad" value
 * @method Direccion setEstado()      Sets the current record's "estado" value
 * @method Direccion setZip()         Sets the current record's "zip" value
 * @method Direccion setLon()         Sets the current record's "lon" value
 * @method Direccion setLat()         Sets the current record's "lat" value
 * @method Direccion setFacturacion() Sets the current record's "facturacion" value
 * @method Direccion setRuta()        Sets the current record's "ruta" value
 * @method Direccion setUsuario()     Sets the current record's "usuario" value
 * @method Direccion setOrden()       Sets the current record's "orden" value
 * 
 * @package    fit2go
 * @subpackage model
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDireccion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('direccion');
        $this->hasColumn('usuario_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('alias', 'string', 80, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 80,
             ));
        $this->hasColumn('direccion', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 200,
             ));
        $this->hasColumn('ciudad', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('estado', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('zip', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('lon', 'double', null, array(
             'type' => 'double',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('lat', 'double', null, array(
             'type' => 'double',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('facturacion', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('ruta', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Usuario as usuario', array(
             'local' => 'usuario_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('Orden as orden', array(
             'local' => 'id',
             'foreign' => 'direccion_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}