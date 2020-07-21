<link rel="stylesheet" href="<?=urlBase?>/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?=urlBase?>/assets/css/Estilos2.css" />

<?php if(isset($editarProducto) && isset($productoUnico) && is_object($productoUnico)): ?>
    <h1 class="text-center">Editar producto <?=$productoUnico->nombre?></h1>
	<?php $url_action = urlBase."/producto/guardar&id=".$productoUnico->id; ?>
<?php else: ?>
    <h1 class="text-center">Crear nuevos productos</h1>
    <?php $url_action = urlBase."/producto/guardar"; ?>
<?php endif; ?>

<div class="container text-center">
    <form method="POST" action="<?=$url_action?>" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault01">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="validationDefault01" value="<?=isset($productoUnico) && is_object($productoUnico) ? $productoUnico->nombre : ''; ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="inputState">Categoria</label>
                <?php $categorias = Utils::verCategorias(); ?>
                <select name="categoria" id="inputState" class="form-control" >
                    <?php while ($categoria = $categorias->fetch_object()): ?>
                        <option value="<?= $categoria->id ?>" <?=isset($productoUnico) && is_object($productoUnico) && $categoria->id == $productoUnico->id_categoria ? 'selected' : ''; ?>>
                            <?= $categoria->nombre ?>
                        </option>
                    <?php endwhile; ?>
                </select>   
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationDefaultUsername">Precio</label>
                <input type="number" name="precio" class="form-control" id="validationDefault01" value="<?=isset($productoUnico) && is_object($productoUnico) ? $productoUnico->Precio: ''; ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationDefault03">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" id="validationDefault03" value="<?=isset($productoUnico) && is_object($productoUnico) ? $productoUnico->descripcion: '' ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" id="validationDefault04" value="<?=isset($productoUnico) && is_object($productoUnico) ? $productoUnico->cantidad: '' ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label for="imagen">Imagen</label>
                <?php if(isset($productoUnico) && is_object($productoUnico) && !empty($productoUnico->imagen)): ?>
                    <img src="<?=urlBase?>/assets/img/cards/<?=$productoUnico->imagen?>" class="thumb"/> 
                <?php endif; ?>
                <input type="file" name="imagen" class="form-control-file" value="" />
            </div>
        </div>
        <button style="margin-top: 200px;" type="submit" class="btn btn-success mt-2">Guardar</button>
    </form>
</div>