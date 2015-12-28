<?php
class InicioSesionForm extends BaseForm
{
  public function configure()
  {

    $this->widgetSchema['email']= new sfWidgetFormInputText();
    $this->widgetSchema['clave']= new sfWidgetFormInputPassword();

    $this->validatorSchema['email'] = new sfValidatorEmail(array('required'=>true),array('required' => 'El email es Obligatorio.', 'invalid' => 'El formato del email que ingreso es incorrecto'));
    $this->validatorSchema['clave'] = new sfValidatorString(array('required'=>true),array('required' => 'La clave es Obligatoria.'));
      
  

$this->widgetSchema->setLabels(array(
  'email'  => 'Email',
  'clave'   => 'Contraseña',
));

   // $this->widgetSchema['Nombre']->setAttributes(array('class' => ''));
    //$this->widgetSchema['Contraseña']->setAttributes(array('class' => ''));

   $this->widgetSchema->setNameFormat('iniciosesion[%s]');


  }
  
  /**
   * Metodo para configurar el formulario, pedir el email y recuperar la clave
   */
  public function recuperarclave(){
      
      $this->useFields(array('email'));
      
  }
}
?>
