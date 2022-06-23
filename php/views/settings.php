<div class="container">
  <div class="card">
    <p class="bold">Change your account details</p>
    <form action="/php/post/settings.php" method="post">

      <!-- current username -->
      <label>Current username</label>
      <input type="text" value="<?= $_SESSION['customer']['user_name'] ?? '' ?>" disabled readonly>

      <!-- new username -->
      <label for="username">New username</label>
      <input type="text" name="username" id="username" value="<?= $_SESSION['customer']['user_name'] ?? '' ?>" placeholder="Username">

      <!-- current mail -->
      <label>Current Mail</label>
      <input type="email" value="<?= $_SESSION['customer']['customer_mail_address'] ?? '' ?>" disabled readonly>

      <!-- new mail -->
      <label for="mail">New Mail</label>
      <input type="email" name="mail" id="mail" value="<?= $_SESSION['customer']['customer_mail_address'] ?? '' ?>" placeholder="Mail">

      <!-- current password -->
      <label for="current-password">Current password</label>
      <input type="password" name="current-password" id="current-password" placeholder="Password" required>

      <p class="bold">Change password<br><i>* Leave empty to keep current password</i></p>
      <!-- new password -->
      <label for="new-password">New password</label>
      <input type="password" name="new-password" id="new-password" placeholder="Password">

      <!-- repeat new password -->
      <label for="new-password-repeat">Repeat new password</label>
      <input type="password" name="new-password-repeat" id="new-password-repeat" placeholder="Password">

      <!-- submit button -->
      <input type="submit" name="settings-submit" value="Save changes">
    </form>
  </div>
</div>