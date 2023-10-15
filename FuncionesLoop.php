<?php
class FuncionesLoop{
    public static function crearTableroSinValores(){
        $tamano=10;
        $mina=2;
        $tablero=[];
        $tableroAus=[];
        $ale=[0,$mina,rand(0,$tamano)];
        $j=0;
        for ($i=0; $i < $tamano; $i++) { 
            if ($ale[$j]==$i) {
                array_push($tablero,Constantes::MINA);
                $j++;
            }else{
                array_push($tablero,Constantes::VACIO);
            }
        }
        for ($i=0; $i < $tamano; $i++) { 
            if($tablero[$i==Constantes::VACIO]){
                if ($i-1==0) {
                    if($tablero[$i+1]==Constantes::MINA){
                        array_push($tableroAus,1);
                    }else{
                        array_push($tableroAus,0);
                    }
                }elseif($i+1==$tamano-1){
                    if($tablero[$i-1]==Constantes::MINA){
                        array_push($tableroAus,1);
                    }else{
                        array_push($tableroAus,0);
                    }  
                }else{
                    if($i+1==Constantes::MINA && $i-1==Constantes::MINA){
                        array_push($tableroAus,2);
                    }elseif($i+1==Constantes::MINA || $i-1==Constantes::MINA){
                        array_push($tableroAus,1);
                    }else{
                        array_push($tableroAus,0);
                    }
                }
            }else{
                array_push($tableroAus,$tablero[$i]);
            }
        }
        return $tableroAus;
    }
    public static function crearTableroConValores($tamano,$mina){
        $tablero=[];
        $tableroAus=[];
        $ale=[0,$mina,rand(0,$tamano)];
        $j=0;
        for ($i=0; $i < $tamano; $i++) { 
            if ($ale[$j]==$i) {
                array_push($tablero,Constantes::MINA);
                $j++;
            }else{
                array_push($tablero,Constantes::VACIO);
            }
        }
        for ($i=0; $i < $tamano; $i++) { 
            if($tablero[$i==Constantes::VACIO]){
                if ($i-1==0) {
                    if($tablero[$i+1]==Constantes::MINA){
                        array_push($tableroAus,1);
                    }else{
                        array_push($tableroAus,0);
                    }
                }elseif($i+1==$tamano-1){
                    if($tablero[$i-1]==Constantes::MINA){
                        array_push($tableroAus,1);
                    }else{
                        array_push($tableroAus,0);
                    }  
                }else{
                    if($i+1==Constantes::MINA && $i-1==Constantes::MINA){
                        array_push($tableroAus,2);
                    }elseif($i+1==Constantes::MINA || $i-1==Constantes::MINA){
                        array_push($tableroAus,1);
                    }else{
                        array_push($tableroAus,0);
                    }
                }
            }else{
                array_push($tableroAus,$tablero[$i]);
            }
        }
        return $tableroAus;
    }
    public static function revelarUnaCasilla($tablero,$tableroResuelto,$num){
        $tableroRevelado=[];
        for ($i=0; $i < count($tablero); $i++) { 
            if ($i==$num) {
                array_push($tableroRevelado,$tableroResuelto[$i]);
            }else{
                array_push($tableroRevelado,$tablero[$i]);
            }
        }
        return $tableroRevelado;
    }
    public static function verSiBomba($tablero){ //El loop de juego se verá interrumpido por esta funcion
        $fallo=false;
        for ($i=0; $i < count($tablero); $i++) { 
            if ($tablero[$i]==Constantes::MINA) {
                $fallo=true;
            }
        }
        return $fallo;
    }
    public static function crearTableroVisibleSinVal(){
        $tablero=[];
        for ($i=0; $i < 10; $i++) { 
            array_push($tablero,Constantes::VACIOENJUEGO);
        }
        return $tablero;
    }
    public static function crearTableroVisibleConVal($num){
        $tablero=[];
        for ($i=0; $i < $num; $i++) { 
            array_push($tablero,Constantes::VACIOENJUEGO);
        }
        return $tablero;
    }
}