<?php
require 'vendor/autoload.php'; // Carga PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];

    // Configura PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Cambia esto al servidor SMTP correcto
    $mail->SMTPAuth = true;
    $mail->Username = 'mentat41@gmail.com'; // Cambia esto al correo correcto
    $mail->Password = 'Paev91..'; // Cambia esto a la contraseña correcta
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('mentat41@gmail.com', 'Formulario de Contacto');
    $mail->addAddress('mateo.shanshan@gmail.com'); // Cambia esto al destinatario correcto
    $mail->Subject = 'Nuevo contacto desde el formulario';
    $mail->Body = "Nombre: $nombre\nTeléfono: $telefono";

    // Envía el correo
    if ($mail->send()) {
        header("Location: confirmacion.html");
        exit;
    } else {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
}
?>
