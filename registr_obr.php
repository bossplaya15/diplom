<?php
header('Content-Type: text/html; charset=utf-8');
$mysqli = mysqli_connect("localhost", "wqlsaxte_667", "12345", "wqlsaxte_667");
if ($mysqli == false) {
  print("error");
} else {

  $name = $_POST["name"];
  $lastname = $_POST["lastname"];
  $email = trim(mb_strtolower($_POST["email"]));
  $phone = $_POST["phone"];

  $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
  if ($result->num_rows != 0) {
    print("exist");
  } else {
    $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `phone`) VALUES ('$name', '$lastname', '$email', '$phone')");
    print("ok");
    $rand = mt_rand(1, 18);
    $message = $name . ", cпасибо за регистрацию в розыгрыше. Ваш номер - " . $rand .  "<br>" . "Перейдите по ссылке для участия в розыгрыше: http://caldeira.p-host.in/give.html";
    mail("elena.ryskova@gmail.com", "Ваш счастливый номер", $message);
  }
}
