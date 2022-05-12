<?php
session_start();

if (!isset($_SESSION['userId'])) header("Location: ../login");

if (!isset($_POST['ratingup']) && !isset($_POST['ratingdown'])) header("Location: ../browse/?error=nosubmissionfound");

else {
	require 'dbconnection.inc.php';
	require 'dbsettings.inc.php';

	try {
		$sql = "SELECT COUNT(user_id) FROM rating WHERE film_id = :film_id AND user_id = :user_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':film_id', $_POST['film_id'], PDO::PARAM_INT);
		$stmt->bindParam(':user_id', $_SESSION['userId'], PDO::PARAM_INT);
		$stmt->execute();
	}
	catch (PDOException $e) {
		header("Location: ../login/index.php?error=sqlerror");
		exit();
	}

	$resultCheck = $stmt->fetchColumn();

	if ($resultCheck > 0) {
		header("Location: ../browse/?error=alreadyrated");
		exit();
	}


	if (isset($_POST['ratingup'])) {
		$upratingNum = 1;
		$downratingNum = 0;
	}
	else if (isset($_POST['ratingdown'])) {
		$upratingNum = 0;
		$downratingNum = 1;
	}
	//Insert for rating
	try {
		$sql = "INSERT INTO rating (film_id, user_id, uprating, downrating) VALUES (:film_id, :user_id, :uprating, :downrating)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':film_id', $_POST['film_id'], PDO::PARAM_INT);
		$stmt->bindParam(':user_id', $_SESSION['userId'], PDO::PARAM_INT);
		$stmt->bindParam(':uprating', $upratingNum, PDO::PARAM_INT);
		$stmt->bindParam(':downrating', $downratingNum, PDO::PARAM_INT);			
		$stmt->execute();				
	}
	catch (PDOException $e) {
		header("Location: ../login/index.php?error=sqlerror");
		exit();
	}
}


header("Location: ../browse");
