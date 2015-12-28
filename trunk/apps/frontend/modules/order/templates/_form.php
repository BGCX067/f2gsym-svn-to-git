<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('order/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('order/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'order/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['usuario_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['usuario_id']->renderError() ?>
          <?php echo $form['usuario_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['placedby_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['placedby_id']->renderError() ?>
          <?php echo $form['placedby_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['direccion_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion_id']->renderError() ?>
          <?php echo $form['direccion_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['monto']->renderLabel() ?></th>
        <td>
          <?php echo $form['monto']->renderError() ?>
          <?php echo $form['monto'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['status']->renderLabel() ?></th>
        <td>
          <?php echo $form['status']->renderError() ?>
          <?php echo $form['status'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['autorizacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['autorizacion']->renderError() ?>
          <?php echo $form['autorizacion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['referencia']->renderLabel() ?></th>
        <td>
          <?php echo $form['referencia']->renderError() ?>
          <?php echo $form['referencia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['avsresultado']->renderLabel() ?></th>
        <td>
          <?php echo $form['avsresultado']->renderError() ?>
          <?php echo $form['avsresultado'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cvv2']->renderLabel() ?></th>
        <td>
          <?php echo $form['cvv2']->renderError() ?>
          <?php echo $form['cvv2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mensajeerror']->renderLabel() ?></th>
        <td>
          <?php echo $form['mensajeerror']->renderError() ?>
          <?php echo $form['mensajeerror'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cupon_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['cupon_id']->renderError() ?>
          <?php echo $form['cupon_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['manual']->renderLabel() ?></th>
        <td>
          <?php echo $form['manual']->renderError() ?>
          <?php echo $form['manual'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['pago']->renderLabel() ?></th>
        <td>
          <?php echo $form['pago']->renderError() ?>
          <?php echo $form['pago'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
