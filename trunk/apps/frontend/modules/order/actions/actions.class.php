<?php

/**
 * order actions.
 *
 * @package    fit2go
 * @subpackage order
 * @author     Roberto Hernandez De La Luz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class orderActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->form = new OrdenForm();
      $this->form->neworder();
      
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new OrdenForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new OrdenForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($orden = Doctrine_Core::getTable('Orden')->find(array($request->getParameter('id'))), sprintf('Object orden does not exist (%s).', $request->getParameter('id')));
    $this->form = new OrdenForm($orden);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($orden = Doctrine_Core::getTable('Orden')->find(array($request->getParameter('id'))), sprintf('Object orden does not exist (%s).', $request->getParameter('id')));
    $this->form = new OrdenForm($orden);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($orden = Doctrine_Core::getTable('Orden')->find(array($request->getParameter('id'))), sprintf('Object orden does not exist (%s).', $request->getParameter('id')));
    $orden->delete();

    $this->redirect('order/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $orden = $form->save();

      $this->redirect('order/edit?id='.$orden->getId());
    }
  }
}
