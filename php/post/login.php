<?php
require_once __DIR__ . '../../session.php';

if (isset($_POST['login-submit'])) {

	require 'dbconnection.inc.php';

	$emailusername = $_POST['emailusername'];
	$password = $_POST['password'];

	if (empty($emailusername) || empty($password)) {
		header("Location: ../login/index.php?error=emtyfieldslogin");
		exit();
	}
	else {
		try {
			$sql = "SELECT * FROM users WHERE user_username=:username OR user_email=:email;";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':username', $emailusername, PDO::PARAM_STR);
			$stmt->bindParam(':email', $emailusername, PDO::PARAM_STR);
			$stmt->execute();
		}
		catch (PDOException $e) {
			header("Location: ../login/index.php?error=sqlerror");
			exit();
		}

		if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$passwordCheck = password_verify($password, $row['user_password']);
			if ($passwordCheck == false) {
				header("Location: ../login/index.php?error=wrongpassword");
				exit();	
			}
			else if ($passwordCheck == true) {
				//Alles na het inloggen
				session_start();
				$_SESSION['userId'] = $row['user_id'];
				$_SESSION['userUsername'] = $row['user_username'];

				header("Location: ../login/index.php?login=success");
				exit();						
				
			}
			else {
				header("Location: ../login/index.php?error=wrongpassword");
				exit();						
			}
		}
		else {
			header("Location: ../login/index.php?error=nouserfound");
			exit();				
		}
	}

}
else {
	header("Location: ../login/index.php");
	exit();
}