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
}