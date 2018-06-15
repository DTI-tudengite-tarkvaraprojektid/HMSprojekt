<?php
	//session_start();
	require("../../../../../config.php");
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$id = $_REQUEST["a1"];
	$answerNr4 = $_REQUEST["a2"];

	if($answerNr4==0){
		$sql = "SELECT answer4, ROUND((100*COUNT(*))/(SELECT COUNT(*) FROM diary WHERE id=".$id."), 2) AS frequencys FROM diary WHERE id=".$id." GROUP BY answer4;";
		$result = $mysqli->query($sql);
		echo "<table>";
		while($row = $result->fetch_assoc()) {
			if($row["answer4"]==0){
				echo "<tr>";
				echo "<td>Jah</td><td>". $row["frequencys"]."%</td>";
				echo "</tr>";
			}	
			if($row["answer4"]==1){
				echo "<tr>";
				echo "<td>Ei</td><td>". $row["frequencys"]."%</td>";
				echo "</tr>";
			}	
		}
		echo "</table>";
	}
	if($answerNr4==1){
		$sql = "SELECT answer6, ROUND((100*COUNT(*))/(SELECT COUNT(*) FROM diary WHERE id=".$id."), 2) AS frequencys FROM diary WHERE id=".$id." GROUP BY answer6;";
		$result = $mysqli->query($sql);
		echo "<table>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			if($row["answer6"]==NULL){
				echo "<td>Ei mänginud</td><td>". $row["frequencys"]."%</td>";
			}else{
				echo "<td>".$row["answer6"]."</td><td>". $row["frequencys"]."%</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
?>