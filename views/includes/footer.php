<footer id="footer" class="container-full">
  <?php if (loggedIn()): ?>
    <p><a href='/browse'>Browse</a></p>
    <p><a href='/settings'>Settings</a></p>
    <?php else: ?>
    <p><a href='/login'>Login</a></p>
  <?php endif; ?>
  <p><a href='/'>About</a></p>
  <p><a href='/'>Privacy policy</a></p>
  <p>NEPFLIX© All rights reserved</p>
  <p>Disclaimer: This website is part of a school project and is not meant for actual use.</p>
</footer>