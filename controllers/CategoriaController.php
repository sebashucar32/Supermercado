<?php

require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class CategoriaController
{   
    public function index()
    {
        $categoria = new ModeloCategoria();
        $categorias = $categoria->getCategorias();

        require_once 'views/Categorias/index.php';
    }

    public function verCategorias()
    {
        if(isset($_GET['id'])) 
        {
            $id = $_GET['id'];

            //Conseguir Categoria
            $categoria = new ModeloCategoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();

            //Conseguir Productos
            $producto = new ModeloProducto();
            $producto->setIdCategoria($id);
            $productos = $producto->obtenerProductosPorCategoria();
        }

        require_once 'views/inicio.php';
    }

    public function verduras()
    {
        require_once 'views/inicio.php';
    }

    public function pescados()
    {
        require_once 'views/inicio.php';
    }

    public function mecato()
    {
        require_once 'views/inicio.php';
    }

    public function lacteos()
    {
        require_once 'views/inicio.php';
    }

    public function carnes()
    {
        require_once 'views/inicio.php';
    }

    public function frutas()
    {
        require_once 'views/inicio.php';
    }

    public function aseo()
    {
        require_once 'views/inicio.php';
    }
}



