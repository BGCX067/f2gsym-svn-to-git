<?php

require_once dirname(__FILE__).'/../lib/dishGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/dishGeneratorHelper.class.php';

/**
 * dish actions.
 *
 * @package    fit2go
 * @subpackage dish
 * @author     Roberto Hernandez De La Luz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dishActions extends autoDishActions
{
    
  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->plato = $this->form->getObject();
    $this->form->configadmin();
  }
  
    public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->plato = $this->form->getObject();
    $this->form->configadmin();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
    
}
