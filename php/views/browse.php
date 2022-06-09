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
          <div class="movie-card" style="background-image: url(/img/thumb/<?= (!empty($movie['cover_image']) ? $movie['cover_image'] : 'no-video.jpg') ?>);">
            <a href="/p/title/<?= $movie['movie_id'] ?>">
              <div class="movie-card-overlay">
                <h3><?= $movie['title'] ?></h3>
                <p><?= (strlen($movie['description']) > 50 ? substr($movie['description'], 0, 50) . '...' : $movie['description']) ?></p>
                <div class="movie-card-bottom">
                  <p><span>Year: <?= $movie['publication_year'] ?></span>&nbsp;-&nbsp;<span>Min: <?= $movie['duration'] ?></span></p>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>

    <?php endif; ?>
  <?php endforeach; ?>
</div>