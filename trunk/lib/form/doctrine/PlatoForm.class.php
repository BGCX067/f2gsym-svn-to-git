<?php

/**
 * Plato form.
 *
 * @package    fit2go
 * @subpackage form
 * @author     Roberto Hernandez De La Luz
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PlatoForm extends BasePlatoForm
{
  public function configure()
  {
  }
  
  public function configadmin(){
      
      unset($this['updated_at'], $this['created_at'], $this['menu_list']);
      
      $this->embedI18n(array('en', 'es'));
      
      $this->widgetSchema['en']['name']->setLabel('Name of Dish');
      $this->widgetSchema['en']['description']->setLabel('Description');
      $this->widgetSchema['en']['description'] = new sfWidgetFormTextarea();
      $this->widgetSchema['es']['name']->setLabel('Nombre del Plato');
      $this->widgetSchema['es']['description']->setLabel('Descripcion');
      $this->widgetSchema['es']['description'] = new sfWidgetFormTextarea();
      $this->widgetSchema->setLabel('en', 'English');
      $this->widgetSchema->setLabel('es', 'Español');
      
  }
  
}
