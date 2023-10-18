<?php
require_once 'FuncionesLoop.php';
class LoopJuego{
    public static function juegoVuelta1($casilla,$tamano,$bombas){ //tablero del momento actual, tablero completo, tablero en el estado anterior(si es el primero estala "vacio")
        $fallo=false;
        $infoADevolver=[];
        $tableroBase=FuncionesLoop::crearTableroConValores($tamano,$bombas);
        $tableroDeJuego=FuncionesLoop::crearTableroVisibleConVal($tamano,$bombas);
        $tableroRevelado=FuncionesLoop::revelarUnaCasilla($tableroDeJuego,$tableroBase,$casilla);
        $fallo=FuncionesLoop::verSiBomba($tableroRevelado);
        array_push($infoADevolver,$tableroDeJuego,$tableroRevelado,$fallo);
        return $infoADevolver;
    }
    public static function juegoVuelta1SinValores($casilla){ //tablero del momento actual, tablero completo, tablero en el estado anterior(si es el primero estala "vacio")
        $fallo=false;
        $infoADevolver=[];
        $tableroBase=FuncionesLoop::crearTableroSinValores();
        $tableroDeJuego=FuncionesLoop::crearTableroVisibleSinVal();
        $tableroRevelado=FuncionesLoop::revelarUnaCasilla($tableroDeJuego,$tableroBase,$casilla);
        $fallo=FuncionesLoop::verSiBomba($tableroRevelado);
        array_push($infoADevolver,$tableroDeJuego,$tableroRevelado,$fallo);
        return $infoADevolver;
    }
    public static function juegoVueltasGeneral($tableroBase,$tableroAnterior,$casilla){ //tablero del momento actual, tablero completo, tablero en el estado anterior(si es el primero estala "vacio")
        $fallo=false;
        $infoADevolver=[];
        $tableroRevelado=FuncionesLoop::revelarUnaCasilla($tableroAnterior,$tableroBase,$casilla);
        $fallo=FuncionesLoop::verSiBomba($tableroRevelado);
        array_push($infoADevolver,$tableroRevelado,$fallo);
        return $infoADevolver;
    }
}