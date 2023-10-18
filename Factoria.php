<?php
require_once './PartidaBBDD/Partidas.php';
require_once './UsuarioBBDD/Usuarios.php';
class Factoria{
    public static function crearObjetoPartida($id,$id_usuario,$partidaEnCurso,$tableroRevelado){
        return $partida=new Partidas($id,$id_usuario,$partidaEnCurso,$tableroRevelado);
    }
    public static function crearObjetoUsuario($id,$nombre_usuario,$admin,$contrasena,$correo){
        return $usuario=new Usuario($id,$nombre_usuario,$admin,$contrasena,$correo);
    }
}