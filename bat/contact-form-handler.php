<?php
// Hata raporlamayı etkinleştir ve günlükle
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', '/var/www/html/inframotionpro/php-error.log'); // Hata log dosyası yolu

$response = array("status" => "", "message" => "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "fuatsevinc@icloud.com"; // Kendi e-posta adresinizle değiştirin
    $subject = "$name isimli kişiden gelen iletişim formu mesajı";
    $body = "İsim: $name\nEmail: $email\nTelefon: $phone\nMesaj:\n$message";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        $response["status"] = "success";
        $response["message"] = "Mesaj başarıyla gönderildi.";
    } else {
        $response["status"] = "error";
        $response["message"] = "Mesaj gönderilemedi.";
        error_log("Mail gönderilemedi.");
    }
}

echo json_encode($response);
?>
