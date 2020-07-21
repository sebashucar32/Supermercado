<h1 class="text-center text-uppercase">Nuestros Productos Principales</h1>

<div class="container">
    <div class="row text-center mx-5">
        <?php while($producto = $productos->fetch_object()): ?>
            <div class="card mr-5 ml-4 mt-4">
                <img src="<?=urlBase?>/assets/img/cards/<?=$producto->imagen?>" />
                <div class="info-card">
                    <h5><?=$producto->nombre?></h5>
                    <p><?=$producto->Precio?>$</p>
                    <p><?=$producto->descripcion?></p>
                    <a href="#" class="btn btn-primary" data-id="1">Agregar Al Carrito</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
</br></br>





