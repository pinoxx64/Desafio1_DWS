<?php
class Factoria{
    public static function crearTableroSinValores(){
        $tamano=10;
        $mina=2;
        $tablero=[];
        $tableroAus=[];
        $ale=[0,$mina,rand(0,$tamano)];
        $j=0;
        for ($i=0; $i < $tamano; $i++) { 
            if ($ale[$j]==$i) {
                array_push($tablero,'X');
                $j++;
            }else{
                array_push($tablero,'I');
            }
        }
        for ($i=0; $i < $tamano; $i++) { 
            if($tablero[$i=='I']){
                if ($i-1==0) {
                    if($tablero[$i+1]=='X'){
                        array_push($tableroAus,1);
                    }else{
                        array_push($tableroAus,0);
                    }
                }elseif($i+1==$tamano-1){
                    if($tablero[$i-1]=='X'){
                        array_push($tableroAus,1);
                    }else{
                        array_push($tableroAus,0);
                    }  
                }else{
                    if($i+1=='X' && $i-1=='X'){
                        array_push($tableroAus,2);
                    }elseif($i+1=='X' || $i-1=='X'){
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
                array_push($tablero,'X');
                $j++;
            }else{
                array_push($tablero,'I');
            }
        }
        for ($i=0; $i < $tamano; $i++) { 
            if($tablero[$i=='I']){
                if ($i-1==0) {
                    if($tablero[$i+1]=='X'){
                        array_push($tableroAus,1);
                    }else{
                        array_push($tableroAus,0);
                    }
                }elseif($i+1==$tamano-1){
                    if($tablero[$i-1]=='X'){
                        array_push($tableroAus,1);
                    }else{
                        array_push($tableroAus,0);
                    }  
                }else{
                    if($i+1=='X' && $i-1=='X'){
                        array_push($tableroAus,2);
                    }elseif($i+1=='X' || $i-1=='X'){
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
}