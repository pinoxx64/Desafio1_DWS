<?php
interface PartidasDAO{
    public static function subirPartidas($id_usuario,$partidaEnCurso, $tableroRevelado);
    public static function bajarPartidas($id);
    public static function eliminarPartidas($id);
}