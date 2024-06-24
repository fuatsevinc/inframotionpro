<?php
// Hata raporlamayı etkinleştir ve günlükle
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/your/php-error.log');

// Form işleme kodu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "fuatsevinc@icloud.com"; // Kendi e-posta adresinizle değiştirin
    $subject = "$name isimli kişiden gelen iletişim formu mesajı";
    $body = "İsim: $name\nEmail: $email\nTelefon: $phone\nMesaj:\n$message";
    $headers = "From: $email";
    
    if (mail($to, $subject, $body, $headers)) {
        echo "Mesaj başarıyla gönderildi.";
    } else {
        echo "Mesaj gönderilemedi.";
    }
} else {
    echo "Geçersiz istek.";
}
?>
