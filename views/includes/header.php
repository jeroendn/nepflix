<header>
  <nav class="navbar container">
    <div class="navbar-left">
      <a href="/" class="navbar-logo"><img src="../img/nepflix-logo.png" width="110px" alt="Nepflix logo"></a>
      <button id="navbar-toggle" style="display:none;"><!-- TODO Show a button on mobile -->
        <span class="navbar-toggle-icon"></span>
      </button>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/browse">Home</a>
        </li>
        <li class="nav-item">
          <a href="/browse">Movies</a>
        </li>
        <li class="nav-item">
          <a href="/browse">Films</a>
        </li>
      </ul>
    </div>

    <div class="navbar-right">
      <div id="nav-search"><input type="text" name="nav_search" id="nav-search" placeholder="Search..."></div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/settings"><i class="fas fa-cog"></i></a>
        </li>
        <li class="nav-item">
          <a href="/logout" class="btn-logout">Logout</a>
        </li>
      </ul>
    </div>

  </nav>
</header>