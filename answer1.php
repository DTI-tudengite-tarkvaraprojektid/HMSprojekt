<?php
	require("../../../../config.php");
	session_start();
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$Answers = array();
	$result = $mysqli->prepare("SELECT date, answer1 FROM diary WHERE id=?;");
	$result->bind_param("i", $_SESSION["userid"]);
	$result->bind_result($date, $answer);
	$result->execute();
	
	while($result->fetch()) {
		array_push($Answers, array($date, $answer));
	}
	
	$result->close();
	$mysqli->close();
	
	echo json_encode($Answers);
?>
