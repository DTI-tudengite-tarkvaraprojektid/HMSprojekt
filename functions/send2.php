<?php
	session_start();
	require("../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	if($_REQUEST["type"]==1){
		$stmt = $mysqli->prepare("INSERT INTO diary (id, type, answer1, answer2, answer3, answer4, answer5, answer61, answer7, answer8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
		$stmt->bind_param("iiiiiiissi", $_SESSION['userid'], $_REQUEST["type"], $_REQUEST["a1"], $_REQUEST["a2"],$_REQUEST["a3"],$_REQUEST["a4"], $_REQUEST["a5"],$_REQUEST["a61"],$_REQUEST["a7"],$_REQUEST["a8"]);
	}
	if($_REQUEST["type"]==2){
		$stmt = $mysqli->prepare("INSERT INTO diary (id, type, answer1, answer2, answer3, answer4, answer5, answer62, answer7, answer8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
		$stmt->bind_param("iiiiiiiisi", $_SESSION['userid'], $_REQUEST["type"], $_REQUEST["a1"], $_REQUEST["a2"],$_REQUEST["a3"],$_REQUEST["a4"], $_REQUEST["a5"],$_REQUEST["a62"],$_REQUEST["a7"],$_REQUEST["a8"]);
	}
	$stmt->execute();
	$stmt->close();
	$mysqli->close();
?>