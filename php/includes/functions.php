<?php
/**
 * Return the database connection or exits the script on failure.
 * @return PDO
 */
function db(): PDO
{
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