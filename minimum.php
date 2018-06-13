<?php
	//session_start();
	require("../../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$id = $_REQUEST["a1"];
	$answerNr2 = $_REQUEST["a2"];
	if($answerNr2==0){
		$stmt = $mysqli->prepare("SELECT MIN(answer1) FROM diary WHERE id=".$id.";");
	}
	if($answerNr2==1){
		$stmt = $mysqli->prepare("SELECT MIN(answer2) FROM diary WHERE id=".$id.";");
	}
	if($answerNr2==2){
		$stmt = $mysqli->prepare("SELECT MIN(answer3) FROM diary WHERE id=".$id.";");
	}
	$stmt->bind_result($minimum);
	$stmt->execute();
	$stmt->fetch();
	$stmt->close();
	$mysqli->close();
	echo round($minimum, 2);
?>