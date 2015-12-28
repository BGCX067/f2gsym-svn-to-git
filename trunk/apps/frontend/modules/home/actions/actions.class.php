<?php

/**
 * home actions.
 *
 * @package    fit2go
 * @subpackage home
 * @author     Roberto Hernandez De La Luz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      
        if (!$request->getParameter('sf_culture'))
          {
            if ($this->getUser()->isFirstRequest())
            {
              $culture = $request->getPreferredCulture(array('en', 'es'));
              $this->getUser()->setCulture($culture);
              $this->getUser()->isFirstRequest(false);
            }
            else
            {
              $culture = $this->getUser()->getCulture();
            }

            $this->redirect('localized_homepage');
          }
    
  }
}
