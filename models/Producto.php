<?php

class ModeloProducto
{
    private $id;
    private $nombre;
    private $idCategoria;
    private $descripcion;
    private $conexion;

    public function __construct()
    {
        $this->conexion = DataBase::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setIdCategoria($idCategoria): void
    {
        $this->idCategoria = $idCategoria;
    }

    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function productosAleatorios($limite)
    {
        $productos = $this->conexion->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limite");
        return $productos;
    }

    public function obtenerProductosPorCategoria()
    {   
        $sql = "SELECT * FROM productos p 
                INNER JOIN categorias c ON c.id = p.id_categoria
                WHERE p.id_categoria = {$this->getIdCategoria()}";
        $productos = $this->conexion->query($sql);

        return $productos;
    }
}