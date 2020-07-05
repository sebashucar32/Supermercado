<?php 
    require_once 'models/Usuario.php';
    $usuario = new Usuario();
    $ciudades = $usuario->cargarCiudades();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Supermercado</title>
        <link rel="stylesheet" href="<?=urlBase?>/assets/css/styles.css" />        
        <link rel="stylesheet" href="<?=urlBase?>/assets/css/bootstrap.min.css" /> 
        <script src="<?=urlBase?>/assets/js/Validaciones/registro.js"></script>
        <script src="<?=urlBase?>/assets/js/SweetAlert/sweetalert2.all.min.js"></script> 
    </head>
    <body>
        <br/>
        <div class="container">
            <div class="row">   
                <div class="col-7 offset-3 col-md-5 offset-md-4 col-sm-7 offset-sm-3 col-lg-4 offset-lg-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h1 class="letra-azul">Registrate</h1>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?=urlBase?>/usuario/registro" onsubmit="return validarRegistro()">
                                <label class="titulo-oscuro mx-5 mb-3" for="nombre">Nombre:</label>
                                <input type="text" id="nombre" class="mx-5 mb-3" name="nombre" />

                                <label class="titulo-oscuro mx-5 mb-3" for="apellidos">Apellidos:</label>
                                <input type="text" id="apellidos" class="mx-5 mb-3" name="apellidos" />

                                <label class="titulo-oscuro mx-5 mb-3" for="email">Correo:</label>
                                <input type="email" id="correo" class="mx-5 mb-3" name="email" />

                                <label class="titulo-oscuro mx-5 mb-3" for="password">Contraseña:</label>
                                <input type="password" id="contrasena" class="mx-5 mb-3" name="password" />

                                <label class="titulo-oscuro mx-5 mb-3" for="fecha">Fecha de nacimiento:</label>
                                <input type="date" id="fecha" class="mx-5 mb-3" name="fecha" />
                                
                                <div>
                                    <label class="titulo-oscuro" for="sexo">Sexo:</label>
                                    Hombre <input type="radio" id="hombre" name="sexo" value="Hombre"/>
                                    Mujer <input type="radio" id="mujer" name="sexo" value="Mujer"/>
                                </div>

                                <label class="titulo-oscuro mx-5 mb-3" for="numero">Celular: </label><br/>
                                <input type="number" id="celular" class="mx-5 mb-3" name="numero" /><br/>
                                
                                <label class="titulo-oscuro mx-5 mb-3" for="direccion">Direccion: </label><br/>
                                <textarea name="direccion" id="direccion" class="mx-5 mb-3"></textarea><br/>
                                
                                <label class="titulo-oscuro mx-5 mb-3" for="direccion">Ciudad: </label><br/>
                                <select name="ciudades" id="ciudades" class="mx-5 mb-3">
                                    <?php                                
                                        foreach($ciudades as $indice => $ciudad): 
                                            $id = intval($ciudad->id); 
                                            $nombreCiudad = $ciudad->nombreCiudad;
                                            ?>
                                            <option value="<?= $id ?>"><?= $nombreCiudad ?></option>
                                            <?php 
                                        endforeach;
                                    ?>    
                                </select><br/> 
                                <button type="submit" class="btn btn-success mt-2">Registrarse</button>
                                <a href="<?=urlBase?>" class="btn btn-primary mt-2">Login</a>
                            </form>
                        </div>
                    </div><br/>
                </div>
            </div>
        </div>
    </body>
</html>