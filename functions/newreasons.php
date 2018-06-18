<?php
	session_start();
	require("../../../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$id = $_SESSION["userid"];
	$newreaons = array();

	$sql = "SELECT answer61 FROM diary WHERE id=".$id.";";
	$result = $mysqli->query($sql);
	while($row = $result->fetch_assoc()) {
		if($row["answer61"]!="Ei kannatanud" && $row["answer61"]!="Töökohustused" &&
		$row["answer61"]!="Suhted lähedastega" && $row["answer61"]!="Suhted sõpradega" &&
		$row["answer61"]!="Koolitöö" && $row["answer61"]!="Välimuse eest hoolitsemine" &&
		$row["answer61"]!="Lemmiklooma eest hoolitsemine"){
			array_push($newreaons, $row["answer61"]);
		}	
	}
	$sql->execute();
	$sql->close();
	$mysqli->close();
?>