<?php

use Nepflix\Table\GenreTable;
use Nepflix\Table\MovieTable;

require_once __DIR__ . '../../php/session.php';

$genreName = h($_GET['name']) ?? null;
$genre = $genreName ? (new GenreTable())->get($genreName) : null;
?>

<!DOCTYPE html>
<html lang="EN" dir="ltr">
<head>
  <title>NEPFLIX- <?= $movie['genre_name'] ?? '404' ?></title>
  <?php require_once __DIR__ . '/includes/head.php'; ?>
  <link rel="stylesheet" type="text/css" href="../css/browse.css">
</head>

<body>
<?php require_once __DIR__ . '/includes/header.php'; ?>

<div class="container">
  <?php if (!empty($genre)): ?>

    <h1><?= $genre['genre_name'] ?></h1>
    <?php $movies = (new MovieTable())->getByGenre($genre['genre_name']); ?>
    <?php if (!empty($movies)): ?>

      <h2><?= count($movies) ?> Results</h2>
      <div class="genre-row">
        <?php foreach ($movies as $movie): ?>
          <div class="movie-card" style="background-image: url(../img/thumb/<?= (!empty($movie['cover_image']) ? $movie['cover_image'] : 'no-video.jpg') ?>);">
            <a href="/title/<?= $movie['movie_id'] ?>">
              <div class="movie-card-overlay">
                <h3><?= $movie['title'] ?></h3>
                <p><?= (strlen($movie['description']) > 50 ? substr($movie['description'], 0, 50) . '...' : $movie['description']) ?></p>
                <div class="movie-card-bottom">
                  <p><span>Year: <?= $movie['publication_year'] ?></span>&nbsp-&nbsp<span>Min: <?= $movie['duration'] ?></span></p>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>

    <?php else: ?>
      <p>No movies available in this category.</p>
    <?php endif; ?>

  <?php else: ?>
    <h1>Oops! This genre doesn't exist.</h1>
  <?php endif; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
