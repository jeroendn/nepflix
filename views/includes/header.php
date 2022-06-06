<header>
  <nav class="navbar container">

    <div class="navbar-left">
      <a href="/p/browse/" class="navbar-logo"><img src="/img/nepflix-logo.png" width="110px" alt="Nepflix logo"></a>
      <button id="navbar-toggle" style="display:none;"><!-- TODO Show a button on mobile -->
        <span class="navbar-toggle-icon"></span>
      </button>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/p/browse/">Home</a>
        </li>
        <li class="nav-item">
          <a href="/p/browse/">Movies</a>
        </li>
        <li class="nav-item">
          <a href="/p/browse/">Films</a>
        </li>
      </ul>
    </div>

    <div class="navbar-right">
      <div id="nav-search"><input type="text" name="nav_search" id="nav-search" placeholder="Search..."></div>
      <ul class="navbar-nav">
        <?php if (loggedIn()): ?>
          <li class="nav-item">
            <p>Welcome <?= $_SESSION['customer']['user_name'] ?></p>
          </li>
          <li class="nav-item">
            <a href="/p/settings/"><i class="fas fa-cog"></i></a>
          </li>
          <li class="nav-item">
            <a href="/p/logout/">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="/p/entry/">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>

  </nav>
</header>