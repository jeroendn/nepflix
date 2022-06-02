<?php

use Nepflix\Table\ContractTable;
use Nepflix\Table\CountryTable;
use Nepflix\Table\PaymentTable;

if (loggedIn()) {
  header('Location: /p/browse/');
  exit;
}

$countries = (new CountryTable())->getAll();
$contracts = (new ContractTable())->getAll();
$payments = (new PaymentTable())->getAll();
?>

<div id="nepflix-logo" class="container">
  <img class="img-fluid" src="/img/nepflix-logo.png" alt="Nepflix logo">
</div>

<div class="container">

  <!-- login -->
  <div class="card">
    <p class="bold">Login to NEPFLIX</p>
    <form action="/php/post/login.php" method="post">
      <!-- mail -->
      <label for="mail">Email</label>
      <input type="email" name="mail" id="mail" placeholder="example@mail.com" required>
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
    <p class="bold">Sign up for NEPFLIX</p>
    <form action="/php/post/signup.php" method="post">
      <!-- firstname -->
      <label for="firstname">Firstname *</label>
      <input type="text" name="firstname" id="firstname" placeholder="Firstname" required>
      <!-- lastname -->
      <label for="lastname">Lastname *</label>
      <input type="text" name="lastname" id="lastname" placeholder="Lastname" required>
      <!-- mail -->
      <label for="mail">Email *</label>
      <input type="email" name="mail" id="mail" placeholder="example@mail.com" required>
      <!-- username -->
      <label for="username">Choose a username *</label>
      <input type="text" name="username" id="username" placeholder="Username" required>
      <!-- password -->
      <label for="password">Create a password *</label>
      <input type="password" name="password" id="password" placeholder="Password" required>
      <!-- password repeat -->
      <label for="password-repeat">Repeat password *</label>
      <input type="password" name="password-repeat" id="password-repeat" placeholder="Repeat password" required>
      <!-- payment method -->
      <label for="payment-method">Payment method *</label>
      <select name="payment-method" id="payment-method">
        <?php foreach ($payments as $payment): ?>
          <option value="<?= $payment['payment_method'] ?>"><?= $payment['payment_method'] ?></option>
        <?php endforeach; ?>
      </select>
      <!-- payment card number -->
      <label for="payment-card-number">Card number *</label>
      <input type="number" name="payment-card-number" id="payment-card-number" placeholder="5425233430109903" required>
      <!-- contract -->
      <label for="contract-type">Contract *</label>
      <select name="contract-type" id="contract-type">
        <?php foreach ($contracts as $contract): ?>
          <option value="<?= $contract['contract_type'] ?>"><?= $contract['contract_type'] ?></option>
        <?php endforeach; ?>
      </select>
      <!-- country -->
      <label for="country-name">Country *</label>
      <select name="country-name" id="country-name">
        <?php foreach ($countries as $country): ?>
          <option value="<?= $country['country_name'] ?>"><?= $country['country_name'] ?></option>
        <?php endforeach; ?>
      </select>
      <!-- gender -->
      <label for="gender">Gender</label>
      <select name="gender" id="gender">
        <option value="">Not specified</option>
        <option value="M">Male</option>
        <option value="V">Female</option>
        <option value="O">Other</option>
      </select>
      <!-- birthdate -->
      <label for="birthdate">Birthdate</label>
      <input type="date" name="birthdate" id="birthdate" value="2000-01-01">
      <!-- submit -->
      <input type="submit" name="signup-submit" value="Sign up">
      <span>* Required fields</span>
    </form>
  </div>

</div>
