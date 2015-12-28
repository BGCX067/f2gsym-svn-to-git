<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Direccionnoobli
 *
 * @author Roberto Hernandez De La Luz
 */
class DireccionnoobliForm extends sfForm {

      public function configure()
      {
        if (!$usuario = $this->getOption('usuario'))
        {
          throw new InvalidArgumentException('Debes proveer un objeto del tipo Publicacion.');
        }

          $direccion = new Direccion();
          $direccion->usuario = $usuario;
          $formd = new DireccionForm($direccion);

          unset($formd['created_at'], $formd['updated_at'], $formd['usuario_id'], $formd['ruta']);

          $formd->widgetSchema['lon'] = new sfWidgetFormInputHidden();
          $formd->widgetSchema['lat'] = new sfWidgetFormInputHidden();
          $formd->widgetSchema['facturacion'] = new sfWidgetFormInputHidden();
          $formd->widgetSchema['alias'] = new sfWidgetFormInput(array('label' => 'Título Dirección'));
          $formd->widgetSchema['zip'] = new sfWidgetFormInput(array('label' => 'ZIP'));
          //$formd->widgetSchema['direccion'] = new sfWidgetFormInput(array(),array('onkeypress' => 'codeAddress()'));

          $formd->validatorSchema['alias'] = new sfValidatorString(array('min_length' => 10,'max_length' => 70, 'required' => false), array('min_length' => 'Por favor introduce al menos 10 caracteres', 'max_length' => 'Por favor introduce maximo 70 caracteres', 'required' => 'Este campo es Obligatorio', 'invalid' => 'No valido'));
          $formd->validatorSchema['direccion'] = new sfValidatorString(array('min_length' => 10,'max_length' => 70, 'required' => false), array ('min_length' => 'Por favor introduce al menos 10 caracteres', 'max_length' => 'Por favor introduce maximo 70 caracteres', 'required' => 'Este campo es Obligatorio'));
          $formd->validatorSchema['ciudad'] = new sfValidatorString(array('min_length' => 3,'max_length' => 20, 'required' => false), array ('min_length' => 'Por favor introduce al menos 3 caracteres', 'max_length' => 'Por favor introduce maximo 20 caracteres', 'required' => 'Este campo es Obligatorio'));
          $formd->validatorSchema['estado'] = new sfValidatorString(array('min_length' => 2,'max_length' => 2, 'required' => false), array ('min_length' => 'Por favor introduce 2 caracteres', 'max_length' => 'Por favor introduce 2 caracteres', 'required' => 'Este campo es Obligatorio'));
          $formd->validatorSchema['zip'] = new sfValidatorRegex(array('pattern' => "/^(^\d{5}([\-]\d{4})?$)*$/", 'required' => false), array('required' => 'Por favor introduzca su ZIP', 'invalid' => 'Introduzca un ZIP valido'));
          $formd->validatorSchema['lon'] = new sfValidatorNumber(array('required' => false));
          $formd->validatorSchema['lat'] = new sfValidatorNumber(array('required' => false));
          
          $formd->setDefault('facturacion', false);
          $formd->setDefault('ciudad', 'Miami');
          $formd->setDefault('estado', 'FL');        
        $this->embedForm(0, $formd);
        $this->mergePostValidator(new sfValidatorDireccionVacia());
        
       }      
}

?>
