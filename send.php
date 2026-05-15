<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // =========================
    // DATOS DEL FORMULARIO
    // =========================
    $fullname = htmlspecialchars($_POST['fullname']);
    $email    = htmlspecialchars($_POST['email']);
    $phone    = htmlspecialchars($_POST['phone']);
    $location = htmlspecialchars($_POST['location']);
    $service  = htmlspecialchars($_POST['service']);
    $message  = htmlspecialchars($_POST['message']);

    // =========================
    // CONFIGURACIÓN DEL CORREO
    // =========================
    $to = "green@pathviewlandscaping.com";
    $subject = "New Contact Form Submission";

    // IMPORTANTE:
    // Usa un correo de tu dominio
    $from = "green@pathviewlandscaping.com";

    // =========================
    // HEADERS
    // =========================
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: PathView Landscaping <$from>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // =========================
    // CONTENIDO DEL CORREO
    // =========================
    $body = "
    <html>
    <head>
        <title>New Contact Request</title>
    </head>
    <body style='font-family:Arial,sans-serif;'>

        <h2 style='color:#2d6a4f;'>New Contact Form Submission</h2>

        <table cellpadding='10' cellspacing='0' border='1' style='border-collapse:collapse;width:100%;max-width:600px;'>

            <tr>
                <td><strong>Full Name</strong></td>
                <td>$fullname</td>
            </tr>

            <tr>
                <td><strong>Email</strong></td>
                <td>$email</td>
            </tr>

            <tr>
                <td><strong>Phone</strong></td>
                <td>$phone</td>
            </tr>

            <tr>
                <td><strong>Location</strong></td>
                <td>$location</td>
            </tr>

            <tr>
                <td><strong>Service Interested</strong></td>
                <td>$service</td>
            </tr>

            <tr>
                <td><strong>Message</strong></td>
                <td>$message</td>
            </tr>

        </table>

    </body>
    </html>
    ";

    // =========================
    // ENVIAR CORREO
    // =========================
    if(mail($to, $subject, $body, $headers)){

        echo "
        <script>
            alert('Message sent successfully!');
            window.location.href = window.location.pathname;
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Error sending message.');
        </script>
        ";

    }

}
?>