<?php
$conn = null;

/**
 * Return the database connection or exits the script on failure.
 * @return PDO
 */
function db(): PDO
{
  global $conn;

  if (isset($conn)) { // Do not create new connection if it already exists.
    return $conn;
  }

  try {
    $conn = new PDO('mysql:host=' . DB_SERVERNAME . ';charset=utf8mb4;dbname=' . DB_TABLE_NAME, DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $e) {
    echo 'An error has occurred: ' . $e->getMessage();
    exit;
  }

  return $conn;
}

/**
 * @param string $string
 * @return string
 */
function h(string $string): string
{
  return htmlspecialchars($string);
}

/**
 * @return string
 */
function getUrl(): string
{
  return "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

/**
 * @return bool
 */
function loggedIn(): bool
{
  return isset($_SESSION['customer']);
}


/**
 * Debug a variable to the screen.
 * @param $variable
 * @return void
 */
function dd($variable)
{
  var_dump($variable);
  die;
}

/**
 * @param array $movie
 * @return string
 */
function getMovieTile(array $movie): string
{
  $id = $movie['movie_id'];
  $title = $movie['title'];
  $img = (!empty($movie['cover_image']) ? $movie['cover_image'] : 'no-video.jpg');
  $description = (strlen($movie['description']) > 50 ? substr($movie['description'], 0, 50) . '...' : $movie['description']);
  $year = $movie['publication_year'];
  $duration = $movie['duration'];

  return <<<HTML
        <div class="movie-card" style="background-image: url(/img/thumb/$img);">
          <a href="/p/title/$id">
            <div class="movie-card-overlay">
              <h3>$title</h3>
              <p>$description</p>
              <div class="movie-card-bottom">
                <p><span>Year: $year</span>&nbsp;-&nbsp;<span>Min: $duration</span></p>
              </div>
            </div>
          </a>
        </div>
  HTML;
}