<?php
/**
 * @var string $page
 * @var string $param
 */

use Nepflix\Table\MovieTable;

$searchWord = $_POST['search-word'] ?? null;
$searchGenre = $_POST['search-genre'] ?? null;

if (empty($searchWord)) {
  header('Location: /p/browse/?error=no-value-provided');
  exit;
}

$movies = (new MovieTable)->getBySearch($searchWord, $searchGenre);
?>

<link rel="stylesheet" type="text/css" href="/css/browse.css">

<div class="container">

  <h1>Results for "<?= $searchWord ?>" <?= ($searchGenre ? ' in ' . $searchGenre : '') ?></h1>

  <?php if (!empty($movies)): ?>
    <h2><?= count($movies) ?> Results</h2>
    <div class="genre-row">
      <?php foreach ($movies as $movie): ?>
        <?= getMovieTile($movie) ?>
      <?php endforeach; ?>
    </div>

  <?php else: ?>
    <p class="text-center">Your search didn't get any results.</p>
  <?php endif; ?>

</div>