<?php

/**
 * Usuario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    fit2go
 * @subpackage model
 * @author     Roberto Hernandez De La Luz
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Usuario extends BaseUsuario
{
    /**
     * Metodo para recuperar solo la primera direccion
     * @return type Direccion
     */
    public function getDireccionPrincipal() {
        
        foreach($this->getDireccion() as $direccion){
            
            $direccionx = $direccion;
            break;
            
        }
        
        return $direccionx;
    }
    
  /**
  * Encriptar la contraseña automaticamente
  * @param string $v the clear password
  */
  public function setClave($v)
  {
    $encrypted = sha1($v);
    return parent::_set('clave', $encrypted);
  }    

}