<?php
class Basket extends Partido
{
    //ATRIBUTOS
    private $cantidadInfracciones;

    //CONSTRUCTOR
    public function __construct($idPartido, $equipo1, $equipo2, $fecha, $cantGolesE1, $cantGolesE2, $cantidadInfracciones)
    {
        parent::__construct($idPartido, $equipo1, $equipo2, $fecha, $cantGolesE1, $cantGolesE2);
        $this->cantidadInfracciones = $cantidadInfracciones;
    }

    //OBSERVADORES
    public function getCantidadInfracciones()
    {
        return $this->cantidadInfracciones;
    }

    //MODIFICADORES
    public function setCantidadInfracciones($cantidadInfracciones)
    {
        $this->cantidadInfracciones = $cantidadInfracciones;
    }

    public function __toString()
    {
        return parent::__toString() . "\n" .
        "Infracciones: " . $this->getCantidadInfracciones();
    }

    public function coeficientePartido()
    {
        $coef = parent::coeficientepartido();
        $coef -= 0.75 * $this->getCantidadInfracciones();
        return $coef;
    }
}