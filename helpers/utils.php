<?php

class Utils 
{
    public static function borrarSesion($nombre) 
    {
        if(isset($_SESSION[$nombre])) 
        {
            $_SESSION[$nombre] = null;
            unset($_SESSION[$nombre]);
        }

        return $nombre;
    }
    
    public static function verCategorias()
    {
        require_once 'models/Categoria.php';
        $categoria = new ModeloCategoria();
        $categorias = $categoria->getCategorias();

        return $categorias;
    }
}