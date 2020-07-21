<link rel="stylesheet" href="<?=urlBase?>/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?=urlBase?>/assets/css/Estilos2.css" />
<h1 class="text-center">Productos Existentes en el Supermercado</h1>

<a href="<?=urlBase?>/producto/crear" class="btn btn-success ml-2 mb-3">Crear Producto</a>

<table class="table">
    <thead class="text-center thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">PRECIO</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">ACCIONES</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php while($producto = $productos->fetch_object()): ?>
            <tr>
                <th scope="row"><?=$producto->id?></th>
                <td><?=$producto->nombre?></td>
                <td><?=$producto->Precio?></td>
                <td><?=$producto->cantidad?></td>
                <td>
                    <a href="<?=urlBase?>/producto/editar&id=<?=$producto->id?>" class="btn btn-warning">Editar</a>
                    <a href="<?=urlBase?>/producto/eliminar&id=<?=$producto->id?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
  </tbody>
</table>