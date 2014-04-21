<h1>Sub productos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Producto</th>
      <th>Ingredientes</th>
      <th>Nombre</th>
      <th>Precio</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sub_productos as $sub_producto): ?>
    <tr>
      <td><a href="<?php echo url_for('subproducto/show?id='.$sub_producto->getId().'&producto_id='.$sub_producto->getProductoId().'&ingredientes_id='.$sub_producto->getIngredientesId()) ?>"><?php echo $sub_producto->getId() ?></a></td>
      <td><a href="<?php echo url_for('subproducto/show?id='.$sub_producto->getId().'&producto_id='.$sub_producto->getProductoId().'&ingredientes_id='.$sub_producto->getIngredientesId()) ?>"><?php echo $sub_producto->getProductoId() ?></a></td>
      <td><a href="<?php echo url_for('subproducto/show?id='.$sub_producto->getId().'&producto_id='.$sub_producto->getProductoId().'&ingredientes_id='.$sub_producto->getIngredientesId()) ?>"><?php echo $sub_producto->getIngredientesId() ?></a></td>
      <td><?php echo $sub_producto->getNombre() ?></td>
      <td><?php echo $sub_producto->getPrecio() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('subproducto/new') ?>">New</a>
