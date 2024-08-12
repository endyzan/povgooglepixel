<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

require 'C:/xampp/htdocs/portfolio/povgooglepixel/vendor/autoload.php';


// Ambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Konfigurasi PHPMailer
$mail = new PHPMailer(true);

try {
    // Pengaturan server
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'andizainuri12@gmail.com';
    $mail->Password = 'twdf qhum rsle oteh'; // akun>keamanan>Verifikasi 2 Langkah>sandi aplikasi
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Menggunakan SSL
    $mail->Port = 465;

    // Pengaturan pengirim dan penerima
    $mail->setFrom('andizainuri12@gmail.com', 'povgooglepixel'); // Email pengirim
    $mail->addAddress('andizainuri12@gmail.com'); // Email penerima (bisa diubah ke email lain jika diperlukan)
    $mail->addReplyTo($email, $name); // Untuk balasan, bisa langsung ke pengirim pesan

    // Konten email
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = "<h3>You have a new message from your website contact form</h3>
                      <p><strong>Name:</strong> $name</p>
                      <p><strong>Email:</strong> $email</p>
                      <p><strong>Message:</strong><br>$message</p>";

    // Kirim email
    $mail->send();
    echo 'Your message has been sent. Thank you!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
