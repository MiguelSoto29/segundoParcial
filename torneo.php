<?php
class Torneo
{
    //ATRIBUTOS
    private $coleccionPartidos;
    private $importePremio;

    //CONSTRUCTOR
    public function __construct($coleccionPartidos, $importePremio)
    {
        $this->coleccionPartidos = $coleccionPartidos;
        $this->importePremio = $importePremio;
    }

    //OBSERVADORES
    public function getColeccionPartidos()
    {
        return $this->coleccionPartidos;
    }

    public function getImportePremio()
    {
        return $this->importePremio;
    }

    //MODIFICADORES
    public function setColeccionPartidos($coleccionPartidos)
    {
        $this->coleccionPartidos = $coleccionPartidos;
    }

    public function setImportePremio($importePremio)
    {
        $this->importePremio = $importePremio;
    }

    public function __toString()
    {
        return "Partidos:\n" . $this->coleccionAString() .
        "Premio: $" . $this->getImportePremio();
    }

    public function coleccionAString()
    {
        $coleccion = $this->getColeccionPartidos();
        $retorno = "";
        for ($i = 0; $i < count($coleccion); $i++) {
            $retorno .= "\t" . $coleccion[$i] . "\n--------------------\n";
        }
        return $retorno;
    }

    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){
        $objPartido = null;
        $numPatido = count($this->coleccionPartidos);
        if ($objEquipo1->getObjCategoria() == $objEquipo2->getObjCategoria() && $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores()){
            if($tipoPartido == 'futbol'){
                $objPartido = new PartidoFutbol($numPatido, $fecha, $objEquipo1, 0, $objEquipo2, 0);
                $coleccionPartidos[] = $this->getColeccionPartidos();
                array_push($coleccionPartidos, $objPartido);
                $this->setColeccionPartidos($coleccionPartidos);
            } else if($tipoPartido == 'basquet'){
                $objPartido = new PartidoBasquet($numPatido, $fecha, $objEquipo1, 0, $objEquipo2, 0 ,0);
                $coleccionPartidos[] = $this->getColeccionPartidos();
                array_push($coleccionPartidos, $objPartido);
                $this->setColeccionPartidos($coleccionPartidos);
            }
        }
        return $objPartido;
        }

    public function darGanadores($deporte)
    {
        $coleccionPartidos = $this->getColeccionPartidos();
        $coleccionGanadores = [];

        foreach ($coleccionPartidos as $objPartido) {
            if (get_class($objPartido) == $deporte) {
                $ganador = $objPartido->ganador();
                if (!is_null($ganador)) {
                    array_push($coleccionGanadores, $ganador);
                }
            }
        }
        return $coleccionGanadores;
    }

    public function calcularPremioPartido($OBJPartido)
    {
        $equipoGanador = $OBJPartido->darEquipoGanador();
        $premioPartido = $OBJPartido->getCoeficiente() * $this->getImportePremio();

        $resultado = array(
            'equipoGanador' => $equipoGanador,
            'premioPartido' => $premioPartido
        );

        return $resultado;
    }
}