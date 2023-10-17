<?php
interface UsuarioDAO{
    public static function anadirUsuario($nombre,$admin,$contrasena,$correo);
    public static function eliminarUsuario($id);
    public static function bajarUsuario($nombre,$contrasena);
}