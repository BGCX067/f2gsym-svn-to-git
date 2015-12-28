<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
      <title>
        <?php if (!include_slot('title')): ?>
            Fit2Go Meal - healthy gourmet
        <?php endif; ?>
      </title>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php use_javascript('jquery-1.6.1.min.js') ?>
    <?php include_javascripts() ?>
  </head>
    
  <?php $form = new InicioSesionForm();?>
    
  <body>
      <div id="principal">
          <div id="header">
              <div id="logo_header">
                  <a href="<?php echo url_for('@homepage'); ?>"><img src="/images/logo-fit2go.png" alt=" " /></a>
            </div>
              <div id="menu_superior">
                  contactanos----
              </div>
              <div id="login">
                  
                <?php if(!$sf_user->isAuthenticated()){ ?>
                    <span class="box_login">
                    <span class="border_box">

                    <?php include_partial('user/formsesion', array('form' => $form)) ?>


                    </span>
                    <?php //echo link_to('<span class="link-olvidoclave">¿Olvido su contraseña?</span>', '@recuperarclave'); ?>

                    </span>

                <?php }else{ ?>

                    Estas registrado<br /> <?php echo link_to('<span class="link-registro">Cerrar Sesion</span>', 'user/cerrarsesion'); ?>

                    

                    <?php echo link_to('Mi Panel de Control', '@controlpanel'); ?><br/>        

                <?php }?>

                  
              </div>                         
          </div>
          
          <div id="menu_izquierdo">
              <?php echo link_to1('Menu', '@order') ?>
       
              <a href="#">Delivery</a>
    
             <a href="#"> Our Company</a>
     
              <a href="#">Our Clients</a>
      
             <a href="#"> Blog</a>
         
             <a href="#"> F.A.Q</a>
          
              <a href="#">Idiomas</a>
         
             <a href="#"> Redes Sociales</a>
          </div>
          
          <div id="contenido">
              
              <?php echo $sf_content ?>
              
          </div>
          
          <div id="menu_inferior">
              HOME MENU DELIVERY OUR COMPANY OUR CLIENTS F.A.Q. CONTACT US USER AGREEMENT
          </div>
          
          
      </div>

  </body>
</html>
