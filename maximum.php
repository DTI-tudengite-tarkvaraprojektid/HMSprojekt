<?php
	//session_start();
	require("../../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$id = $_REQUEST["a1"];
	$answerNr3 = $_REQUEST["a2"];
	if($answerNr3==0){
		$stmt = $mysqli->prepare("SELECT MAX(answer1) FROM diary WHERE id=".$id.";");
	}
	if($answerNr3==1){
		$stmt = $mysqli->prepare("SELECT MAX(answer2) FROM diary WHERE id=".$id.";");
	}
	if($answerNr3==2){
		$stmt = $mysqli->prepare("SELECT MAX(answer3) FROM diary WHERE id=".$id.";");
	}
	$stmt->bind_result($maximum);
	$stmt->execute();
	$stmt->fetch();
	$stmt->close();
	$mysqli->close();
	echo round($maximum, 2);
?>