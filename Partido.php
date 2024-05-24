<?php
class Partido
{
    //ATRIBUTOS
    private $idPartido;
    private $equipo1;
    private $equipo2;
    private $fecha;
    private $cantGolesE1;
    private $cantGolesE2;

    //CONSTRUCTOR
    public function __construct($idPartido, $equipo1, $equipo2, $fecha, $cantGolesE1, $cantGolesE2)
    {
        $this->idPartido = $idPartido;
        $this->equipo1 = $equipo1;
        $this->equipo2 = $equipo2;
        $this->fecha = $fecha;
        $this->cantGolesE1 = $cantGolesE1;
        $this->cantGolesE2 = $cantGolesE2;
    }

    //OBSERVADORES
    public function getIdPartido()
    {
        return $this->idPartido;
    }

    public function getEquipo1()
    {
        return $this->equipo1;
    }

    public function getEquipo2()
    {
        return $this->equipo2;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getCantGolesE1()
    {
        return $this->cantGolesE1;
    }

    public function getCantGolesE2()
    {
        return $this->cantGolesE2;
    }

    //MODIFICADORES
    public function setIdPartido($idPartido)
    {
        $this->idPartido = $idPartido;
    }

    public function setEquipo1($equipo1)
    {
        $this->equipo1 = $equipo1;
    }

    public function setEquipo2($equipo2)
    {
        $this->equipo2 = $equipo2;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setCantGolesE1($cantGolesE1)
    {
        $this->cantGolesE1 = $cantGolesE1;
    }

    public function setCantGolesE2($cantGolesE2)
    {
        $this->cantGolesE2 = $cantGolesE2;
    }

    public function __toString()
    {
        return "Partido: " . $this->getIdPartido() . "\n" .
        "Fecha: " . $this->getFecha() . "\n" .
        "Resultado: " . $this->getCantGolesE1() . " - " . $this->getCantGolesE2();
    }

    public function coeficientePartido()
    {
        $coef = 0.5;
        $cantG = $this->getCantGolesE1() + $this->getCantGolesE2();
        $cantJ = $this->getEquipo1()->getCantJugadores() + $this->getEquipo2()->getCantJugadores();
        $coef *= $cantG * $cantJ;

        return $coef;
    }
    public function darGanadores($deporte)
    {
        $ganadores = array();
        $partidos = $this->obtenerPartido($deporte);

        foreach ($partidos as $partido) {
            $ganador = $partido->darEquipoGanador();
            $bandera = false;
            for ($i = 0; $i < count($ganadores) && !$bandera; $i++) {
                if ($ganadores[$i] == $ganador) {
                    $bandera = true;
                }
            }
            if (!$bandera) {
                array_push($ganadores, $ganador);
            }
        }

        return $ganadores;
    }
    private function obtenerPartido($tipoPartido)
    {
        $partidos = array();

        foreach ($this->getColPartidos() as $partido) {
            if (($tipoPartido == "futbol" && $partido instanceof PartidoFutbol) ||
                ($tipoPartido == "basket" && $partido instanceof PartidoBasket)
            ) {
                array_push($partidos, $partido);
            }
        }

        return $partidos;
    }
}
