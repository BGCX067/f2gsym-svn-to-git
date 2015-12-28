<?php

/**
 * Comoseentero form.
 *
 * @package    fit2go
 * @subpackage form
 * @author     Roberto Hernandez De La Luz
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ComoseenteroForm extends BaseComoseenteroForm
{
  public function configure()
  {

    unset(
      $this['created_at'], $this['updated_at']
    );      
      
    $this->embedI18n(array('en', 'es'));
    //$this->widgetSchema->setLabel('name','Como se entero');
    
    $this->widgetSchema['en']['name']->setLabel('How do you know?');
    $this->widgetSchema['es']['name']->setLabel('Como se Entero?');
    $this->widgetSchema->setLabel('en', 'English');
    $this->widgetSchema->setLabel('es', 'Español');
  }
}
