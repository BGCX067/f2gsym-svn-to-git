<?php

/**
 * Description of sfValidatorDireccionVacia
 * Validador Personalizado para desactivar los campos vacios en la direccion secunduria
 * @author Roberto Hernández De La Luz
 */
class sfValidatorNoTarjeta extends sfValidatorSchema{
    
    protected function configure($options = array(), $messages = array())
    {
        $this->addMessage('numero', 'falta la tarjeta.');
    }
    
    protected function doClean($values)
      {
        $errorSchema = new sfValidatorErrorSchema($this);

        foreach($values as $key => $value)
        {
          $errorSchemaLocal = new sfValidatorErrorSchema($this);

          // no se han rellenado los campos, se eliminan los valores vacíos
          if (!$value['numero'] && !$value['nombre'] && !$value['codigo'] && $value['fechavencimiento']['month']=='' && $value['fechavencimiento']['year'] == '')
          {
            unset($values[$key]);
          }
          
          // Si al menos el numero esta pero no el resto
          if ($value['numero'] && (!$value['nombre'] || !$value['codigo'] ||  $value['fechavencimiento']['month']=='' && $value['fechavencimiento']['year'] == ''))
          {
              if(!$value['nombre']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'nombre');
              }
              if(!$value['codigo']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'codigo');
              }
              if(!$value['fechavencimiento']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'fechavencimiento');
              }               
             
          }
                  
          // Si al menos el nombre esta pero no el resto
          if ($value['nombre'] && (!$value['numero'] || !$value['codigo'] ||  $value['fechavencimiento']['month']=='' && $value['fechavencimiento']['year'] == ''))
          {
              if(!$value['numero']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'numero');
              }
              if(!$value['codigo']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'codigo');
              }
              if(!$value['fechavencimiento']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'fechavencimiento');
              }            
             
          }
          
          // Si al menos el codigo esta pero no el resto
          if ($value['codigo'] && (!$value['numero'] || !$value['nombre'] ||  $value['fechavencimiento']['month']=='' && $value['fechavencimiento']['year'] == ''))
          {
              if(!$value['numero']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'numero');
              }
              if(!$value['nombre']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'nombre');
              }
              if(!$value['fechavencimiento']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'fechavencimiento');
              }           
             
          }
          
          // Si al menos el fechavencimiento esta pero no el resto
          if (($value['fechavencimiento']['month'] != '' && $value['fechavencimiento']['year'] != '' ) && (!$value['numero'] || !$value['nombre'] || !$value['codigo']))
          {
              if(!$value['numero']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'numero');
              }
              if(!$value['nombre']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'nombre');
              }
              if(!$value['codigo']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'codigo');
              }              
             
          }
                   
          
          // algun error para este formulario embebido
          if (count($errorSchemaLocal))
          {
            $errorSchema->addError($errorSchemaLocal, (string) $key);
          }
        }

        // lanza un error para el formulario principal
        if (count($errorSchema))
        {
          throw new sfValidatorErrorSchema($this, $errorSchema);
        }

        return $values;
      }        
    
}

?>
