<?php

class ModeloProducto
{
    private $id;
    private $nombre;
    private $idCategoria;
    private $descripcion;
    private $precio;
    private $cantidad;
    private $imagen;

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

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getImagen()
    {
        return $this->imagen;
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

    public function setPrecio($precio): void 
    {
        $this->precio = $precio;
    }

    public function setCantidad($cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    public function setImagen($imagen): void
    {
        $this->imagen = $imagen;
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

    //FUNCIONES DEL CRUD
    public function mostrarProductos()
    {
        $sql = "SELECT * FROM productos";
        $productos = $this->conexion->query($sql);

        return $productos;
    }

    public function crearProductos()
    {
        $sql = "INSERT INTO productos(nombre, id_categoria, descripcion, precio, cantidad, imagen) VALUES('{$this->getNombre()}', {$this->getIdCategoria()}, '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getCantidad()}, '{$this->getImagen()}');";
        $guardar = $this->conexion->query($sql);

        $resultado = false;
        if($guardar) 
        {
            $resultado = true; 
        } 
        
        return $resultado;
    }

    public function obtenerProductoUnico()
    {
        $sql = "SELECT * FROM productos WHERE id = {$this->getId()} ";
        $producto = $this->conexion->query($sql);
        return $producto->fetch_object();
    }

    public function editarProducto()
    {
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}', id_categoria={$this->getIdCategoria()}, Precio={$this->getPrecio()}, descripcion='{$this->getDescripcion()}', cantidad={$this->getCantidad()}";

        if($this->getImagen() != null)
        {
            $sql .= ", imagen='{$this->getImagen()}'"; 
        }

        $sql .= " WHERE id={$this->id};";

        $save = $this->conexion->query($sql);

        $resultado = false;
        if($save)
        {
            $resultado = true;
        }

        return $resultado;
    }

    public function eliminarProducto()
    {
        $sql = "DELETE FROM productos WHERE id = {$this->getId()};";
        $eliminar = $this->conexion->query($sql);

        $resultado = false;

        if($eliminar)
        {
			$result = true;
        }
        
		return $resultado;
    }
}

