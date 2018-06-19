<?php
	session_start();
	require("../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$stmt = $mysqli->prepare("SELECT COUNT(id) FROM diary;");
	$stmt->bind_result($entrys);
	$stmt->execute();
	$stmt->fetch();
	$stmt->close();
	$mysqli->close();
	echo $entrys;
?>