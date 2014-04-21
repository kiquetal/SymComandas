<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $producto->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $producto->getNombre() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('productos/edit?id='.$producto->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('productos/index') ?>">List</a>
