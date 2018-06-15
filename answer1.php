<?php
	$q = $_REQUEST["q"];
	$v = $_REQUEST["v"];
	require("../../../../config.php");
	session_start();
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$Answers = array();
	$result = $mysqli->prepare("SELECT ".$v.", ".$q." FROM diary WHERE id=?;");
	$result->bind_param("i", $_SESSION["userid"]);
	$result->bind_result($result1, $result2);
	$result->execute();
	
	while($result->fetch()) {
		array_push($Answers, array($result1, $result2));
	}
	
	$result->close();
	$mysqli->close();
	
	echo json_encode($Answers);
?>
