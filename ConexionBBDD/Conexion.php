<?php
class Conexion{
    public static function conectar(){
        $conn = new mysqli(Constantes::NOM_SERVER, Constantes::NOM_USUARIO, Constantes::CONTRASENA, Constantes::BBDD);
        return $conn;
    }
    public static function desconectar($conn){
        $conn->close();
    }
}

