<?php
class Equipo
{
    //ATRIBUTOS
    private $nombre;
    private $nombreCapitan;
    private $cantJugadores;
    private $categoria;

    //CONSTRUCTOR
    public function __construct($nombre, $nombreCapitan, $cantJugadores, $categoria)
    {
        $this->nombre = $nombre;
        $this->nombreCapitan = $nombreCapitan;
        $this->cantJugadores = $cantJugadores;
        $this->categoria = $categoria;
    }

    //OBSERVADORES
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getNombreCapitan()
    {
        return $this->nombreCapitan;
    }

    public function getCantJugadores()
    {
        return $this->cantJugadores;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    //MODIFICADORES
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setNombreCapitan($nombreCapitan)
    {
        $this->nombreCapitan = $nombreCapitan;
    }

    public function setCantJugadores($cantJugadores)
    {
        $this->cantJugadores = $cantJugadores;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function __toString()
    {
        return "Equipo: " . $this->getNombre() . "\n" .
        "Capitan: " . $this->getNombreCapitan() . "\n" .
        "Cantidad de jugadores: " . $this->getCantJugadores() . "\n" .
        $this->getCategoria();
    }
}