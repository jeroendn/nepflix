<?php

use Nepflix\Table\MovieTable;

require_once __DIR__ . '../../php/session.php';

$movieId = h($_GET['movie-id']) ?? null;
$movie = $movieId ? (new MovieTable())->get($movieId) : null;
?>

<!DOCTYPE html>
<html lang="EN" dir="ltr">
<head>
  <title>NEPFLIX- <?= $movie['title'] ?? '404' ?></title>
  <?php require_once __DIR__ . '/includes/head.php'; ?>
  <link rel="stylesheet" type="text/css" href="../css/title.css">
</head>

<body>
<?php require_once __DIR__ . '/includes/header.php'; ?>

<div class="container">
  <?php if (!empty($movie)): ?>

    <h1><?= $movie['title'] ?></h1>

  <?php else: ?>
    <h1>Oops! This title doesn't exist.</h1>
  <?php endif; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
