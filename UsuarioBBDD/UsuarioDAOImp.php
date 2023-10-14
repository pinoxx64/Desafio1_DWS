<?php
class UsuarioDAOImp implements UsuarioDAO{
    public function anadirUsuario($nombre,$contrasena){
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
}