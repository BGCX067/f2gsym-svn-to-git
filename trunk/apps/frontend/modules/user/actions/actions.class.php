<?php

/**
 * user actions.
 *
 * @package    fit2go
 * @subpackage user
 * @author     Roberto Hernandez De La Luz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
 
 public function executeControlpanel(sfWebRequest $request)
 {
     
//if que pregunte si la sesion esta iniciada, si no lo esta revisa el request que le llega, si lo esta recupera la info de la sesion.

      if($this->getUser()->isAuthenticated() ){

          $usuario = Doctrine::getTable('Usuario')->findOneById($this->getUser()->getAttribute('num'));
          $this->usu = $usuario;

          /**
           *@todo falta agregar codigo para recuperar informacion relativa al usuario
           */

      }else{

          /**
           * Se crea un objeto tipo inicio de sesion y se compara con el que se recive, si no coincide, se deberia regresar al template anterior para que muestre los errores.
           */

          $formu = new InicioSesionForm();
          
          $formu->bind($request->getParameter($formu->getName()), $request->getFiles($formu->getName()));

          if ($formu->isValid())
            {

              $usu = $request->getParameter('iniciosesion');
              $usuario = Doctrine::getTable('Usuario')->findOneByEmailAndClave($usu['email'],sha1($usu['clave']));

              /**
               * Se pregunta si el usuario existe, si no existe regresa a la pagina de registro y le informa
               */

              if($usuario == null ){

                  $this->getUser()->setFlash('nousuario', 'Ha ingresado mal sus datos de acceso o no esta registrado,intente de nuevo o registrese por favor');

                  $this->redirect('user/noregistrado');
                  

              }else{

                  $this->usu = $usuario;
                  $this->getUser()->setAuthenticated(true);

                  /*$query = Doctrine_Query::create()
                          ->from('Usuario u')
                          ->select('u.id as id, u.tipo as tipo')
                          ->where('u.email = ?', $usuario->getEmail());
                  $id = $query->fetchArray();*/

                  $this->getUser()->setAttribute('num', $usuario->getId());
                  
                  /*Agrega credencial normal*/
                  
                  $this->getUser()->addCredential('normal');

                  
                  /**
                   *@todo falta agregar aqui para recuperar informacion del usuario
                   */

              }

            }
            else{
                
               $sss = $request->getParameter('usuario');

               $this->getUser()->setFlash('nousuario','Ha ingresado mal sus datos de acceso o no esta registrado,intente de nuevo o registrese por favor');

               //$this->setTemplate('noregistrado');
               $this->redirect('user/noregistrado');


            }
      }     
     
 }
 
  /**
   *Metodo para mostrar una plantilla para usuarios no registrados, muestra los 3 formularios separados en tabs cambiara en el diseño
   * @param sfWebRequest $request 
   */
  public function executeNoregistrado(sfWebRequest $request){
      
    $this->formu = new UsuarioForm();
    $this->formu->newuser();
      
  }
  
/**
 *Metodo para cerrar sesion
 * @param sfWebRequest $request
 * @return cierra Sesion
 */
  public function executeCerrarsesion(sfWebRequest $request)
  {

    /**
     * Se obtiene la credencial que tiene para eliminarla
     */

    $this->getUser()->setAuthenticated(false);
    $this->getUser()->shutdown();
    $this->getUser()->getAttributeHolder()->remove('num');
    $this->getUser()->clearCredentials();
    $this->getUser()->removeCredential('normal');
    return $this->redirect('@homepage');

  }  
    
  public function executeIndex(sfWebRequest $request)
  {
    $this->usuarios = Doctrine::getTable('Usuario')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UsuarioForm();
    $this->form->newuser();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UsuarioForm();
    $this->form->newuser();

    $this->processFormN($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($usuario = Doctrine::getTable('Usuario')->find(array($request->getParameter('id'))), sprintf('Object usuario does not exist (%s).', $request->getParameter('id')));
    $this->form = new UsuarioForm($usuario);
    $this->form->edituser();
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($usuario = Doctrine::getTable('Usuario')->find(array($request->getParameter('id'))), sprintf('Object usuario does not exist (%s).', $request->getParameter('id')));
    $this->form = new UsuarioForm($usuario);
    $this->form->edituser();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($usuario = Doctrine::getTable('Usuario')->find(array($request->getParameter('id'))), sprintf('Object usuario does not exist (%s).', $request->getParameter('id')));
    $usuario->delete();

    $this->redirect('user/index');
  }

  /*ProcessForm para procesar los nuevos usuarios y redireccionarlos a el menu para comprar*/
  protected function processFormN(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $usuario = $form->save();

      $this->getUser()->setAuthenticated(true);

      $this->getUser()->setAttribute('email', $usuario->getEmail());
      
      $this->redirect('@orden');
    }
  }  
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $usuario = $form->save();

      $this->redirect('user/edit?id='.$usuario->getId());
    }
  }
}
