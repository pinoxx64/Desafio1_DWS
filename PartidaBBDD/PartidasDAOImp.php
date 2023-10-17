<?php
class PartidasDAOImp{
    public static function subirPartidas($id_usuario,$partidaEnCurso, $tableroRevelado){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_usuario = $_POST["id_usuario"];
            $partidaEnCurso = $_POST["partidaEnCurso"];
            $tableroRevelado = $_POST["tableroRevelado"];
            
            // Crear una conexión
            $conn=Conexion::conectar();
            
            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }
            
            // Consulta SQL preparada
            $sql = "INSERT INTO usuario (partidaEnCurso) VALUES (?)";
            
            // Preparar la declaración
            $stmt = $conn->prepare($sql);
            
            // Vincular los parámetros
            $stmt->bind_param("iss",$id_usuario, $partidaEnCurso, $tableroRevelado);
            
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
    public static function bajarPartidas($id){
         // Crear una conexión
         $conn=Conexion::conectar();
            
         // Verificar la conexión
         if ($conn->connect_error) {
             die("Conexión fallida: " . $conn->connect_error);
         }
                             
         // Consulta SQL preparada
         $sql="SELECT PartidaEnCurso,tableroResuelto FROM paridas WHERE id = ?";
 
                         
         // Preparar la declaración
         $stmt = $conn->prepare($sql);
                         
         // Vincular los parámetros
         $stmt->bind_param("i",$id);
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
    public static function eliminarPartidas($id){
        // Crear una conexión
        $conn=Conexion::conectar();
            
         // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }       
        // Consulta SQL preparada
        $sql = "DELETE partidaEnCurso FROM usuarios WHERE id = ?";
                               
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