<?php
require_once './ConexionBBDD/Conexion.php';
class TablebroJuegoDAOImp implements TablebroJuegoDAO{
    public function subirTableroJuego($tablero){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tablero = $_POST["tablero"];
            
            // Crear una conexión
            $conn=Conexion::conectar();
            
            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }
            
            // Consulta SQL preparada
            $sql = "INSERT INTO partidasguardadas (partida) VALUES (?)";
            
            // Preparar la declaración
            $stmt = $conn->prepare($sql);
            
            // Vincular los parámetros
            $stmt->bind_param("s", $tablero);
            
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
    public function bajarTableroJuego($id){
        // Crear una conexión
        $conn=Conexion::conectar();
            
        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
                            
        // Consulta SQL preparada
        $sql = "DELETE FROM usuarios WHERE id = ?";
                        
        // Preparar la declaración
        $stmt = $conn->prepare($sql);
                        
        // Vincular los parámetros
        $stmt->bind_param("i",$id);
                            
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