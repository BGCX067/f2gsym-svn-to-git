<?php

/**
 * panelinicial actions.
 *
 * @package    fit2go
 * @subpackage panelinicial
 * @author     Roberto Hernandez De La Luz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelinicialActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->getUser()->setCulture('en');
      
  }
}
