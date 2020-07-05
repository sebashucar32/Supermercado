<?php

require_once 'models/usuario.php';
    
class UsuarioController 
{
    public function index() 
    {
        require_once 'views/login.php';
    }

    public function inicio() 
    {
        require_once 'views/inicio.php';
    }

    public function registro() 
    {   
        require_once 'views/registro.php';   
        if(isset($_POST)) 
        {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $correo = isset($_POST['email']) ? $_POST['email'] : false;
            $contrasena = isset($_POST['password']) ? $_POST['password'] : false;
            $fechaNacimiento = isset($_POST['fecha']) ? $_POST['fecha'] : false;
            $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : false;
            $celular = isset($_POST['numero']) ? $_POST['numero'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $ciudades = isset($_POST['ciudades']) ? $_POST['ciudades'] : false;
            
            if($nombre && $apellidos && $correo && $contrasena && $fechaNacimiento && $sexo && $celular && $direccion && $ciudades) 
            {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setCorreo($correo);
                $usuario->setContrasena($contrasena);
                $usuario->setFechaNacimiento($fechaNacimiento);
                $usuario->setSexo($sexo);
                $usuario->setCelular($celular);
                $usuario->setDireccion($direccion);
                $usuario->setCiudad($ciudades);

                $guardar = $usuario->guardar();

                if($guardar){
                    $_SESSION['register'] = "complete";
                    header("Location:" . urlBase);
                    ob_end_flush();
                }else { 
                    $_SESSION['register'] = "failed";
				}
            }
            else
            {
                $_SESSION['register'] = "failed";
            }
        }         
    }

    public function login()
    {
        if(isset($_POST))
        {
            $usuario = new Usuario();
			$usuario->setCorreo($_POST['email']);
			$usuario->setContrasena($_POST['password']);
			
			$usuarioLogueado = $usuario->login();
			
			if($usuarioLogueado && is_object($usuarioLogueado)){
				$_SESSION['usuario'] = $usuarioLogueado;
				
				if($usuarioLogueado->rol == 'admin'){
					$_SESSION['admin'] = true;
                }
                
				header("Location:" . urlBase . '/usuario/inicio');
			}else{
                $_SESSION['error_login'] = 'Identificación fallida !!';
                header("Location:" . urlBase);
			}
        }
    }

    public function logout() 
    {
        if(isset($_SESSION['usuario'])) {
            unset($_SESSION['usuario']);
        }
        
        if(isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        
        header("Location:" . urlBase);
    }
}