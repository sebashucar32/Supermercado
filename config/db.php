<?php

class DataBase 
{
    public static function connect() 
    {
        $conexion = new mysqli('localhost', 'root', '', 'supermercado');
        $conexion->query("set names 'utf8'");
        
        return $conexion;
    }
}




