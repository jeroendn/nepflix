<?php
require_once __DIR__ . '../../php/session.php';

if (loggedIn()) {
  header('Location: /browse');
  exit;
}
?>

<!DOCTYPE html>
<html lang="EN" dir="ltr">
<head>
  <title>NEPFLIX - Login</title>
  <meta name="description" content="Login"/>
  <?php require_once __DIR__ . '/includes/head.php'; ?>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>

<div id="nepflix-logo" class="container">
  <img class="img-fluid" src="../img/nepflix-logo.png" alt="Nepflix logo">
</div>

<main>
  <div class="container">
    <!-- login -->
    <div class="card">
      <p class="bold">Login to NEPFLIX</p>
      <form action="../php/post/login.php" method="post">
        <!-- mail -->
        <label for="mail-or-username">Mail address or username</label>
        <input type="text" name="mail-or-username" id="mail-or-username" placeholder="Mail/Username" required>
        <!-- password -->
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <!-- submit -->
        <input type="submit" name="login-submit" value="Login">
      </form>
    </div>
    <!-- separator block -->
    <div class="card bold card-separator">
      <p>Or</p>
    </div>
    <!-- register -->
    <div class="card">
      <p class="bold">Register for NEPFLIX</p>
      <form action="../php/signup.inc.php" method="post">
        <!-- username -->
        <label for="username">Choose a username</label>
        <input type="text" name="username" id="username" placeholder="Username" required>
        <!-- mail -->
        <label for="mail">Fill in your mail address</label>
        <input type="text" name="mail" id="mail" placeholder="Mail" required>
        <!-- password -->
        <label for="password">Create a password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <!-- password repeat -->
        <label for="password-repeat">Repeat password</label>
        <input type="password" name="password-repeat" id="password-repeat" placeholder="Repeat password" required>
        <!-- submit -->
        <input type="submit" name="signup-submit" value="Register">
      </form>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>

