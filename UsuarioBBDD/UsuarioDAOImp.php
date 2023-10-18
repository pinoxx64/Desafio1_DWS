<?php
require_once './UsuarioBBDD/UsuarioDAO.php';
class UsuarioDAOImp implements UsuarioDAO{
    public static function anadirUsuario($nombre,$admin,$contrasena,$correo){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $admin = $_POST["admin"];
            $contrasena = $_POST["contrasena"];
            $correo = $_POST["correo"];

            
            // Crear una conexión
            $conn=Conexion::conectar();
            
            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }
            
            // Consulta SQL preparada
            $sql = "INSERT INTO usuarios (nombre_usuario,admin,contrasena,correo) VALUES (?,?,?,?)";
            
            if ($conn->query($sql) === TRUE) {
                echo "Nuevo registro insertado con éxito. ID de usuario: " . $conn->insert_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            // Preparar la declaración
            $stmt = $conn->prepare($sql);
            
            // Vincular los parámetros
            $stmt->bind_param("sbss", $nombre,$admin ,$contrasena, $correo);
            
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
    public static function eliminarUsuario($id){
            
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
    public static function bajarUsuario($nombre,$contrasena){
        // Crear una conexión
        $conn=Conexion::conectar();
            
        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
                            
        // Consulta SQL preparada
        $sql="SELECT * FROM usuarios WHERE nombre_usuario = ? AND contrasena=?";

                        
        // Preparar la declaración
        $stmt = $conn->prepare($sql);
                        
        // Vincular los parámetros
        $stmt->bind_param("ss",$nombre,$contrasena);
        $resultado = $stmt->get_result();
        
                            
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Datos insertados correctamente.";
        } else {
        echo "Error al insertar datos: " . $stmt->error;
        }
                            
        // Cerrar la conexión
        $stmt->close();
        Conexion::desconectar($conn);
        return $resultado;
    }
}