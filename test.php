<?php
	session_start();
	require("../../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$stmt = $mysqli->prepare("UPDATE diary SET answer2="+$_REQUEST["a2"]+" WHERE answer1=0;");
	$stmt->execute();
	$stmt->close();
	$mysqli->close();
?>