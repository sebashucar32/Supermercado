<?php

function controllers_autoload($className) {               //Funcion que me permitira tener un acceso a las rutas del controlador
    include 'controllers/' . $className . '.php';
}

spl_autoload_register('controllers_autoload');            //Me registra el metodo de los controladores