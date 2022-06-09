<?php
require_once __DIR__ . './../includes/session.php';

$username = h($_POST['username']) ?? null;
$mail = h($_POST['mail']) ?? null;
$currentPassword = h($_POST['current-password']) ?? null;
$newPassword = h($_POST['new-password-repeat']) ?? null;
$newPasswordRepeat = h($_POST['new-password-repeat']) ?? null;

if (empty($username) || empty($mail) || empty($currentPassword)) {
  header('Location: /p/settings/?error=missing-required-fields');
  exit;
}

try {
  $sql = "SELECT password FROM customer WHERE customer_mail_address=:mail";
  $stmt = db()->prepare($sql);
  $stmt->bindParam(':mail', $_SESSION['customer']['customer_mail_address']);
  $stmt->execute();
  $customer = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
  header('Location: /p/settings/?error=sql-error');
  exit;
}

if (!password_verify($currentPassword, $customer['password'])) {
  header('Location: /p/settings/?error=wrong-password');
  exit;
}

if (!empty($newPassword) && !empty($newPasswordRepeat)) {

  if ($newPassword !== $newPasswordRepeat) {
    header('Location: /p/settings/?error=passwords-must-match');
    exit;
  }

  try {
    $sql = "UPDATE customer SET user_name=:username, customer_mail_address=:mail, password=:password WHERE customer_mail_address=:current_mail";
    $stmt = db()->prepare($sql);
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindParam(':current_mail', $_SESSION['customer']['customer_mail_address'], PDO::PARAM_STR);
    $stmt->execute();
  }
  catch (PDOException $e) {
    header('Location: /p/settings/?error=sql-error');
    exit;
  }

}
else {
  try {
    $sql = "UPDATE customer SET user_name=:username, customer_mail_address=:mail WHERE customer_mail_address=:current_mail";
    $stmt = db()->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':current_mail', $_SESSION['customer']['customer_mail_address'], PDO::PARAM_STR);
    $stmt->execute();
  }
  catch (PDOException $e) {
    header('Location: /p/settings/?error=sql-error');
    exit;
  }
}

try {
  $sql = "SELECT * FROM customer WHERE customer_mail_address=:mail";
  $stmt = db()->prepare($sql);
  $stmt->bindParam(':mail', $mail);
  $stmt->execute();
  $updatedCustomer = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
  header('Location: /p/settings/?error=sql-error');
  exit;
}

unset($_SESSION['customer']);
unset($updatedCustomer['password']);
$_SESSION['customer'] = $updatedCustomer;

header('Location: /p/settings/?message=changed-successfully');
exit;
