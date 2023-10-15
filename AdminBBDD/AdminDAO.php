<?php
interface AdminDAO{
    public function anadirAdmin($nombre,$contrasena);
    public function eliminarAdmin($id);
}