<?php

use Nepflix\Table\GenreTable;
use Nepflix\Table\MovieTable;

require_once __DIR__ . '../../php/session.php';
?>

<!DOCTYPE html>
<html lang="EN" dir="ltr">
<head>
  <title>NEPFLIX- Browse</title>
  <?php require_once __DIR__ . '/includes/head.php'; ?>
  <link rel="stylesheet" type="text/css" href="../css/browse.css">
</head>

<body>
<?php require_once __DIR__ . '/includes/header.php'; ?>

<div class="container">
  <?php $genres = (new GenreTable())->getAll(); ?>

  <?php foreach ($genres as $genre): ?>
    <?php $movies = (new MovieTable())->getByGenre($genre['genre_name']); ?>
    <?php if (!empty($movies)): ?>

      <h2><?= $genre['genre_name'] ?></h2>
      <div class="genre-row">
        <?php foreach ($movies as $movie): ?>
          <div class="movie-card" style="background-image: url(../img/thumb/<?= (!empty($movie['cover_image']) ? $movie['cover_image'] : 'no-video.jpg') ?>);">
            <div class="movie-card-overlay">
              <h3><?= $movie['title'] ?></h3>
              <p><?= (strlen($movie['description']) > 50 ? substr($movie['description'], 0, 50) . '...' : $movie['description']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    <?php endif; ?>
  <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
