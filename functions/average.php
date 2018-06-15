<?php
	//session_start();
	require("../../../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$id = $_REQUEST["a1"];
	$answerNr1 = $_REQUEST["a2"];
	if($answerNr1==0){
		$stmt = $mysqli->prepare("SELECT AVG(answer1) FROM diary WHERE id=".$id.";");
	}
	if($answerNr1==1){
		$stmt = $mysqli->prepare("SELECT AVG(answer2) FROM diary WHERE id=".$id.";");
	}
	if($answerNr1==2){
		$stmt = $mysqli->prepare("SELECT AVG(answer3) FROM diary WHERE id=".$id.";");
	}
	$stmt->bind_result($average);
	$stmt->execute();
	$stmt->fetch();
	$stmt->close();
	$mysqli->close();
	echo round($average, 2);
?>