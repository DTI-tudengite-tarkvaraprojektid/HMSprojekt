<?php
	session_start();
	require("../../../../../config.php");
	
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$id = $_SESSION["userid"];
	$dates = explode(",", $_REQUEST["dates"]);
	$t = $_REQUEST["t"];
	if($t == 2){
		$t = 'Hasartmängusõltuvuse päeviku kokkuvõte';
	}
	if($t == 1){
		$t = 'Arvutisõltuvuse päeviku kokkuvõte';
	}
	$html = '<table id="diaryTable" class="diaryTable"><caption>'.$t.'</caption>';

	$diaryAnswersHeader = '<tr id="diaryTableHeader" class="diaryTableHeader"><td class="diaryQuestion">Küsimus</td>';
	$diaryAnswersRow1 = '<tr id="diaryTableRow1" class="diaryTableRow1"><td class="diaryQuestion">1. Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all?</td>';
	$diaryAnswersRow2 = '<tr id="diaryTableRow2" class="diaryTableRow2"><td class="diaryQuestion">2. Kui tugevalt hindan meelistegevust sooritada täna?</td>';
	$diaryAnswersRow3 = '<tr id="diaryTableRow3" class="diaryTableRow3"><td class="diaryQuestion">3. Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista?</td>';
	$diaryAnswersRow4 = '<tr id="diaryTableRow4" class="diaryTableRow4"><td class="diaryQuestion">4. Kas ma täna sooritasin oma meelistegevust?</td>';
	$diaryAnswersRow5 = '<tr id="diaryTableRow5" class="diaryTableRow5"><td class="diaryQuestion">5. Kui palju aega (tunde ja minuteid) ma seda tegevust sooritades veetsin?</td>';
	$diaryAnswersRow6 = '<tr id="diaryTableRow6" class="diaryTableRow6"><td class="diaryQuestion">6-1. Kas mul jäi selle tegevuse tõttu muud tegevused sooritamata või ma ei jõudnud neid õigeaegselt valmis? 
	Kui jah, siis millised muud tegevused seetõttu kannatasid?</td>';
	$diaryAnswersRow7 = '<tr id="diaryTableRow7" class="diaryTableRow7"><td class="diaryQuestion">6-2. Kui palju maha mängisid?</td>';
	$diaryAnswersRow8 = '<tr id="diaryTableRow8" class="diaryTableRow8"><td class="diaryQuestion">7. Kirjelda oma mõtteid ja tundeid ning nende muutumist päeva jooksul.</td>';
	$diaryAnswersRow9 = '<tr id="diaryTableRow9" class="diaryTableRow9"><td class="diaryQuestion">8. Päeva nägu: </td>';

	//print_r($dates);
	$stmt = $mysqli->prepare("SELECT id, type, date, answer1, answer2, answer3, answer4, answer5, answer61, answer62 ,answer7, answer8 FROM diary WHERE id=".$id." AND date=?;");
	
	for($i = 0; $i < count($dates); $i++){
		$date = $dates[$i];
		//echo "neid on " .count($dates);
		//echo $date ."on teine  \n  ";
		$stmt->bind_param("s", $date);
		$stmt->bind_result($id, $type, $date, $answer1, $answer2, $answer3, $answer4, $answer5, $answer61, $answer62, $answer7, $answer8);
		$stmt->execute();
		$diaryAnswersHeader .= '<td class="diaryDate">'.$date.'</td>'; 
		while ($stmt->fetch()){

			$diaryAnswersRow1 .= '<td class="diaryAnswer1">';
			if($answer1==0){
				$diaryAnswersRow1 .= "Üldse mitte.";
			}
			if($answer1==1){
				$diaryAnswersRow1 .= "Vähe.";
			}
			if($answer1==2){
				$diaryAnswersRow1 .= "Keskmiselt.";
			}
			if($answer1==3){
				$diaryAnswersRow1 .= "Palju.";
			}
			if($answer1==4){
				$diaryAnswersRow1 .= "Täiesti.";
			} 
			$diaryAnswersRow1 .= '</td>';

			$diaryAnswersRow2 .= '<td class="diaryAnswer2">';
			if($answer2==0){
				$diaryAnswersRow2 .= "Olematu.";
			}
			if($answer2==1){
				$diaryAnswersRow2 .= "Nõrk.";
			}
			if($answer2==2){
				$diaryAnswersRow2 .= "Tavaline.";
			}
			if($answer2==3){
				$diaryAnswersRow2 .= "Kõrge.";
			}
			if($answer2==4){
				$diaryAnswersRow2 .= "Väga kõrge.";
			}
			$diaryAnswersRow2 .= " </td>";
			$diaryAnswersRow3 .= '<td class="diaryAnswer3"> ';
			if($answer3==0){
				$diaryAnswersRow3 .= "Üldse mitte.";
			}
			if($answer3==1){
				$diaryAnswersRow3 .= "Vähe.";
			}
			if($answer3==2){
				$diaryAnswersRow3 .= "Keskmiselt.";
			}
			if($answer3==3){
				$diaryAnswersRow3 .= "Palju.";
			}
			if($answer3==4){
				$diaryAnswersRow3 .= "Täiesti.";
			}
			$diaryAnswersRow3 .= " </td>";
			$diaryAnswersRow4 .= '<td class="diaryAnswer4"> ';
			if($answer4==0){
				$diaryAnswersRow4 .= "Jah.";
			}
			if($answer4==1){
				$diaryAnswersRow4 .= "Ei.";
			}
			$diaryAnswersRow4 .= " </td>";
			if($answer4==0){
				$diaryAnswersRow5 .= '<td class="diaryAnswer5"> ';
				if($answer5<60){
					$diaryAnswersRow5 .= "Sa kulutasid mängimisele ".$answer5." minutit.";
				}else if($answer5==60){
					$diaryAnswersRow5 .= "Sa kulutasid mängimisele ".floor($answer5/60)." tundi.";
				}else if($answer5%60==0){
					$diaryAnswersRow5 .= "Sa kulutasid mängimisele ".floor($answer5/60)." tundi.";
				}else{
					$diaryAnswersRow5 .= "Sa kulutasid mängimisele ".floor($answer5/60)." tundi ja ".($answer5%60)." minutit.";
				}
				$diaryAnswersRow5 .= " </td>";
				$diaryAnswersRow6 .= '<td class="diaryAnswer61">'.$answer61.'</td>';
				$diaryAnswersRow7 .= '<td class="diaryAnswer62">'.$answer62.'</td>';
				$diaryAnswersRow8 .= '<td class="diaryAnswer7">'.$answer7.'</td>';
				$diaryAnswersRow9 .= '<td class="diaryAnswer8">'.$answer8.'</td>';
			}else{
			$diaryAnswersRow5 .= '<td>-</td>';
			$diaryAnswersRow6 .= '<td>-</td>';
			$diaryAnswersRow7 .= '<td>-</td>';
			$diaryAnswersRow8 .= '<td>-</td>';
			$diaryAnswersRow9 .= '<td>-</td>';
			}
		}
		$diaryAnswersRow1 .= '</tr>';
		$diaryAnswersRow2 .= '</tr>';
		$diaryAnswersRow3 .= '</tr>';
		$diaryAnswersRow4 .= '</tr>';
		$diaryAnswersRow5 .= '</tr>';
		$diaryAnswersRow6 .= '</tr>';
		$diaryAnswersRow7 .= '</tr>';
		$diaryAnswersRow8 .= '</tr>';
		$diaryAnswersRow9 .= '</tr>';
		
	}
	$html .= $diaryAnswersHeader .$diaryAnswersRow1 .$diaryAnswersRow2 .$diaryAnswersRow3 .$diaryAnswersRow4 .$diaryAnswersRow5 .$diaryAnswersRow6 .$diaryAnswersRow7 .$diaryAnswersRow8 .$diaryAnswersRow9;
	$html .= '</table>';
	$stmt->close();
	$mysqli->close();
echo $html;
?>