<?php
	session_start();
	require("../../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$stmt = $mysqli->prepare("INSERT INTO diary (answer1, answer2, answer3, answer4) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("iiii",$_REQUEST["a1"], $_REQUEST["a2"],$_REQUEST["a3"],$_REQUEST["a4"]);
	$stmt->execute();
	$stmt->close();
	$mysqli->close();
?>