<?php
require_once './ConexionBBDD/Conexion.php';
class TablebroJuegoDAOImp implements TablebroJuegoDAO{
    public function subirTableroJuego(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            
            // Crear una conexión
            $conn=Conexion::conectar();
            
            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }
            
            // Consulta SQL preparada
            $sql = "INSERT INTO nombre_de_la_tabla (nombre_columna) VALUES (?)";
            
            // Preparar la declaración
            $stmt = $conn->prepare($sql);
            
            // Vincular los parámetros
            $stmt->bind_param("s", $nombre);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Datos insertados correctamente.";
            } else {
                echo "Error al insertar datos: " . $stmt->error;
            }
            
            // Cerrar la conexión
            $stmt->close();
            Conexion::desconectar($conn);
        }
    }
    public function bajarTableroJuego(){

    }
}