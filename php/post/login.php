<?php
require_once __DIR__ . '../../../.config.php';
require_once __DIR__ . '/../functions.php';

session_start();

if (isset($_POST['login-submit'])) {

  $mailOrUsername = $_POST['mail-or-username'];
  $password = $_POST['password'];

  if (empty($mailOrUsername) || empty($password)) {
    header('Location: ../../login?error=missing-required-fields');
    exit;
  }

  try {
    $sql = 'SELECT * FROM customer WHERE customer_mail_address=:mail OR user_name=:username;';
    $stmt = db()->prepare($sql);
    $stmt->bindParam(':mail', $mailOrUsername, PDO::PARAM_STR);
    $stmt->bindParam(':username', $mailOrUsername, PDO::PARAM_STR);
    $stmt->execute();
  }
  catch (PDOException $e) {
    header('Location: ../../login?error=sql-error');
    exit;
  }

  if (!$customer = $stmt->fetch(PDO::FETCH_ASSOC)) {
    header('Location: ../../login?error=user-not-found');
    exit;
  }

  $passwordVerified = password_verify($password, $customer['password']);
  if (!$passwordVerified) {
    header('Location: ../../login?error=wrong-password');
    exit;
  }

  unset($customer['password']); // Do not store password in session
  $_SESSION['customer'] = $customer;

  header('Location: ../../browse?message=login-success');
  exit;

}
else {
  header('Location: ../../login?error=form-was-not-submitted');
  exit;
}