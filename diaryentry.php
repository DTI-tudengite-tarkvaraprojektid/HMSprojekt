<?php
	session_start();
	require("../../../../config.php");

	$dates = $_REQUEST["dates"];

	for($i = 0; $i < count($dates); $i++){

	}

	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$id = $_SESSION["userid"];
	$stmt = $mysqli->prepare("SELECT id, date, answer1, answer2, answer3, answer4, answer5, answer6, answer7 FROM diary WHERE id=".$id." AND date=?;");
	$stmt->bind_param("s", $date);
	$stmt->bind_result($id, $date, $answer1, $answer2, $answer3, $answer4, $answer5, $answer6, $answer7);
	$stmt->execute();
	$stmt->fetch();
	$stmt->close();
	$mysqli->close();
	
	echo "1. Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all?<br>";
	if($answer1==0){
		echo "Üldse mitte.<br><br>";
	}
	if($answer1==1){
		echo "Vähe.<br><br>";
	}
	if($answer1==2){
		echo "Keskmiselt.<br><br>";
	}
	if($answer1==3){
		echo "Palju.<br><br>";
	}
	if($answer1==4){
		echo "Täiesti.<br><br>";
	}
	
	echo "2. Kui tugevalt hindan meelistegevust sooritada täna?<br>";
	if($answer2==0){
		echo "Olematu.<br><br>";
	}
	if($answer2==1){
		echo "Nõrk.<br><br>";
	}
	if($answer2==2){
		echo "Tavaline.<br><br>";
	}
	if($answer2==3){
		echo "Kõrge.<br><br>";
	}
	if($answer2==4){
		echo "Väga kõrge.<br><br>";
	}
	
	echo "3. Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista?<br>";
	if($answer3==0){
		echo "Üldse mitte.<br><br>";
	}
	if($answer3==1){
		echo "Vähe.<br><br>";
	}
	if($answer3==2){
		echo "Keskmiselt.<br><br>";
	}
	if($answer3==3){
		echo "Palju.<br><br>";
	}
	if($answer3==4){
		echo "Täiesti.<br><br>";
	}
	
	echo "4. Kas ma täna sooritasin oma meelistegevust?<br>";
	if($answer4==0){
		echo "Jah.<br><br>";
	}
	if($answer4==1){
		echo "Ei.<br><br>";
	}
	
	if($answer4==0){
		echo "5. Kui palju aega (tunde ja minuteid) ma seda tegevust sooritades veetsin?<br>";
		if($answer5<60){
			echo "Sa kulutasid täna mängimisele ".$answer5." minutit.<br><br>";
		}else if($answer5==60){
			echo "Sa kulutasid täna mängimisele ".floor($answer5/60)." tunni.<br><br>";
		}else if($answer5%60==0){
			echo "Sa kulutasid täna mängimisele ".floor($answer5/60)." tundi.<br><br>";
		}else{
			echo "Sa kulutasid täna mängimisele ".floor($answer5/60)." tundi ja ".($answer5%60)." minutit.<br><br>";
		}
		
		echo "6. Kas mul jäi selle tegevuse tõttu muud tegevused sooritamata või ma ei jõudnud neid õigeaegselt valmis? 
			Kui jah, siis millised muud tegevused seetõttu kannatasid?<br>";
		echo $answer6."<br><br>";
		
		echo "7. Kirjelda oma mõtteid ja tundeid ning nende muutumist päeva jooksul.<br>";
		echo $answer7;
	}
	
?>