<?php
//require_once './PartidaBBDD/Partidas.php';
require_once './PartidaBBDD/PartidasDAOImp.php';
//require_once './UsuarioBBDD/Usuario.php';
require_once './UsuarioBBDD/UsuarioDAOImp.php';
require_once './LoopJuego.php';
require_once './FuncionesLoop.php';
header("Content-Type:application/json");
$requestMethod = $_SERVER["REQUEST_METHOD"];
$paths = explode('/', $_SERVER['REQUEST_URI']);
header("HTTP/1.1 405 Verbo no soportado");

//$usuario= new Usuario();
$usu=$paths[0];
$nombreUsu=$paths[1];
$contrasena=$paths[2];
$admin=$paths[3];
$correo=$paths[4];
$casilla=$paths[5];
$tamano=$paths[6];
$bombas=$paths[7];
$idJuego=$paths[8];
if ($usu==0) {//iniciar sesion
    $usuario=UsuarioDAOImp::bajarUsuario($nombreUsu,$contrasena);
    $seguir=false;
    do {
        if($usuario[0]==$nombreUsu && $usuario[1]==$contrasena){
            printf("Usuario registrado");
            $seguir=true;
        }else{
            printf("Hay un fallo");
        }
    } while ($seguir==false);
}else{//crear usuario
    UsuarioDAOImp::anadirUsuario($nombreUsu,$admin,$contrasena,$correo);
    $usuario=UsuarioDAOImp::bajarUsuario($nombreUsu,$contrasena);
}
$fallo=false;
$vuelta=0;
while ($fallo==false||$tableroRevelado==$tableroVisible) {
    if ($vuelta==0) {
        if ($tamano==NULL && $bombas==NULL) {
            $info=LoopJuego::juegoVuelta1SinValores($casilla);
        }else{
            $info=LoopJuego::juegoVuelta1($casilla,$tamano,$bombas);
        }
        $tableroVisible=$info[0];
        print_r($tableroVisible);
        $tableroRevelado=$info[1];
        $fallo=$info[2];
        PartidasDAOImp::subirPartidas($usuario->id,$tableroVisible,$tableroRevelado);
    }else{
        $bajadaBBDD=PartidasDAOImp::bajarPartidas($idJuego); //aqui crearé un objeto tipo partida
        $info=LoopJuego::juegoVueltasGeneral($bajadaBBDD[1],$bajadaBBDD[0],$casilla);
        PartidasDAOImp::eliminarPartidas($idJuego);
        $tableroVisible=$info[0];
        $tableroRevelado=$info[1];
        print_r($tableroVisible);
        PartidasDAOImp::subirPartidas($usuario,$tableroVisible,$tableroRevelado);
        $fallo=$info[2];
    }
    $vuelta++;
}


