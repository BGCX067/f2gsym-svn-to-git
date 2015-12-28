<?php

/**
 * Tipoingrediente form.
 *
 * @package    fit2go
 * @subpackage form
 * @author     Roberto Hernandez De La Luz
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TipoingredienteForm extends BaseTipoingredienteForm
{
  public function configure()
  {
      
    unset(
      $this['created_at'], $this['updated_at'], $this['usuario_list']);      
      
    $this->embedI18n(array('en', 'es'));
    
    $this->widgetSchema['en']['name']->setLabel('Type of Ingredient');
    $this->widgetSchema['es']['name']->setLabel('Tipo de Ingrediente');
    $this->widgetSchema->setLabel('en', 'English');
    $this->widgetSchema->setLabel('es', 'Español');
      
  }
}
