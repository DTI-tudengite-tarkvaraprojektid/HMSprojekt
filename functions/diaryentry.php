<?php
	session_start();
	require("../../../../../config.php");

	

	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$id = $_SESSION["userid"];
	$dates = explode(",", $_REQUEST["dates"]);
	//print_r($dates);
	$stmt = $mysqli->prepare("SELECT id, date, answer1, answer2, answer3, answer4, answer5, answer6, answer7 FROM diary WHERE id=".$id.
	  " AND date=?;");
	$html = "";
	
	for($i = 0; $i < count($dates); $i++){
		$date = $dates[$i];
		//echo "neid on " .count($dates);
		//echo $date ."on teine  \n  ";
		$table = '<table class="diaryTable" ><tr>';
		$stmt->bind_param("s", $date);
		$stmt->bind_result($id, $date, $answer1, $answer2, $answer3, $answer4, $answer5, $answer6, $answer7);
		$stmt->execute();
		$table .= $date. "</tr><tr><th>Küsimus</th><th>Vastus</th></tr>"; 
		while ($stmt->fetch()){

			$table .= "<tr><td>1. Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all?</td><td>";
			if($answer1==0){
				$table .= "Üldse mitte.";
			}
			if($answer1==1){
				$table .= "Vähe.";
			}
			if($answer1==2){
				$table .= "Keskmiselt.";
			}
			if($answer1==3){
				$table .= "Palju.";
			}
			if($answer1==4){
				$table .= "Täiesti.";
			} 
			$table .= "</td></tr>";

			$table .= "<tr><td>2. Kui tugevalt hindan meelistegevust sooritada täna?</td><td>";
			if($answer2==0){
				$table .= "Olematu.";
			}
			if($answer2==1){
				$table .= "Nõrk.";
			}
			if($answer2==2){
				$table .= "Tavaline.";
			}
			if($answer2==3){
				$table .= "Kõrge.";
			}
			if($answer2==4){
				$table .= "Väga kõrge.";
			}

			$table .= "<tr><td>3. Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista?</td><td>";
			if($answer3==0){
				$table .= "Üldse mitte.";
			}
			if($answer3==1){
				$table .= "Vähe.";
			}
			if($answer3==2){
				$table .= "Keskmiselt.";
			}
			if($answer3==3){
				$table .= "Palju.";
			}
			if($answer3==4){
				$table .= "Täiesti.";
			}

			$table .= "<tr><td>4. Kas ma täna sooritasin oma meelistegevust?</td><td>";
			if($answer4==0){
				$table .= "Jah.";
			}
			if($answer4==1){
				$table .= "Ei.";
			}

			if($answer4==0){
				$table .= "<tr><td>5. Kui palju aega (tunde ja minuteid) ma seda tegevust sooritades veetsin?</td><td>";
				if($answer5<60){
					$table .= "Sa kulutasid mängimisele ".$answer5." minutit.";
				}else if($answer5==60){
					$table .= "Sa kulutasid mängimisele ".floor($answer5/60)." tunni.";
				}else if($answer5%60==0){
					$table .= "Sa kulutasid mängimisele ".floor($answer5/60)." tundi.";
				}else{
					$table .= "Sa kulutasid mängimisele ".floor($answer5/60)." tundi ja ".($answer5%60)." minutit.";
				}
				
				$table .= "<tr><td>6. Kas mul jäi selle tegevuse tõttu muud tegevused sooritamata või ma ei jõudnud neid õigeaegselt valmis? 
					Kui jah, siis millised muud tegevused seetõttu kannatasid?</td><td>";
					$table .= $answer6;
				
				$table .= "<tr><td>7. Kirjelda oma mõtteid ja tundeid ning nende muutumist päeva jooksul.</td><td>";
				$table .= $answer7;
			}
		}
		$table .="</table>";
		$html .= $table;
		
	}
	$stmt->close();
	$mysqli->close();
echo $html;
?>