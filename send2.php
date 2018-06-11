<?php
	session_start();
	require("../../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$stmt = $mysqli->prepare("INSERT INTO diary (id, answer1, answer2, answer3, answer4, answer5, answer61, answer62, answer63, answer7) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
	$stmt->bind_param("iiiiiiisss", $_SESSION['userid'], $_REQUEST["a1"], $_REQUEST["a2"],$_REQUEST["a3"],$_REQUEST["a4"], $_REQUEST["a5"], $_REQUEST["a61"],$_REQUEST["a62"],$_REQUEST["a63"],$_REQUEST["a7"]);
	$stmt->execute();
	$stmt->close();
	$mysqli->close();
?>