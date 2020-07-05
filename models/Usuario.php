<?php

class Usuario
{
    private $id;
    private $nombre;
    private $apellidos;
    private $correo;
    private $contrasena;
    private $fechaNacimiento;
    private $sexo;
    private $celular;
    private $direccion;
    private $ciudad;
    private $rol;
    //variable de conexion para base de datos
    private $conexion;

    public function __construct() {
        $this->conexion = DataBase::connect();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getCelular() {
        return $this->celular;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getRol() {
        return $this->rol;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNombre($nombre): void {
        $this->nombre = $this->conexion->real_escape_string($nombre);
    }

    function setApellidos($apellidos): void {
        $this->apellidos = $this->conexion->real_escape_string($apellidos);
    }

    function setCorreo($correo): void {
        $this->correo = $this->conexion->real_escape_string($correo);
    }

    function setContrasena($contrasena): void {
        $this->contrasena = $this->conexion->real_escape_string($contrasena);
    }

    function setFechaNacimiento($fechaNacimiento): void {
        $this->fechaNacimiento = $this->conexion->real_escape_string($fechaNacimiento);
    }

    function setSexo($sexo): void {
        $this->sexo = $this->conexion->real_escape_string($sexo);
    }

    function setCelular($celular): void {
        $this->celular = $this->conexion->real_escape_string($celular);
    }

    function setDireccion($direccion): void {
        $this->direccion = $this->conexion->real_escape_string($direccion);
    }

    function setCiudad($ciudad): void {
        $this->ciudad = $this->conexion->real_escape_string($ciudad);
    }

    function setRol($rol): void {
        $this->rol = $this->conexion->real_escape_string($rol);
    }

    public function guardar() 
    {
        $consulta = "INSERT INTO clientes(nombre, apellidos, correo, contrasena, fechaNacimiento, sexo, celular, direccion, ciudad, rol) VALUES('{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getCorreo()}', md5('{$this->getContrasena()}'), '{$this->getFechaNacimiento()}', '{$this->getSexo()}', '{$this->getCelular()}', '{$this->getDireccion()}', '{$this->getCiudad()}', 'usuario') ";
        $guardar = $this->conexion->query($consulta);

        $resultado = false;

        if($guardar == true) {
            $resultado = true;
            return $resultado;
        }

        return $resultado;
    }

    public function login() 
    {
        $resultado = false;

        $correo = $this->correo;
        $contrasena = $this->contrasena;

        $consulta = "SELECT * FROM clientes WHERE correo = '$correo'";
        $login = $this->conexion->query($consulta);

        
        if($login && $login->num_rows == 1) 
        {
            $usuario = $login->fetch_object();
            $contrasenaEncriptada = md5($contrasena);
            
            if($contrasenaEncriptada == $usuario->contrasena) {
                $resultado = $usuario;
            }
        }

        return $resultado;
    }

    public function cargarCiudades() 
    {
        $consultaId = "SELECT MAX(id) as maximo FROM ubicacion";
        $consultaMaximoID = $this->conexion->query($consultaId);
        $datoMaximo = $consultaMaximoID->fetch_assoc();
        $maximo = intval($datoMaximo["maximo"]);
        $ciudades = Array();

        for($i=1; $i <= $maximo; $i++) 
        {
            $consulta = "select * from ubicacion where id = '$i';";
            $consultaCiudades = $this->conexion->query($consulta);
            $ciudad = $consultaCiudades->fetch_object();
            array_push($ciudades, $ciudad);
        }

        return $ciudades;
    }
}

 