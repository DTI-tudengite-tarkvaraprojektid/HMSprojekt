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
	//print_r($dates);
	$stmt = $mysqli->prepare("SELECT id, type, date, answer1, answer2, answer3, answer4, answer5, answer61, answer62 ,answer7, answer8 FROM diary WHERE id=".$id.
	  " AND date=?;");
	$html = '<div class="header">'.$t.'</div><div class="T">
	<div class="Q">Küsimus</div> 
	<div class="q"> 1. Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all?</div> 
	<div class="q">  2. Kui tugevalt hindan meelistegevust sooritada täna? </div>
	<div class="q">  3. Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista?</div>
	<div class="q">  4. Kas ma täna sooritasin oma meelistegevust? </div>
	<div class="q">  5. Kui palju aega (tunde ja minuteid) ma seda tegevust sooritades veetsin? </div>
	<div class="q">  6-1. Kas mul jäi selle tegevuse tõttu muud tegevused sooritamata või ma ei jõudnud neid õigeaegselt valmis? 
	Kui jah, siis millised muud tegevused seetõttu kannatasid? </div>
	<div class="q">  6-2. Kui palju maha mängisid?</div>
	<div class="q">  7. Kirjelda oma mõtteid ja tundeid ning nende muutumist päeva jooksul.</div>
	<div class="q">  8. Päeva nägu </div></div><div class="week">';
	for($i = 0; $i < count($dates); $i++){
		$date = $dates[$i];
		//echo "neid on " .count($dates);
		//echo $date ."on teine  \n  ";
		$table = "";
		$stmt->bind_param("s", $date);
		$stmt->bind_result($id, $type, $date, $answer1, $answer2, $answer3, $answer4, $answer5, $answer61, $answer62, $answer7, $answer8);
		$stmt->execute();
		$table .= '<div class="day">'.$date.'</div>'; 
		while ($stmt->fetch()){

			$table .= '<div class="a"> ';
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
			$table .= " </div>";

			$table .= '<div class="a"> ';
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
			$table .= " </div>";
			$table .= '<div class="a"> ';
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
			$table .= " </div>";
			$table .= '<div class="a"> ';
			if($answer4==1){
				$table .= "Jah.";
			}
			if($answer4==0){
				$table .= "Ei.";
			}
			$table .= " </div>";
			if($answer4==1){
				$table .= '<div class="a"> ';
				if($answer5<60){
					$table .= "Sa kulutasid mängimisele ".$answer5." minutit.";
				}else if($answer5==60){
					$table .= "Sa kulutasid mängimisele ".floor($answer5/60)." tunni.";
				}else if($answer5%60==0){
					$table .= "Sa kulutasid mängimisele ".floor($answer5/60)." tundi.";
				}else{
					$table .= "Sa kulutasid mängimisele ".floor($answer5/60)." tundi ja ".($answer5%60)." minutit.";
				}
				$table .= " </div>";
				$table .= '<div class="a"> ';
				$table .= $answer61;
				$table .= " </div>";
				$table .= '<div class="a"> ';
				$table .= $answer62;
				$table .= " </div>";
				$table .= '<div class="a"> ';
				$table .= $answer7;
				$table .=  " </div>";
				$table .= '<div class="a"> ';
				$table .= $answer8;
				$table .= " </div>";
			}
		}
		$table .='</div></div>';
		$html .= $table;
		
	}
	$html .= '</div></div>';
	$stmt->close();
	$mysqli->close();
echo $html;
?>