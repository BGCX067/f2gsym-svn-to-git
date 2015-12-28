<h1>Usuarios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Tipo</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Email</th>
      <th>Clave</th>
      <th>Birthday</th>
      <th>Telefono1</th>
      <th>Telefono2</th>
      <th>Sexo</th>
      <th>Cupon</th>
      <th>Comoseentero</th>
      <th>Activo</th>
      <th>Recurrente</th>
      <th>Nota usuario</th>
      <th>Nota administrador</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
      <td><a href="<?php echo url_for('user/edit?id='.$usuario->getId()) ?>"><?php echo $usuario->getId() ?></a></td>
      <td><?php echo $usuario->getTipo() ?></td>
      <td><?php echo $usuario->getNombre() ?></td>
      <td><?php echo $usuario->getApellido() ?></td>
      <td><?php echo $usuario->getEmail() ?></td>
      <td><?php echo $usuario->getClave() ?></td>
      <td><?php echo $usuario->getBirthday() ?></td>
      <td><?php echo $usuario->getTelefono1() ?></td>
      <td><?php echo $usuario->getTelefono2() ?></td>
      <td><?php echo $usuario->getSexo() ?></td>
      <td><?php echo $usuario->getCupon() ?></td>
      <td><?php echo $usuario->getComoseenteroId() ?></td>
      <td><?php echo $usuario->getActivo() ?></td>
      <td><?php echo $usuario->getRecurrente() ?></td>
      <td><?php echo $usuario->getNotaUsuario() ?></td>
      <td><?php echo $usuario->getNotaAdministrador() ?></td>
      <td><?php echo $usuario->getCreatedAt() ?></td>
      <td><?php echo $usuario->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('user/new') ?>">New</a>
