<?php

require_once 'models/Producto.php';

class ProductoController
{
    public function index()
    {
        $producto = new ModeloProducto();
        $productos = $producto->productosAleatorios(6);

        require_once 'views/destacados.php';
    }

    public function mostrar()
    {
        $producto = new ModeloProducto();
        $productos = $producto->mostrarProductos();

        require_once 'views/MostrarProductos.php';
    }

    public function crear()
    {
        require_once 'views/CrearProductos.php';
    }

    public function guardar()
    {
        if(isset($_POST))
        {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;

            if($nombre && $categoria && $precio && $descripcion && $cantidad) 
            {
                $producto = new ModeloProducto();
                $producto->setNombre($nombre);
                $producto->setIdCategoria($categoria);
                $producto->setPrecio($precio);
                $producto->setDescripcion($descripcion);
                $producto->setCantidad($cantidad);

                // Guardar la imagen
                if(isset($_FILES['imagen']))
                {
					$archivo = $_FILES['imagen'];
					$nombreArchivo = $archivo['name'];
                    $tipoArchivo = $archivo['type'];

                    if($tipoArchivo == "image/jpg" || $tipoArchivo == 'image/jpeg' || $tipoArchivo == 'image/png' || $tipoArchivo == 'image/gif')
                    {
                        if(!is_dir('assets/img/cards'))
                        {
							mkdir('assets/img/cards', 0777, true);
						}

						$producto->setImagen($nombreArchivo);
						move_uploaded_file($archivo['tmp_name'], 'assets/img/cards/'.$nombreArchivo);
					}
                }

                if(isset($_GET['id']))
                {
					$id = $_GET['id'];
                    $producto->setId($id);
                    
					$guardar = $producto->editarProducto();
                }
                else
                {
					$guardar = $producto->crearProductos();
                }

                if($guardar)
                {
                    $_SESSION['register'] = "complete";
                    //ob_end_flush();
                }
                else 
                { 
                    $_SESSION['register'] = "failed";
                }
            }
            else
            {
                $_SESSION['register'] = "failed";
            }
        }
        header("Location:" . urlBase . "/producto/mostrar");
    }

    public function editar()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $editarProducto = true;

            $producto = new ModeloProducto();
            $producto->setId($id);

            $productoUnico = $producto->obtenerProductoUnico();

            require_once 'views/CrearProductos.php';   
        }
        else
        {
            header('Location:' . urlBase . '/producto/mostrar');
        }
    }

    public function eliminar()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $producto = new ModeloProducto();
            $producto->setId($id);

            $borrarProducto = $producto->eliminarProducto();
            
            if($borrarProducto) 
            {
                $_SESSION['delete'] = 'complete';
            }
            else
            {
                $_SESSION['delete'] = 'failed';
            }
        }
        else
        {
            $_SESSION['delete'] = 'failed';
        }
        header('Location:' . urlBase . '/producto/mostrar');
    }
}


