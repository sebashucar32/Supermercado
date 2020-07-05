<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Login Supermercado</title>
        <link rel="stylesheet" href="<?=urlBase?>/assets/css/styles.css" />        
        <link rel="stylesheet" href="<?=urlBase?>/assets/css/bootstrap.min.css" />
        <script src="<?=urlBase?>/assets/js/Validaciones/login.js"></script>
        <script src="<?=urlBase?>/assets/js/SweetAlert/sweetalert2.all.min.js"></script>
    </head>
    <body>
        <br/>
        <div class="container mt-5">
            <div class="row">   
                <div class="col-7 offset-3 col-md-5 offset-md-4 col-sm-7 offset-sm-3 col-lg-4 offset-lg-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h1 class="letra-azul py-4">Iniciar Sesión</h1>
                        </div>
                        <div class="card-body">
                            <?php if(!isset($_SESSION['usuario'])): ?>                            
                                <form method="POST" action="<?=urlBase?>/usuario/login" onsubmit="return validarLogin()">
                                    <label class="titulo-oscuro mx-3 mb-3" for="email">Correo:</label>
                                    <input class="mx-4 my-2" type="email" id="correo" name="email" />
                                    
                                    <label class="titulo-oscuro mx-4 mb-3" for="password">Contraseña:</label>
                                    <input type="password" class="mx-4 mb-5" id="contrasena" name="password" />
                                    
                                    <button style="margin-top: 200px;" type="submit" class="btn btn-success btn-block mt-2">Ingresar</button>      
                                </form>                                                                
                            <?php endif; ?>                            
                            <a href="<?=urlBase?>/usuario/registro" class="btn btn-primary btn-block mt-2">Registrate</a>
                        </div>
                    </div><br/>
                </div>
            </div>
        </div>
    </body>
</html>