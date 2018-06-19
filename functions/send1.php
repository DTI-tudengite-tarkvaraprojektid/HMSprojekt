<?php
	session_start();
	require("../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$stmt = $mysqli->prepare("INSERT INTO diary (id, type, answer1, answer2, answer3, answer4, answer7, answer8) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
	$stmt->bind_param("iiiiiisi", $_SESSION['userid'], $_REQUEST["type"], $_REQUEST["a1"], $_REQUEST["a2"],$_REQUEST["a3"],$_REQUEST["a4"],$_REQUEST["a7"],$_REQUEST["a8"]);
	$stmt->execute();
	$stmt->close();
	$mysqli->close();
?>