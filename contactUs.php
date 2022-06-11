<?php
session_start();

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {

	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the email info stored in sessions so instead we can get the results from the database.

$id = $_SESSION['id'];



$stmt = $con->prepare('SELECT email FROM accounts WHERE id = ?');

// In this case we can use the account ID to get the account info.

$stmt->bind_param('i', $id);

$stmt->execute();

$stmt->bind_result($email);

$stmt->fetch();

$stmt->close();

$message = $_POST['Message'] ??"";

$name = $_POST['Name'] ??""; 

$subject = $_POST['Subject'] ??""; 

$one = '1';

$stmt = $con->prepare("INSERT INTO contact (Message, Name, Subject, email, resolved) VALUES ('$message', '$name', '$subject', '$email', '$one')");

$to = $email;
$subject = "Contact Us Form";

$message = "Thankyou for contacting us, we will be in touch as soon as possible";




mail($to,$subject,$message);


$stmt->execute(); 










?>