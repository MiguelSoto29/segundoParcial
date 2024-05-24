<?php
class Categoria
{
    //ATRIBUTOS
    private $idCategoria;
    private $descripcion;

    //CONSTRUCTOR
    public function __construct($idCategoria, $descripcion)
    {
        $this->idCategoria = $idCategoria;
        $this->descripcion = $descripcion;
    }

    //OBSERVADORES
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    //MODIFICADORES
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function __toString()
    {
        return "Categoria: " . $this->getIdCategoria() . "\n" .
        "Descripcion: " . $this->getDescripcion();
    }
}
