<?php

/**
 * Description of sfValidatorDireccionVacia
 * Validador Personalizado para desactivar los campos vacios en la direccion secunduria
 * @author Roberto Hernández De La Luz
 */
class sfValidatorDireccionVacia extends sfValidatorSchema{
    
    protected function configure($options = array(), $messages = array())
    {
        $this->addMessage('direccion', 'falta la direccion.');
    }
    
    protected function doClean($values)
      {
        $errorSchema = new sfValidatorErrorSchema($this);

        foreach($values as $key => $value)
        {
          $errorSchemaLocal = new sfValidatorErrorSchema($this);

          // no se han rellenado los campos, se eliminan los valores vacíos
          if (!$value['direccion'] && !$value['alias'] && !$value['zip'])
          {
            unset($values[$key]);
          }
          
          // Si al menos si direccion esta pero no alias o zip
          if ($value['direccion'] && (!$value['alias'] || !$value['zip'] ))
          {
              if(!$value['alias']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'alias');
              }
              if(!$value['zip']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'zip');
              }              
             
          }
                  
          // Si al menos alias esta pero no direccion o zip
          if ($value['alias'] && (!$value['direccion'] || !$value['zip'] ))
          {
              if(!$value['direccion']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'direccion');
              }
              if(!$value['zip']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'zip');
              }              
             
          }
          
          // Si al menos zip esta pero no alias o zip
          if ($value['zip'] && (!$value['alias'] || !$value['direccion'] ))
          {
              if(!$value['alias']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'alias');
              }
              if(!$value['direccion']){
                  $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'direccion');
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
