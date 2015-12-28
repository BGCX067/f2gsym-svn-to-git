<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CreditcardnoobliForm
 *
 * @author Roberto Hernández De La Luz
 */
class CreditcardnoobliForm extends sfForm{

      public function configure()
      {
        if (!$usuario = $this->getOption('usuario'))
        {
          throw new InvalidArgumentException('Debes proveer un objeto del tipo Usuario.');
        }
        
        $tarjeta = new Creditcard();
          $tarjeta->Usuario = $usuario;
          $formU = new CreditcardForm($tarjeta);

          unset($formU['created_at'], $formU['updated_at'], $formU['usuario_id']);

          $formU->widgetSchema['numero'] = new sfWidgetFormInput(array('label' => 'Número de Tarjeta'),array());
          $formU->widgetSchema['nombre'] = new sfWidgetFormInput(array('label' => 'Nombre en la Tarjeta'),array());
          $formU->widgetSchema['codigo'] = new sfWidgetFormInput(array('label' => 'Código de Seguridad'),array());
          $yearst = range(date('Y') - 20, date('Y'));
          $formU->widgetSchema['fechavencimiento'] = new sfWidgetFormDate(array('years'=>array_combine($yearst, $yearst), 'format' => '%month%/%year%', 'label' => 'Fecha de Vencimiento','empty_values' => array('day' => 1,'month' => 'Month','year' => 'Year')));
          $opcionest = array(1 => 'Master Card', 2 => 'Visa', 3 => 'Amex');
          $formU->widgetSchema['tipo'] = new sfWidgetFormChoice(array('choices' => $opcionest, 'label' => 'Tipo de Tarjeta'),array());
          
          $formU->validatorSchema['numero'] = new sfValidatorNumber(array('required' => false, 'max' => 9999999999999999, 'min' => 1000000000000000), array('invalid' => 'Por favor ingrese un numero', 'min' => 'Ingrese al menos 16 Digitos', 'max' => 'Ingrese como maximo 16 Digitos'));
          $formU->validatorSchema['nombre'] = new sfValidatorString(array('min_length' => 6,'max_length' => 30,'required' => false), array('min_length' => 'Por favor introduce al menos 6 caracteres', 'max_length' => 'Por favor introduce maximo 30 caracteres'));
          $formU->validatorSchema['codigo'] = new sfValidatorNumber(array('required' => false, 'min' => 999, 'max' => 9999), array('invalid' => 'Por favor ingrese un numero', 'min' => 'Por favor Ingrese al menos 3 Digitos', 'max' => 'Por favor ingrese como maximo 4 Digitos'));
          $formU->validatorSchema['fechavencimiento'] = new sfValidatorCCExpirationDate(array('required' => false),array('invalid' => 'No valido'));
        
          $this->embedForm(0, $formU);
          $this->mergePostValidator(new sfValidatorNoTarjeta());          
        
      }      
    
}

?>
