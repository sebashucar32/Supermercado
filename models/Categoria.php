<?php

class ModeloCategoria 
{
    private $id;
    private $nombre;
    private $conexion;

    public function __construct()
    {
        $this->conexion = DataBase::connect();
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $this->conexion->real_escape_string($nombre);
    }

    public function getOne()
    {
        $categoria = $this->conexion->query("SELECT * FROM categorias WHERE id = {$this->getId()}");
        return $categoria->fetch_object();
    }

    public function getCategorias()
    {
        $categorias = $this->conexion->query("SELECT * FROM categorias");
        return $categorias;
    }
}






