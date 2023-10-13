<?php
require_once 'FuncionesLoop.php';
class LoopJuego{
    public static function juegoVuelta1($casilla,$tamano,$bombas,$valores){ //tablero del momento actual, tablero completo, tablero en el estado anterior(si es el primero estala "vacio")
        $fallo=false;
        $infoADevolver=[];
        if ($valores==true) {
            $tableroBase=FuncionesLoop::crearTableroConValores($tamano,$bombas);
            $tableroDeJuego=FuncionesLoop::crearTableroVisibleConVal($tamano,$bombas);
        }else{
            $tableroBase=FuncionesLoop::crearTableroSinValores();
            $tableroDeJuego=FuncionesLoop::crearTableroVisibleSinVal();
        }
        $tableroRevelado=FuncionesLoop::revelarUnaCasilla($tableroDeJuego,$tableroBase,$casilla);
        $fallo=FuncionesLoop::verSiBomba($tableroRevelado);
        array_push($infoADevolver,$tableroBase,$tableroDeJuego,$tableroRevelado);
        if($fallo==false){
            //pierdes
        }else{
            //ganas
        }
        return $infoADevolver;
    }
    public static function juegoVueltasGeneral($tableroBase,$tableroAnterior,$casilla){ //tablero del momento actual, tablero completo, tablero en el estado anterior(si es el primero estala "vacio")
        $fallo=false;
        $infoADevolver=[];
        $tableroRevelado=FuncionesLoop::revelarUnaCasilla($tableroAnterior,$tableroBase,$casilla);
        $fallo=FuncionesLoop::verSiBomba($tableroRevelado);
        array_push($infoADevolver,$tableroBase,$tableroAnterior,$tableroRevelado);
        if($fallo==false){
            //pierdes
        }else{
            //ganas
        }
        return $infoADevolver;
    }
}