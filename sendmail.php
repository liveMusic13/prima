<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';

  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->setLanguage('ru', 'PHPMailer/language/');
  $mail->IsHTML(true);

  //от кого письмо
  $mail->setFrom('https://livemusic13.github.io/prima-dizain/', 'ПримаДизайн');

  //кому отправить
  $mail->addAddress('aegis.ko20@mail.ru');
  //тема письма
  $mail->Subject = 'Пожелания и предложения';

  //тело письма
  $body = '<h1>Письмо</h1>';

  if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
  }
  if(trim(!empty($_POST['email']))){
    $body.='<p><strong>E-mail:</strong> '.$_POST['email']'</p>';
  }
  if(trim(!empty($_POST['message']))){
    $body.='<p><strong>Ваше сообщение:</strong> '.$_POST['message']'</p>';
  }

  //отправляем
  if (!$mail->send()) {
    $message = 'Ошибка';
  } else {
    $message = 'Данные отправлены!';
  }

  $response = ['message' => $message];

  header('Content-type: application/json');
  echo json_encode($response);
?>