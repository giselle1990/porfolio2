<?php
// Verifica si el formulario se envió mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y limpiar los datos del formulario
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validar los datos del formulario
    if (empty($name) || empty($email) || empty($message)) {
        echo "Por favor, completa todos los campos requeridos.";
        exit; // Detener la ejecución si faltan campos obligatorios
    }

    // Validar el formato del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, ingresa un correo electrónico válido.";
        exit;
    }

    // Establecer el destinatario del correo electrónico
    $to = "info@salidelveraz.com"; // Reemplaza con tu dirección de correo electrónico

    // Establecer el asunto del correo
    $subject = "Nuevo mensaje del formulario de contacto";

    // Construir el cuerpo del mensaje
    $body = "Nombre: $name\n";
    $body .= "Correo Electrónico: $email\n";
    $body .= "Teléfono: $phone\n";
    $body .= "Mensaje: \n$message";

    // Cabeceras del correo electrónico
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito. Gracias por contactarnos.";
    } else {
        echo "Error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
} else {
    // Si el método de solicitud no es POST, enviar un error 405
    http_response_code(405);
    echo "Método no permitido.";
}
?>
