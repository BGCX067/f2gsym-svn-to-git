<?php

/**
 * Usuario form.
 *
 * @package    fit2go
 * @subpackage form
 * @author     Ing. Roberto Hernández De La Luz
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UsuarioForm extends BaseUsuarioForm
{
  public function configure()
  {
  }
  
  /**
   * Metodo para configurar el formulario de registro de un nuevo usuario
   */
  public function newuser(){
      
      //$this->useFields(array('title', 'content'));
      unset($this['activo'], $this['nota_administrador']);
      
      $this->widgetSchema['created_at']= new sfWidgetFormInputHidden();
      $this->widgetSchema['updated_at']= new sfWidgetFormInputHidden();
      $this->widgetSchema['tipo']= new sfWidgetFormInputHidden();
      
      //Rango creado para que se despliegue el año de nacimiento de la fecha de hoy menos 80 a la fecha de hoy menos 18, para asegurarse que tiene minimo 18 años
      $years = range(date('Y') - 80, date('Y') - 18);

      $this->widgetSchema['birthday'] =  new sfWidgetFormDate(array
      ('years'=>array_combine($years, $years), 'label' => 'Fecha de Nacimiento','empty_values' => array('day' => 'Day','month' => 'Month','year' => 'Year')));
      $opcionessexo = array(false => 'Mujer', true => 'Hombre');
      $this->widgetSchema['sexo'] = new sfWidgetFormChoice(array('choices' => $opcionessexo,'multiple' => false, 'expanded' => true, 'label' => 'Sexo'), array());
      $this->widgetSchema['comoseentero_id'] = new sfWidgetFormDoctrineChoice(array('model' => 'Comoseentero', 'method' => 'getName' , 'add_empty' => false, 'label' => '¿Cómo supo sobre Fit2Go?'), array());
      //$this->widgetSchema['tipoingrediente_list'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ingrediente'), 'multiple' => true, 'expanded' => true, 'label' => '¿Hay algo que le gustaría reemplazar?'), array());
      $this->widgetSchema['tipoingrediente_list'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tipoingrediente'), 'multiple' => true, 'expanded' => true, 'label' => '¿Hay algo que le gustaría reemplazar?'), array());
      $this->widgetSchema['clave'] = new sfWidgetFormInputPassword();
      
      
      $this->validatorSchema['nombre'] = new sfValidatorString(array('min_length' => 3,'max_length' => 20), array('min_length' => 'Por favor introduce un nombre de al menos 3 caracteres', 'max_length' => 'Por favor introduce un nombre de maximo 20 caracteres', 'required' => 'Este campo es Obligatorio'));
      $this->validatorSchema['apellido'] = new sfValidatorString(array('min_length' => 3,'max_length' => 20), array('min_length' => 'Por favor introduce un apellido de al menos 3 caracteres', 'max_length' => 'Por favor introduce un apellido de maximo 20 caracteres', 'required' => 'Este campo es Obligatorio'));
      $this->validatorSchema['email'] = new sfValidatorEmail(array(),array('required' => 'Este campo es Obligatorio', 'invalid' => 'Por favor introduce un email en formato valido "ejemplo@miejemplo.algo"'));
      $this->validatorSchema['clave'] = new sfValidatorString(array('min_length' => 6), array('min_length' => 'Por favor introduce una clave de al menos 6 caracteres', 'required' => 'Este campo es Obligatorio'));
      $this->validatorSchema['birthday'] = new sfValidatorDate(array(), array('required' => 'Por favor seleccione una Fecha', 'invalid' => 'Fecha no valida'));
      $this->validatorSchema['telefono1'] = new sfValidatorRegex(array('pattern' => "/^(^(1\s*[-\/\.]?)?(\((\d{3})\)|(\d{3}))\s*[-\/\.]?\s*(\d{3})\s*[-\/\.]?\s*(\d{4})\s*(([xX]|[eE][xX][tT])\.?\s*(\d+))*$)*$/", 'required' => true),
              array('invalid' => 'Ingrese un numero con el siguiente formato (xxx-xxx-xxxx)', 'required' => 'El campo Telefono 1 es Obligatorio'));
      $this->validatorSchema['telefono2'] = new sfValidatorRegex(array('pattern' => "/^(^(1\s*[-\/\.]?)?(\((\d{3})\)|(\d{3}))\s*[-\/\.]?\s*(\d{3})\s*[-\/\.]?\s*(\d{4})\s*(([xX]|[eE][xX][tT])\.?\s*(\d+))*$)*$/", 'required' => false),
              array('invalid' => 'Ingrese un numero con el siguiente formato (xxx-xxx-xxxx)'));
      $this->validatorSchema['sexo'] = new sfValidatorChoice(array('choices' => array_keys($opcionessexo), 'multiple' => false, 'required' => true, 'min' => 1), array('required' => 'Indique su Sexo'));
      $this->validatorSchema['cupon'] = new sfValidatorString(array('min_length' => 3,'max_length' => 20, 'required' => false), array('min_length' => 'Por favor introduce un cupon de al menos 3 caracteres', 'max_length' => 'Por favor introduce un nombre de maximo 20 caracteres'));
      $this->validatorSchema['nota_usuario'] = new sfValidatorString(array('min_length' => 6, 'max_length' => 250, 'required' => false), array('min_length' => 'Por favor introduce una nota de al menos 6 caracteres', 'max_length' => 'Por favor introduce un nombre de maximo 250 caracteres'));
      $this->validatorSchema['comoseentero_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('comoseentero')), array('required' => 'Seleccione una opcion por favor'));
      $this->validatorSchema['clave'] = new sfValidatorString(array('min_length' => 7, 'required' => false), array('min_length' => 'Por favor ingrese al menos 7 caracteres en su contraseña', 'required' => 'Este campo es Obligatorio'));
      
      $this->setDefault('tipo',1);
      $this->setDefault('created_at',time());
      $this->setDefault('updated_at',time());
      
      $this->widgetSchema['recurrente']->setLabel('Activar Pedido Automático');
      $this->widgetSchema['nota_usuario']->setLabel('¿Hay algo más que no le gustaría recibir?');
      
      /**
       * Se Agrega el formulario para Direccion principal obligatoria
       */
      
          $direccionobli = new Direccion();
          
          /*Se pregunta si el Usuario es nuevo*/
          
          if($this->getObject()->isNew()){
              $direccionobli->usuario = $this->getObject();
              $form = new DireccionForm($direccionobli);
          }else{
              
              $form = new DireccionForm($this->getObject()->getDireccionPrincipal());
              
          }
          


          unset($form['created_at'], $form['updated_at'], $form['usuario_id'], $form['ruta']);

          $form->widgetSchema['lon'] = new sfWidgetFormInputHidden();
          $form->widgetSchema['lat'] = new sfWidgetFormInputHidden();
          $form->widgetSchema['facturacion'] = new sfWidgetFormInputHidden();
          $form->widgetSchema['alias'] = new sfWidgetFormInput(array('label' => 'Título Dirección'),array('value' => 'Principal', 'readonly' => 'readonly'));
          $form->widgetSchema['zip'] = new sfWidgetFormInput(array('label' => 'ZIP'));
          $form->widgetSchema['direccion'] = new sfWidgetFormInput();
          //$form->widgetSchema['direccion'] = new sfWidgetFormInput(array(),array('onkeypress' => 'codeAddress()'));

          $form->validatorSchema['alias'] = new sfValidatorString(array('min_length' => 4,'max_length' => 70, 'required' => true), array('min_length' => 'Por favor introduce al menos 4 caracteres', 'max_length' => 'Por favor introduce maximo 70 caracteres', 'required' => 'Este campo es Obligatorio', 'invalid' => 'No valido'));
          $form->validatorSchema['direccion'] = new sfValidatorString(array('min_length' => 10,'max_length' => 70, 'required' => true), array ('min_length' => 'Por favor introduce al menos 10 caracteres', 'max_length' => 'Por favor introduce maximo 70 caracteres', 'required' => 'Este campo es Obligatorio'));
          $form->validatorSchema['ciudad'] = new sfValidatorString(array('min_length' => 3,'max_length' => 20, 'required' => true), array ('min_length' => 'Por favor introduce al menos 3 caracteres', 'max_length' => 'Por favor introduce maximo 20 caracteres', 'required' => 'Este campo es Obligatorio'));
          $form->validatorSchema['estado'] = new sfValidatorString(array('min_length' => 2,'max_length' => 2, 'required' => true), array ('min_length' => 'Por favor introduce 2 caracteres', 'max_length' => 'Por favor introduce 2 caracteres', 'required' => 'Este campo es Obligatorio'));
          $form->validatorSchema['zip'] = new sfValidatorRegex(array('pattern' => "/^(^\d{5}([\-]\d{4})?$)*$/"), array('required' => 'Por favor introduzca su ZIP', 'invalid' => 'Introduzca un ZIP valido'));

          $form->setDefault('facturacion', true);
          $form->setDefault('ciudad', 'Miami');
          $form->setDefault('estado', 'FL');

          $this->embedForm('direccion', $form);
          
      /**
       * Se Agrega el formulario para Direccion Secundaria no obligatoria
       */
    
          $formdi = new DireccionnoobliForm(null, array('usuario' => $this->getObject(),
            ));

          $this->embedForm('direccion1', $formdi);       
 
      /**
       * Se Agrega el formulario de tarjeta de credito
       */
      
          $formCC = new CreditcardnoobliForm(null, array ('usuario' => $this->getObject()));
          
          
          $this->embedForm('pago', $formCC);
          
          //$this->mergePostValidator(new sfValidatorDireccionVacia());
  }
  
  /**
   * Metodo para configurar el formulario de edicion de usuario
   */
  public function edituser(){
      
      //$this->useFields(array('title', 'content'));
      unset($this['activo'], $this['nota_administrador']);
      
      $this->widgetSchema['created_at']= new sfWidgetFormInputHidden();
      $this->widgetSchema['updated_at']= new sfWidgetFormInputHidden();
      $this->widgetSchema['tipo']= new sfWidgetFormInputHidden();
      
      //Rango creado para que se despliegue el año de nacimiento de la fecha de hoy menos 80 a la fecha de hoy menos 18, para asegurarse que tiene minimo 18 años
      $years = range(date('Y') - 80, date('Y') - 18);

      $this->widgetSchema['birthday'] =  new sfWidgetFormDate(array
      ('years'=>array_combine($years, $years), 'label' => 'Fecha de Nacimiento','empty_values' => array('day' => 'Day','month' => 'Month','year' => 'Year')));
      $opcionessexo = array(false => 'Mujer', true => 'Hombre');
      $this->widgetSchema['sexo'] = new sfWidgetFormChoice(array('choices' => $opcionessexo,'multiple' => false, 'expanded' => true, 'label' => 'Sexo'), array());
      $this->widgetSchema['comoseentero_id'] = new sfWidgetFormDoctrineChoice(array('model' => 'Comoseentero', 'method' => 'getName' , 'add_empty' => false, 'label' => '¿Cómo supo sobre Fit2Go?'), array());
      //$this->widgetSchema['tipoingrediente_list'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ingrediente'), 'multiple' => true, 'expanded' => true, 'label' => '¿Hay algo que le gustaría reemplazar?'), array());
      $this->widgetSchema['tipoingrediente_list'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tipoingrediente'), 'multiple' => true, 'expanded' => true, 'label' => '¿Hay algo que le gustaría reemplazar?'), array());
      $this->widgetSchema['clave'] = new sfWidgetFormInputPassword();
      
      
      $this->validatorSchema['nombre'] = new sfValidatorString(array('min_length' => 3,'max_length' => 20), array('min_length' => 'Por favor introduce un nombre de al menos 3 caracteres', 'max_length' => 'Por favor introduce un nombre de maximo 20 caracteres', 'required' => 'Este campo es Obligatorio'));
      $this->validatorSchema['apellido'] = new sfValidatorString(array('min_length' => 3,'max_length' => 20), array('min_length' => 'Por favor introduce un apellido de al menos 3 caracteres', 'max_length' => 'Por favor introduce un apellido de maximo 20 caracteres', 'required' => 'Este campo es Obligatorio'));
      $this->validatorSchema['email'] = new sfValidatorEmail(array(),array('required' => 'Este campo es Obligatorio', 'invalid' => 'Por favor introduce un email en formato valido "ejemplo@miejemplo.algo"'));
      $this->validatorSchema['clave'] = new sfValidatorString(array('min_length' => 6), array('min_length' => 'Por favor introduce una clave de al menos 6 caracteres', 'required' => 'Este campo es Obligatorio'));
      $this->validatorSchema['birthday'] = new sfValidatorDate(array(), array('required' => 'Por favor seleccione una Fecha', 'invalid' => 'Fecha no valida'));
      $this->validatorSchema['telefono1'] = new sfValidatorRegex(array('pattern' => "/^(^(1\s*[-\/\.]?)?(\((\d{3})\)|(\d{3}))\s*[-\/\.]?\s*(\d{3})\s*[-\/\.]?\s*(\d{4})\s*(([xX]|[eE][xX][tT])\.?\s*(\d+))*$)*$/", 'required' => true),
              array('invalid' => 'Ingrese un numero con el siguiente formato (xxx-xxx-xxxx)', 'required' => 'El campo Telefono 1 es Obligatorio'));
      $this->validatorSchema['telefono2'] = new sfValidatorRegex(array('pattern' => "/^(^(1\s*[-\/\.]?)?(\((\d{3})\)|(\d{3}))\s*[-\/\.]?\s*(\d{3})\s*[-\/\.]?\s*(\d{4})\s*(([xX]|[eE][xX][tT])\.?\s*(\d+))*$)*$/", 'required' => false),
              array('invalid' => 'Ingrese un numero con el siguiente formato (xxx-xxx-xxxx)'));
      $this->validatorSchema['sexo'] = new sfValidatorChoice(array('choices' => array_keys($opcionessexo), 'multiple' => false, 'required' => true, 'min' => 1), array('required' => 'Indique su Sexo'));
      $this->validatorSchema['cupon'] = new sfValidatorString(array('min_length' => 3,'max_length' => 20, 'required' => false), array('min_length' => 'Por favor introduce un cupon de al menos 3 caracteres', 'max_length' => 'Por favor introduce un nombre de maximo 20 caracteres'));
      $this->validatorSchema['nota_usuario'] = new sfValidatorString(array('min_length' => 6, 'max_length' => 250, 'required' => false), array('min_length' => 'Por favor introduce una nota de al menos 6 caracteres', 'max_length' => 'Por favor introduce un nombre de maximo 250 caracteres'));
      $this->validatorSchema['comoseentero_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('comoseentero')), array('required' => 'Seleccione una opcion por favor'));
      $this->validatorSchema['clave'] = new sfValidatorString(array('min_length' => 7, 'required' => false), array('min_length' => 'Por favor ingrese al menos 7 caracteres en su contraseña', 'required' => 'Este campo es Obligatorio'));
      
      $this->setDefault('tipo',1);
      $this->setDefault('telefono2','');
      $this->setDefault('created_at',time());
      $this->setDefault('updated_at',time());
      
      $this->widgetSchema['recurrente']->setLabel('Activar Pedido Automático');
      $this->widgetSchema['nota_usuario']->setLabel('¿Hay algo más que no le gustaría recibir?');
         
 
      /**
       * Se Agrega el formulario de tarjeta de credito
       */
      
          $formCC = new CreditcardnoobliForm(null, array ('usuario' => $this->getObject()));
          
          
          $this->embedForm('pago', $formCC);
          
          //$this->mergePostValidator(new sfValidatorDireccionVacia());
  }  
  
  /**
   *Este metodo sobreescribe el guardado normal de los formularios para evitar que se guarden direcciones o tarjetas de credito vacias vacias.
   * @param type $con
   * @param type $forms
   * @return type salva los formularios
   */
    public function saveEmbeddedForms($con = null, $forms = null)
    {
      if (null === $forms)
      {   
        $direccion1 = $this->getValue('direccion1');  
        $forms = $this->embeddedForms;

        if(isset($direccion1)){//revisar este isset
            foreach ($this->embeddedForms['direccion1'] as $name => $form)
            {
              if (!isset($direccion1[$name]))
              {
                unset($forms['direccion1'][$name]);
              }
            }
        }
        //tarjeta de credito
        $cc = $this->getValue('pago');  

        foreach ($this->embeddedForms['pago'] as $name => $form)
        {
          if (!isset($direccion1[$name]))
          {
            unset($forms['pago'][$name]);
          }
        }        
        
      }

      return parent::saveEmbeddedForms($con, $forms);
    }  
  
}
