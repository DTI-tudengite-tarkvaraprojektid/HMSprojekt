<?php
	//session_start();
	require("../../../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$stmt = $mysqli->prepare("SELECT COUNT(id) FROM userinfo;");
	$stmt->bind_result($usersCount);
	$stmt->execute();
	$stmt->fetch();
	$stmt->close();
	$mysqli->close();
	echo $usersCount;
?>