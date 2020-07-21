<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>    
        <link rel="stylesheet" href="<?=urlBase?>/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?=urlBase?>/assets/css/Estilos2.css" />
        <link href = "https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css"  rel = "stylesheet" >  <!-- https://ionicons.com/v4/ -->
        <link href = "https://fonts.googleapis.com/css2? family = Muli: wght @ 500 & display = swap" rel = "stylesheet"> <!-- https://fonts.google.com/ (Muli)-->

        <script src="<?=urlBase?>/assets/js/jquery.slim.js"></script>
        <script src="<?=urlBase?>/assets/js/popper.js"></script>
        <script src="<?=urlBase?>/assets/js/bootstrap.min.js"></script>
        <script src="<?=urlBase?>/assets/js/scripts.js"></script>
    </head>
    <body>
        <!-- Carrusel de los Productos del Supermercado -->
        <header class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?=urlBase?>/assets/img/verduras.jpg" class="img-fluid" alt="verduras">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Verduras Frescas</h3>
                            <p>zanagorias, habichuelas, colibri...</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?=urlBase?>/assets/img/Pescado.jpg" class="img-fluid" alt="pescado">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="text-white">Pescados</h3>
                            <p class="text-white">Cualquier variedad de pescado desde Pescado de rio hasta de mar</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?=urlBase?>/assets/img/Mecato.jpg" class="img-fluid" alt="mecato">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Mecatos</h3>
                            <p>Papas, chistris mas variedades como tambien todo tipo de dulces</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?=urlBase?>/assets/img/lacteos.jpg" class="img-fluid" alt="lacteos">
                        <div class="carousel-caption">
                            <h3 class="text-uppercase">Lacteos</h3>
                            <p class="text-dark">Leche, queso entre otros.</p>
                        </div> 
                    </div> <!--.carousel-item-->
                    <div class="carousel-item">
                        <img src="<?=urlBase?>/assets/img/carnes.jpg" class="img-fluid" alt="carnes">
                        <div class="carousel-caption">
                            <h3 class="text-uppercase">Carnes</h3>
                            <p>Cualquier variedad de carne podras encontrar</p>
                        </div> 
                    </div> <!--.carousel-item-->
                    <div class="carousel-item">
                        <img src="<?=urlBase?>/assets/img/Fruticas.jpg" class="img-fluid" alt="frutas">
                        <div class="carousel-caption">
                            <h3 class="text-uppercase">Frutas</h3>
                            <p>Manzanas, peras, uvas y muchas mas</p>
                        </div> 
                    </div> <!--.carousel-item-->
                    <div class="carousel-item">
                        <img src="<?=urlBase?>/assets/img/Aseo.jpg" class="img-fluid" alt="aseo">
                        <div class="carousel-caption">
                            <h3 class="text-uppercase text-dark">Aseo</h3>
                            <p class="text-dark">Productos de Aseo</p>
                        </div> 
                    </div> <!--.carousel-item-->
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>

        <!-- Barra de Navegacion de los Productos del Supermercado -->
        <div class="navegacion mt-3 py-2">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01"> 
                    <?php $categorias = Utils::verCategorias() ?>
                    <ul class="nav nav-justified w-100 flex-column flex-sm-row">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?=urlBase?>/usuario/inicio">Inicio</a>
                        </li>

                        <?php while($categoria = $categorias->fetch_object()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=urlBase?>/categoria/verCategorias&id=<?=$categoria->id?>"><?= $categoria->nombre ?></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </nav>
        </div>
        
        <div class="d-flex">
            <aside class="col-lg-3">
                <div class="sidebar">
                    <div>
                        <h4 class="letra-sidebar text-center text-uppercase">Mi Carrito</h4>
                        <a href="#" class="letras-sidebar"><i class="icon ion-md-beer text-center"></i>  Productos (0)</a><br/>
                        <a href="#" class="letras-sidebar"><i class="icon ion-logo-usd"></i>  Total: 0 $</a><br/>
                        <a href="#" class="letras-sidebar"><i class="icon ion-md-cart"></i>  Ver el carrito</a><br/>

                        <h5 class="letra-sidebar mt-4 text-uppercase"><?= $_SESSION['usuario']->nombre ?> <?= $_SESSION['usuario']->apellidos ?></h5>
                        <?php if(isset($_SESSION['admin'])): ?>
                            <a href="#" class="letras-sidebar"><i class="icon ion-md-folder"></i>  Gestionar categorias</a><br/>
                            <a href="<?=urlBase?>/producto/mostrar" class="letras-sidebar"><i class="icon ion-md-beer"></i>  Gestionar productos</a><br/>
                            <a href="#" class="letras-sidebar"><i class="icon ion-md-chatbubbles"></i>  Gestionar pedidos</a><br/>
                        <?php endif; ?>

                        <?php if(isset($_SESSION['usuario'])): ?>
                            <a href="#" class="letras-sidebar"><i class="icon ion-md-body"></i> Mis pedidos</a><br/>
                            <a href="<?=urlBase?>/usuario/logout" class="letras-sidebar"><i class = "icon ion-md-power"></i>  Cerrar sesión </a>
                        <?php endif; ?>
                    </div>
                </div>
            </aside>
            <div class="w-100 barra-lateral"> <!-- Contenido Central -->
                <?php if(isset($_GET['id'])): ?>
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
                <?php else: ?>
                    <?php  
                        require_once 'controllers/ProductoController.php';
                        $destacado = new ProductoController();
                        $destacado->index();
                    ?>
                <?php endif; ?>
            </div> <!-- Fin Contenido Central -->
        </div>
        
        <footer class="footer-sitio pt-3 mt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-uppercase text-center pb-4">Nosotros</h3>
                        <p class="text-justify">
                            Somos unas Empresa que se preocupa por atender bien a nuestros clientes y ofrecer productos de muy buena calidad. 
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h3 class="text-uppercase pb-4">Horario</h3>
                        <p>Lunes-Viernes: 6am-10pm</p>
                        <p>Sabado: 8am-6pm</p>
                        <p>Domingo: 10am-3pm</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h3 class="text-uppercase pb-4">Contacto</h3>
                        <p>Direccion: Dosquebradas</p>
                        <p>Celular: 3126824599</p>
                        <p><i class="icon ion-logo-facebook"></i> <i class="icon ion-logo-instagram"></i> <i class="icon ion-logo-whatsapp"> </i> <i class = "icon ion-logo-youtube"></i></p>
                    </div>
                    <hr class="w-100">
                    <p class="text-center copyright w-100">Supermercado Huertas. Todos los derechos reservados</p>
                </div>
            </div>
        </footer>
    </body>
</html>
