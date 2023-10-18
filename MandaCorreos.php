<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;

        require_once 'phpmailer/src/Exception.php';
        require_once 'phpmailer/src/PHPMailer.php';
        require_once 'phpmailer/src/SMTP.php';
class MandaCorreos{
        public static function mandarCorreo($correo,$nombre){
            try {
                $mail = new PHPMailer();
                //Configuración del servidor
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;             //Habilitar los mensajes de depuración
                $mail->isSMTP();                                   //Enviar usando SMTP
                $mail->Host       = 'smtp.gmail.com';            //Configurar el servidor SMTP
                $mail->SMTPAuth   = true;                          //Habilitar autenticación SMTP
                $mail->Username   = Constantes::CORREO;            //Nombre de usuario SMTP
                $mail->Password   = Constantes::CONTRASENA_CORREO;                      //Contraseña SMTP
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Habilitar el cifrado TLS
                $mail->Port       = 465;                           //Puerto TCP al que conectarse; use 587 si configuró `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Emisor
                $mail->setFrom(Constantes::CORREO, 'Buscaminas');
            
                //Destinatarios
                $mail->addAddress($correo, $nombre);     //Añadir un destinatario, el nombre es opcional
            
                //Destinatarios opcionales
                // $mail->addReplyTo('info@example.com', 'Information');  //Responder a
                // $mail->addCC('cc@example.com');                        //Copia pública
                // $mail->addBCC('bcc@example.com');                      //Copia oculta
            
                //Archivos adjuntos
                // $mail->addAttachment('files/comunicado.pdf', 'Comunicado');         //Agregar archivos adjuntos, nombre opcional
            
                //Nombre opcional
                $mail->isHTML(true);                         //Establecer el formato de correo electrónico en HTMl
                $mail->Subject = 'Asunto';             
                $mail->Body    = '¡Este es el cuerpo del mensaje HTML <b>en negrita!</b>';
                $mail->AltBody = 'Este es el cuerpo en texto sin formato para clientes de correo que no son HTML';
            
                $mail->send();    //Enviar correo eletrónico
                echo 'El mensaje ha sido enviado';
            } catch (Exception $e) {
                echo "No se pudo enviar el mensaje. Error de correo: {$mail->ErrorInfo}";
            }
        }
}