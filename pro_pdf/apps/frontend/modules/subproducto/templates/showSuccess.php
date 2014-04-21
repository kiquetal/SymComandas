<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $sub_producto->getId() ?></td>
    </tr>
    <tr>
      <th>Producto:</th>
      <td><?php echo $sub_producto->getProductoId() ?></td>
    </tr>
    <tr>
      <th>Ingredientes:</th>
      <td><?php echo $sub_producto->getIngredientesId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $sub_producto->getNombre() ?></td>
    </tr>
    <tr>
      <th>Precio:</th>
      <td><?php echo $sub_producto->getPrecio() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('subproducto/edit?id='.$sub_producto->getId().'&producto_id='.$sub_producto->getProductoId().'&ingredientes_id='.$sub_producto->getIngredientesId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('subproducto/index') ?>">List</a>
