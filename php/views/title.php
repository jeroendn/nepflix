<?php
/**
 * @var string $page
 * @var string $param
 */

use Nepflix\Table\GenreTable;
use Nepflix\Table\MovieCastTable;
use Nepflix\Table\MovieDirectorTable;
use Nepflix\Table\MovieTable;

$movie = $param ? (new MovieTable())->get($param) : null;
$genres = $movie ? (new GenreTable())->getForMovie($movie['movie_id']) : null;
$directors = $movie ? (new MovieDirectorTable())->getForMovie($movie['movie_id']) : null;
$casts = $movie ? (new MovieCastTable())->getForMovie($movie['movie_id']) : null;
?>

<div class="container-full title-cover" style="background-image: linear-gradient(180deg, transparent 30%, var(--color-bg) 95%), url(/img/thumb/<?= $movie['cover_image'] ?? 'no-video.jpg' ?>)">
</div>

<div class="container">
  <?php if (!empty($movie)): ?>
    <h1><?= $movie['title'] ?></h1>
    <a href="/p/watch/<?= $movie['movie_id'] ?>" class="play-btn"><i class="fas fa-circle-play"></i></a>

    <div class="title-info-bar">
      <p><span>Year:</span> <?= $movie['publication_year'] ?></p>
      <p><span>Duration:</span> <?= $movie['duration'] ?>min</p>
      <p><span>Genre<?= (count($genres) > 1 ? 's' : '') ?>:</span>&nbsp;
        <?php if (!empty($genres)) {
          end($genres);
          $lastKey = key($genres);
          foreach ($genres as $key => $genre) {
            echo $genre['genre_name'] . ($key === $lastKey ? '' : ', ');
          }
        }
        else {
          echo '-';
        } ?></p>
      <p><span>Director<?= (count($directors) > 1 ? 's' : '') ?>:</span>&nbsp;
        <?php if (!empty($directors)) {
          end($directors);
          $lastKey = key($directors);
          foreach ($directors as $key => $director) {
            echo $director['firstname'] . ' ' . $director['lastname'] . ($key === $lastKey ? '' : ', ');
          }
        }
        else {
          echo '-';
        } ?></p>
    </div>

    <p class="title-description"><?= $movie['description'] ?></p>

    <div class="title-cast">
      <h2>Cast</h2>
      <?php if (!empty($casts)): ?>
        <ul>
          <?php foreach ($casts as $cast): ?>
            <li><?= $cast['firstname'] . ' ' . $cast['lastname'] . ': ' . str_replace(['[', ']'], '', $cast['role']) ?></li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p>-</p>
      <?php endif; ?>
    </div>

  <?php else: ?>
    <h1>Oops! This title doesn't exist.</h1>
  <?php endif; ?>
</div>