<?php
	//session_start();
	require("../../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$id = $_REQUEST["a1"];
	$answerNr4 = $_REQUEST["a2"];

	if($answerNr4==0){
		$sql = "SELECT answer4, ROUND(100*COUNT(*)/(SELECT COUNT(*) FROM diary), 2) AS frequencys FROM diary GROUP BY answer4;";
		$result = $mysqli->query($sql);
		echo "<table>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo $row["answer4"]. "&nbsp&nbsp&nbsp". $row["frequencys"]."%<br>";
			echo "<tr>";			
		}
		echo "</table>";
	}
	if($answerNr4==1){
		$sql = "SELECT answer6, ROUND(100*COUNT(*)/(SELECT COUNT(*) FROM diary), 2) AS frequencys FROM diary GROUP BY answer6;";
		$result = $mysqli->query($sql);
		echo "<table>";
		while($row = $result->fetch_assoc()) {
			if($row["answer6"]==NULL){
				echo "<tr>";
				echo "Ei mänginud &nbsp&nbsp&nbsp". $row["frequencys"]."%<br>";
				echo "</tr>";
			}else{
				echo "<tr>";
				echo $row["answer6"]. "&nbsp&nbsp&nbsp". $row["frequencys"]."%<br>";
				echo "</tr>";
			}
		}
		echo "</table>";
	}
?>