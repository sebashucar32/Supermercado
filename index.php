<?php

session_start();
ob_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parametros.php';
require_once 'helpers/utils.php';

function verErrores() 
{
    $error = new ErrorController();
    $error->index();
}

if(isset($_GET['controller'])) {         //Si no es nulo la url pasado por el controlador
    $nombreControlador = $_GET['controller'] . 'Controller';
} elseif(!isset($_GET['controller']) && !isset($_GET['accion'])) {       //Si es nulo el controlador y nula la accion entonces me redirige al login
    $nombreControlador = controladorporDefecto;
} else {
    verErrores();
    exit(); 
}

if(class_exists($nombreControlador)) {
    $controlador = new $nombreControlador();

    if(isset($_GET['accion']) && method_exists($controlador, $_GET['accion'])) {
        $accion = $_GET['accion'];
        $controlador->$accion();
    } elseif(!isset($_GET['controller']) && !isset($_GET['accion'])) {
        $accionInicial = accionInicial;
        $controlador->$accionInicial();
    } else {
        verErrores();
    }   
} else {
    verErrores();
}

