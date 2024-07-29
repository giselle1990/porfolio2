<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Establecer el destinatario del correo electrónico
    $to = "tucorreo@ejemplo.com"; // Reemplaza con tu dirección de correo electrónico

    // Establecer el asunto del correo
    $subject = "Nuevo mensaje del formulario de contacto";

    // Construir el cuerpo del mensaje
    $body = "Nombre: $name\n";
    $body .= "Correo Electrónico: $email\n";
    $body .= "Teléfono: $phone\n";
    $body .= "Mensaje: \n$message";

    // Cabeceras del correo electrónico
    $headers = "From: $email";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    echo "Método no permitido.";
}
?>
