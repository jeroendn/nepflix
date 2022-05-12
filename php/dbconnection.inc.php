<?php
require 'dbsettings.inc.php';
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dBName",$dBUsername,$dBPassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "An error has occured: " . $e->getMessage();
}

// <?php
// $host = 'localhost'
// $dbname = 'sakila';
// $user = 'root';
// $password = '';
//
// $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
//
// $myquery1 = $conn->query('SELECT title FROM film WHERE length > 90');
// $myquery2 = $conn->exec('INSERT INTO language (language_id, name, last_update) VALUES(8,Dutch,NOW())');
// $myquery3 = $conn->exec('DELETE FROM film WHERE length = 47');
//
//
// while ($row = $myquery1->fetch(PDO::FETCH_ASSOC)) {
//   print $row['title'] . "<br>";
// }
//  ?>
