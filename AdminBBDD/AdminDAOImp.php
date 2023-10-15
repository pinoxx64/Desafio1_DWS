<?php
class AdminDAOImp implements AdminDAO{
    public function anadirAdmin($nombre,$contrasena){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $contrasena= $_POST["contrasena"];
            
            // Crear una conexión
            $conn=Conexion::conectar();
            
            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }
            
            // Consulta SQL preparada
            $sql = "INSERT INTO usuarios (nombre_usuario,contrasena) VALUES (?,?)";
            
            // Preparar la declaración
            $stmt = $conn->prepare($sql);
            
            // Vincular los parámetros
            $stmt->bind_param("ss", $nombre, $contrasena);
            
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
    public function eliminarAdmin($id){
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