<?php

use Nepflix\Table\GenreTable;

?>

<header>
  <nav class="navbar container">

    <div class="navbar-left">
      <a href="/p/browse/" class="navbar-logo hide-mobile"><img src="/img/nepflix-logo.png" width="110px" alt="Nepflix logo"></a>
      <button id="navbar-toggle" style="display:none;">
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
      <div id="nav-search">
        <form action="/p/search/" method="post">
          <input type="text" name="search-word" id="search-word" placeholder="Search...">
          <?php if (!empty($param) && !empty((new GenreTable())->get($param))): ?>
            <input type="hidden" name="search-genre" id="search-genre" value="<?= $param ?>">
          <?php endif; ?>
        </form>
      </div>
      <ul class="navbar-nav">
        <?php if (loggedIn()): ?>
          <li class="nav-item hide-mobile">
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