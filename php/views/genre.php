<?php
/**
 * @var string $page
 * @var string $param
 */

use Nepflix\Table\GenreTable;
use Nepflix\Table\MovieTable;

$genre = $param ? (new GenreTable())->get($param) : null;
?>

<link rel="stylesheet" type="text/css" href="/css/browse.css">

<section class="container">
  <?php if (!empty($genre)): ?>

    <h1><?= $genre['genre_name'] ?></h1>
    <?php $movies = (new MovieTable())->getByGenre($genre['genre_name']); ?>
    <?php if (!empty($movies)): ?>

      <h2><?= count($movies) ?> Results</h2>
      <div class="genre-row">
        <?php foreach ($movies as $movie): ?>
          <?= getMovieTile($movie) ?>
        <?php endforeach; ?>
      </div>

    <?php else: ?>
      <p>No movies available in this category.</p>
    <?php endif; ?>

  <?php else: ?>
    <h1>Oops! This genre doesn't exist.</h1>
  <?php endif; ?>
</section>