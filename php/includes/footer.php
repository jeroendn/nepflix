<footer class="container-full">
  <?php if (loggedIn()): ?>
    <p><a href='/p/browse/'>Browse</a></p>
    <p><a href='/p/settings/'>Settings</a></p>
    <?php else: ?>
    <p><a href='/p/entry/'>Login</a></p>
    <p><a href='/p/entry/'>Register</a></p>
  <?php endif; ?>
  <p><a href='/p/about/'>About</a></p>
  <p><a href='/p/privacy-policy/'>Privacy policy</a></p>
  <img src="/img/nepflix-logo-white.png" alt="Nepflix logo" style="width: 130px; margin-bottom: 15px;">
  <p>NEPFLIX© All rights reserved</p>
  <p style="font-size: .75em;">Disclaimer: This website is part of a school project and is not meant for actual use.</p>
</footer>