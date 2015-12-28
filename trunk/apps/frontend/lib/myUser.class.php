<?php

class myUser extends sfBasicSecurityUser
{
    
    /**
     * Devuelve true sólo para la primer petición de una sesión de usuario:
     * @param type $boolean
     * @return type boolean
     */
    public function isFirstRequest($boolean = null)
    {
      if (is_null($boolean))
      {
        return $this->getAttribute('first_request', true);
      }

      $this->setAttribute('first_request', $boolean);
    }
    
}
