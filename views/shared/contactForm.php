<?php

$name = $_POST["firstName"];
$surname = $_POST["lastName"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["Message"];


if (isset($_POST['submit'])) {
  if (empty($name)) {
    echo "Name is required";
    return;
  } else {
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      echo "<script>alert('Only letters and white space allowed');</script>";
      return;
    }
  }
  if (empty($surname)) {
    $surnameErr = "surname is required";
    return;
  } else {
    if (!preg_match("/^[a-zA-Z-' ]*$/", $surname)) {
      $surnameErr = "Only letters and white space allowed";
      return;
    }
  }


  if (empty($email)) {
    $emailErr = "Email is required";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
}
if (empty($name) || empty($surname) || empty($email) || empty($subject) || empty($message)) {
  echo "<script>alert('All fields are required.');</script>";
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$headers = 'From: ".$name." <".$email.">' . "\r\n" .
  'To: neagudenisa12@yahoo.com' .
  'X-Mailer: PHP/' . phpversion();

$to = "neagudenisa12@yahoo.com";

$mailResult = mail($to, $subject, $message, $headers);

if ($mailResult) {
  echo "<script>alert('Message sent successfully!');</script>";
} else {
  $lastError = error_get_last();
  echo "<script>alert('Error sending the message: " . $lastError['message'] . "');</script>";
};
