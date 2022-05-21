<?php
try {
  $conn = new PDO('mysql:host=' . DB_SERVERNAME . ';dbname=' . DB_TABLE_NAME, DB_USERNAME, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  echo "An error has occurred: " . $e->getMessage();
}
