<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('user/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(true) ?>
          <input type="submit" value="Registrarse" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['apellido']->renderLabel() ?></th>
        <td>
          <?php echo $form['apellido']->renderError() ?>
          <?php echo $form['apellido'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['clave']->renderLabel() ?></th>
        <td>
          <?php echo $form['clave']->renderError() ?>
          <?php echo $form['clave'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['birthday']->renderLabel() ?></th>
        <td>
          <?php echo $form['birthday']->renderError() ?>
          <?php echo $form['birthday'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telefono1']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefono1']->renderError() ?>
          <?php echo $form['telefono1'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telefono2']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefono2']->renderError() ?>
          <?php echo $form['telefono2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sexo']->renderLabel() ?></th>
        <td>
          <?php echo $form['sexo']->renderError() ?>
          <?php echo $form['sexo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cupon']->renderLabel() ?></th>
        <td>
          <?php echo $form['cupon']->renderError() ?>
          <?php echo $form['cupon'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comoseentero_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['comoseentero_id']->renderError() ?>
          <?php echo $form['comoseentero_id'] ?>
        </td>
      </tr>
      <tr>
        <td>
            Direccion de Facturacion
        </td>
      </tr>         
      <tr>
        <th><?php echo $form['direccion']['alias']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion']['alias']->renderError() ?>
          <?php echo $form['direccion']['alias'] ?>
        </td>
      </tr>      
      <tr>
        <th><?php echo $form['direccion']['direccion']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion']['direccion']->renderError() ?>
          <?php echo $form['direccion']['direccion'] ?>
        </td>
      </tr>       
      <tr>
        <th><?php echo $form['direccion']['ciudad']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion']['ciudad']->renderError() ?>
          <?php echo $form['direccion']['ciudad'] ?>
        </td>
      </tr>      
      <tr>
        <th><?php echo $form['direccion']['estado']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion']['estado']->renderError() ?>
          <?php echo $form['direccion']['estado'] ?>
        </td>
      </tr>      
      <tr>
        <th><?php echo $form['direccion']['zip']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion']['zip']->renderError() ?>
          <?php echo $form['direccion']['zip'] ?>
        </td>
      </tr>
       <tr>
        <td>
            Direccion secundaria Opcional
        </td>
      </tr>   
      <tr>
        <th><?php echo $form['direccion1'][0]['alias']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion1'][0]['alias']->renderError() ?>
          <?php echo $form['direccion1'][0]['alias'] ?>
        </td>
      </tr>      
      <tr>
        <th><?php echo $form['direccion1'][0]['direccion']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion1'][0]['direccion']->renderError() ?>
          <?php echo $form['direccion1'][0]['direccion'] ?>
        </td>
      </tr>       
      <tr>
        <th><?php echo $form['direccion1'][0]['ciudad']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion1'][0]['ciudad']->renderError() ?>
          <?php echo $form['direccion1'][0]['ciudad'] ?>
        </td>
      </tr>      
      <tr>
        <th><?php echo $form['direccion1'][0]['estado']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion1'][0]['estado']->renderError() ?>
          <?php echo $form['direccion1'][0]['estado'] ?>
        </td>
      </tr>      
      <tr>
        <th><?php echo $form['direccion1'][0]['zip']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion1'][0]['zip']->renderError() ?>
          <?php echo $form['direccion1'][0]['zip'] ?>
        </td>
      </tr>                  
      
      <tr>
        <th><?php echo $form['recurrente']->renderLabel() ?></th>
        <td>
          <?php echo $form['recurrente']->renderError() ?>
          <?php echo $form['recurrente'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tipoingrediente_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipoingrediente_list']->renderError() ?>
          <?php echo $form['tipoingrediente_list'] ?>
        </td>
      </tr>      
      <tr>
        <th><?php echo $form['nota_usuario']->renderLabel() ?></th>
        <td>
          <?php echo $form['nota_usuario']->renderError() ?>
          <?php echo $form['nota_usuario'] ?>
        </td>
      </tr>
      <tr>
          <td>
              Informacion de Pago
          </td>
      </tr>
      <tr>
        <th><?php echo $form['pago'][0]['numero']->renderLabel() ?></th>
        <td>
          <?php echo $form['pago'][0]['numero']->renderError() ?>
          <?php echo $form['pago'][0]['numero'] ?>
        </td>
      </tr>       
      <tr>
        <th><?php echo $form['pago'][0]['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['pago'][0]['nombre']->renderError() ?>
          <?php echo $form['pago'][0]['nombre'] ?>
        </td>
      </tr> 
      <tr>
        <th><?php echo $form['pago'][0]['codigo']->renderLabel() ?></th>
        <td>
          <?php echo $form['pago'][0]['codigo']->renderError() ?>
          <?php echo $form['pago'][0]['codigo'] ?>
        </td>
      </tr> 
      <tr>
        <th><?php echo $form['pago'][0]['fechavencimiento']->renderLabel() ?></th>
        <td>
          <?php echo $form['pago'][0]['fechavencimiento']->renderError() ?>
          <?php echo $form['pago'][0]['fechavencimiento'] ?>
        </td>
      </tr> 
      <tr>
        <th><?php echo $form['pago'][0]['tipo']->renderLabel() ?></th>
        <td>
          <?php echo $form['pago'][0]['tipo']->renderError() ?>
          <?php echo $form['pago'][0]['tipo'] ?>
        </td>
      </tr>       
    </tbody>
  </table>
</form>
