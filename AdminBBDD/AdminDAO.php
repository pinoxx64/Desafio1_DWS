<?php
interface AdminDAO{
    public function anadirAdmin($nombre,$contrasena,$admin);
    public function eliminarAdmin($id);
}