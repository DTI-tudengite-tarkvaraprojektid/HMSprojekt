<?php
	$id = $_REQUEST["id"];/*siit edaspidi vaja hoopis oodatava küsimuse välja nime*/
	require("../../../../config.php");
	session_start();
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$Answers = array();
	/*$id = $_SESSION["userid"];*/
	/*$id = 20;*/
	$result = $mysqli->prepare("SELECT date, answer1 FROM diary WHERE id=?;");
	$result->bind_param("i", $id);
	$result->bind_result($date, $answer);
	$result->execute();
	
	while($result->fetch()) {
		array_push($Answers, array($date, $answer));
		/*echo "Sai: ".$date ." ja" .$answer;*/
	}
	
	$result->close();
	$mysqli->close();
	
	/*järgneva asemel json_encode  ja siis see json muutuja echo*/
	
	echo "Tulemus on: ";
	var_dump($Answers);
?>
