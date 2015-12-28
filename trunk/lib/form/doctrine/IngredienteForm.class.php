<?php

/**
 * Ingrediente form.
 *
 * @package    fit2go
 * @subpackage form
 * @author     Roberto Hernandez De La Luz
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class IngredienteForm extends BaseIngredienteForm
{
  public function configure()
  {
   unset(
      $this['created_at'], $this['updated_at'], $this['usuario_list'], $this['plato_list']);      
      
    $this->embedI18n(array('en', 'es'));
    //$this->widgetSchema->setLabel('name','Como se entero');
    
    $this->widgetSchema['tipoingrediente_id']->setLabel('Type of Ingredient');
    
    $this->widgetSchema['en']['name']->setLabel('Name of Ingredient');
    $this->widgetSchema['es']['name']->setLabel('Nombre del Ingrediente');
    $this->widgetSchema->setLabel('en', 'English');
    $this->widgetSchema->setLabel('es', 'Español');
      
  }
}
