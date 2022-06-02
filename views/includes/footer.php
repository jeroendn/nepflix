<footer class="container-full">
  <?php if (loggedIn()): ?>
    <p><a href='/p/browse/'>Browse</a></p>
    <p><a href='/p/settings/'>Settings</a></p>
    <?php else: ?>
    <p><a href='/p/entry/'>Login</a></p>
    <p><a href='/p/entry/'>Register</a></p>
  <?php endif; ?>
  <p><a href='/p/browse/'>About</a></p>
  <p><a href='/p/browse/'>Privacy policy</a></p>
  <p>NEPFLIX© All rights reserved</p>
  <p>Disclaimer: This website is part of a school project and is not meant for actual use.</p>
</footer>