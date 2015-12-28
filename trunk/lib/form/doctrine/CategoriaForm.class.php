<?php

/**
 * Categoria form.
 *
 * @package    fit2go
 * @subpackage form
 * @author     Roberto Hernandez De La Luz
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoriaForm extends BaseCategoriaForm
{
  public function configure()
  {
      
    unset(
     $this['created_at'], $this['updated_at']);  
      
    $this->embedI18n(array('en', 'es'));
      
    $this->widgetSchema['en']['name']->setLabel('Name of Category');
    $this->widgetSchema['es']['name']->setLabel('Nombre de la Categoria');
    $this->widgetSchema->setLabel('en', 'English');
    $this->widgetSchema->setLabel('es', 'Español');      
      
  }
}
