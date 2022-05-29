<?php
/**
 * @var string $page
 * @var string $param
 */

use Nepflix\Table\MovieTable;

require_once __DIR__ . '../../php/session.php';

$movie = $param ? (new MovieTable())->get($param) : null;
?>

<div class="container-full title-cover" style="background-image: linear-gradient(180deg, transparent 30%, var(--color-bg) 95%), url(/img/thumb/<?= $movie['cover_image'] ?>)">
</div>

<div class="container">
  <?php if (!empty($movie)): ?>
    <h1><?= $movie['title'] ?></h1>
    <a href="/p/watch/<?= $movie['movie_id'] ?>" class="play-btn"><i class="fas fa-circle-play"></i></a>

  <?php else: ?>
    <h1>Oops! This title doesn't exist.</h1>
  <?php endif; ?>
</div>