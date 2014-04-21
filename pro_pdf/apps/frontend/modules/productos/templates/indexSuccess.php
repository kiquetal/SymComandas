<h1>Productos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($productos as $producto): ?>
    <tr>
      <td><a href="<?php echo url_for('productos/show?id='.$producto->getId()) ?>"><?php echo $producto->getId() ?></a></td>
      <td><?php echo $producto->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('productos/new') ?>">New</a>
