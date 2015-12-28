<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
 <div id="principal">
          <div id="header">
              <div id="logo_header">
                  <a href="<?php echo url_for('@homepage'); ?>"><img src="/images/logo-fit2go.png" alt=" " /></a>
              </div>
              <div id="login">
                  cerrar sesion
              </div>                         
          </div>
          
          <div id="menu_izquierdo">
            <?php echo link_to('How do you ear about us?', '@comoseentero') ?>
            <?php echo link_to('Ingredients', '@ingrediente') ?>
            <?php echo link_to('Type of Ingredient', '@tipoingrediente') ?>
            <?php echo link_to('Category', '@categoria') ?>
            <?php echo link_to('Dish', '@plato') ?>
            <?php echo link_to('Menu', '@menu') ?>
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
