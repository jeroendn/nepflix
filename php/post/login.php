<?php
require_once __DIR__ . './../session.php';

$mail = h($_POST['mail']) ?? null;
$password = h($_POST['password']) ?? null;

if (empty($mail) || empty($password)) {
  header('Location: /p/entry/?error=missing-required-fields');
  exit;
}

try {
  $sql = 'SELECT * FROM customer WHERE customer_mail_address=:mail';
  $stmt = db()->prepare($sql);
  $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
  $stmt->execute();
}
catch (PDOException $e) {
  header('Location: /p/entry/?error=sql-error');
  exit;
}

if (!$customer = $stmt->fetch(PDO::FETCH_ASSOC)) {
  header('Location: /p/entry/?error=user-not-found');
  exit;
}

$passwordVerified = password_verify($password, $customer['password']);
if (!$passwordVerified) {
  header('Location: /p/entry/?error=wrong-password');
  exit;
}

unset($customer['password']); // Do not store password in session
$_SESSION['customer'] = $customer;

header('Location: /p/browse/?message=login-success');
exit;
