<?php
interface TablebroReveladoDAO{
    public function subirTableroGuardado($tablero);
    public function bajarTableroGuardado($id);
    public function eliminarTableroGuardado($id);
}