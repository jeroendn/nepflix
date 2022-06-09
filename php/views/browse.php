<?php
use Nepflix\Table\GenreTable;
use Nepflix\Table\MovieTable;

?>

<div class="container">
  <?php $genres = (new GenreTable())->getAll(); ?>

  <?php foreach ($genres as $genre): ?>
    <?php $movies = (new MovieTable())->getByGenre($genre['genre_name'], 15); ?>
    <?php if (!empty($movies)): ?>

      <h2><a href="/p/genre/<?= $genre['genre_name'] ?>"><?= $genre['genre_name'] ?>&nbsp;<i class="fas fa-chevron-right"></i></a></h2>
      <div class="genre-row scrollable">
        <?php foreach ($movies as $movie): ?>
          <?= getMovieTile($movie) ?>
        <?php endforeach; ?>
      </div>

    <?php endif; ?>
  <?php endforeach; ?>
</div>