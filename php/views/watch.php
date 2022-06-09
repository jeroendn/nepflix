<?php
/**
 * @var string $page
 * @var string $param
 */

use Nepflix\Table\MovieTable;

$movie = $param ? (new MovieTable())->get($param) : null;
?>

<div class="container">
  <video controls autoplay muted>
    <source src="/movies/<?= $movie['filename'] ?? 'default.mp4' ?>" type="video/mp4">
  </video>
</div>