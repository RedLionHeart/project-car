<?php
// Файлы phpmailer
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $msg = "ok";
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = false;
    $mail->SMTPAutoTLS = false;
    $mail->Port = 25;
    // Настройки вашей почты
    $mail->Host       = 'localhost'; // SMTP сервера GMAIL
    $mail->Username   = 'email'; // Логин на почте
    $mail->Password   = 'password'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('email@gmail.com', 'NAME'); // Адрес самой почты и имя отправителя
    // Получатель письма
    $mail->addAddress('email@gmail.com');

        // -----------------------
        // Само письмо
        // -----------------------
        $mail->IsHTML(true);

        $mail->Subject = 'Заявка с сайта';
        $mail->Body = "<b>Name </b> $name <br> <b>Email </b> $email <br> <b>Message </b> $message";
// Проверяем отравленность сообщения
if ($mail->send()) {
    echo "$msg";
} else {
echo "Message can not send. Reason. Your email settings are incorrect";
}
} catch (Exception $e) {
    echo "Message can not send. Reason: {$mail->ErrorInfo}";
}
?>
