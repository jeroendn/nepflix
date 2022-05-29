<?php
require_once __DIR__ . './../session.php';

if (!isset($_POST['signup-submit'])) {
  header('Location:/p/entry/?error=no-form-submitted');
  exit;
}

$firstname = 'huts';
$lastname = 'huts';
$username = $_POST['username'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$passwordRepeat = $_POST['password-repeat'];
$paymentMethod = 'Mastercard';
$paymentCardNumber = 'huts';
$contractType = 'Pro';
$subscriptionStart = '2022-01-01';
$countryName = 'Netherlands';
$gender = 'M';
$birthDate = '2022-01-01';

if (empty($username) || empty($mail) || empty($password) || empty($passwordRepeat)) { // TODO
  header('Location: /p/entry/?error=missing-required-fields');
  exit;
}

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  header('Location: /p/entry/?error=invalid-mail-address');
  exit;
}

if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
  header('Location: /p/entry/?error=invalid-username-address');
  exit;
}

if ($password !== $passwordRepeat) {
  header('Location: /p/entry/?error=passwords-must-match');
  exit;
}

try {
  $sql = 'SELECT COUNT(customer_mail_address) FROM customer WHERE customer_mail_address=:mail';
  $stmt = db()->prepare($sql);
  $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
  $stmt->execute();
}
catch (PDOException $e) {
  header('Location: /p/entry/?error=sql-error');
  exit;
}

$resultCheck = $stmt->fetchColumn();

if ($resultCheck > 0) {
  header('Location: /p/entry/?error=mail-address-unavailable');
  exit;
}

try {
  $sql = 'INSERT INTO customer (customer_mail_address, firstname, lastname, user_name, password, payment_method, payment_card_number, contract_type, subscription_start, country_name, gender, birth_date) VALUES (:mail, :firstname, :lastname, :username, :password, :payment_method, :payment_card_number, :contract_type, :subscription_start, :country_name, :gender, :birth_date)';
  $stmt = db()->prepare($sql);
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
  $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
  $stmt->bindParam(':username', $lastname, PDO::PARAM_STR);
  $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
  $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
  $stmt->bindParam(':payment_method', $paymentMethod, PDO::PARAM_STR);
  $stmt->bindParam(':payment_card_number', $paymentCardNumber, PDO::PARAM_STR);
  $stmt->bindParam(':contract_type', $contractType, PDO::PARAM_STR);
  $stmt->bindParam(':subscription_start', $subscriptionStart, PDO::PARAM_STR);
  $stmt->bindParam(':country_name', $countryName, PDO::PARAM_STR);
  $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
  $stmt->bindParam(':birth_date', $birthDate, PDO::PARAM_STR);
  $stmt->execute();
}
catch (PDOException $e) {
  header('Location: /p/entry/?error=sql-error');
  exit;
}

// Log the new user in
$_POST['mail-or-username'] = $mail;
$_POST['password'] = $password;
require_once __DIR__ . '/login.php';
