<?php
/**
 * @var string $page
 * @var string $param
 */

use Nepflix\Table\MovieTable;

require_once __DIR__ . '../../php/session.php';

$movie = $param ? (new MovieTable())->get($param) : null;
?>

<div class="container">
  <?php if (!empty($movie)): ?>

    <h1><?= $movie['title'] ?></h1>

  <?php else: ?>
    <h1>Oops! This title doesn't exist.</h1>
  <?php endif; ?>
</div>