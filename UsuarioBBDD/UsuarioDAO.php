<?php
interface UsuarioDAO{
    public function anadirUsuario($nombre,$contrasena);
    public function eliminarUsuario($id);
}