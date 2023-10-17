<?php
interface TablebroJuegoDAO{
    function subirTableroJuego($tablero);
    function bajarTableroJuego($id);
    function eliminarTableroJuego($id);
}