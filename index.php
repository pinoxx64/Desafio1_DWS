<?php
require_once './PartidaBBDD/Partidas.php';
require_once './PartidaBBDD/PartidasDAOImp.php';
require_once './UsuarioBBDD/Usuario.php';
require_once './UsuarioBBDD/UsuarioDAOImp.php';
require_once './LoopJuego.php';
require_once './FuncionesLoop.php';
header("Content-Type:application/json");
$requestMethod = $_SERVER["REQUEST_METHOD"];
$paths = $_SERVER['REQUEST_URI'];
header("HTTP/1.1 405 Verbo no soportado");

$usuario= new Usuario();//falta poner la id del usuario
$usu=$paths[0];
$nombreUsu=$paths[1];
$contrasena=$paths[2];
$admin=$paths[3];
$correo=$paths[4];
$casilla=$paths[5];
$tamano=$paths[6];
$bombas=$paths[7];
$idJuego=$paths[8];
if ($usu=0) {//iniciar sesion
    //$Usuario=UsuarioDAOImp::bajarUsuario($nombreUsu,$contrasena);
}else{//crear usuario
    $usuario=UsuarioDAOImp::anadirUsuario($nombreUsu,$admin,$contrasena,$correo);
}
$fallo=false;
$vuelta=0;
while ($fallo=false||$tableroRevelado==$tableroVisible) {
    if ($vuelta==0) {
        if ($tamano==NULL && $bombas==NULL) {
            $info=LoopJuego::juegoVuelta1SinValores($casilla);
        }else{
            $info=LoopJuego::juegoVuelta1($casilla,$tamano,$bombas);
        }
        $tableroVisible=$info[0];
        $tableroRevelado=$info[1];
        $fallo=$info[2];
        PartidasDAOImp::subirPartidas($usuario,$tableroVisible,$tableroRevelado);
    }else{
        $bajadaBBDD=PartidasDAOImp::bajarPartidas($idJuego);
        $info=LoopJuego::juegoVueltasGeneral($bajadaBBDD[1],$bajadaBBDD[0],$casilla);
        PartidasDAOImp::eliminarPartidas($idJuego);
        PartidasDAOImp::subirPartidas($usuario,$tableroVisible,$tableroRevelado);
        $fallo=$info[2];
    }
    $vuelta++;
}


