<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $to = "fuatsevinc@icloud.com"; // Replace with your email
    $subject = "Kontaktformular Nachricht von $name";
    $body = "Name: $name\nEmail: $email\nTelefon: $phone\nNachricht:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Nachricht erfolgreich gesendet.";
    } else {
        echo "Nachricht konnte nicht gesendet werden.";
    }
} else {
    echo "Ungültige Anforderung.";
}
?>
