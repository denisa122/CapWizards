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
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        echo "<script>alert('Only letters and white space allowed');</script>";
        return;
      }
    }
        if (empty($surname)) {
          $surnameErr = "surname is required";
          return;
        } else {
          if (!preg_match("/^[a-zA-Z-' ]*$/",$surname)) {
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
      } else {
          echo "<script>alert('Message sent successfully!');</script>";
      }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

$header = "From:".$name."<".$email.">\r\n";

$recipient = "monika.sz320@gmail.com";

mail($recipient, $subject, $message, $header, "From:" . $email) 
or die("Error!");

echo"<script>alert('Message sent successfully!');</script>";
?>