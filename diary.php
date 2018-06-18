<?php
require("../../../../config.php");
require("functions/functions.php");
$reasons = array("Ei kannatanud", "Töökohustused", "Suhted lähedastega", "Suhted sõpradega", "Koolitöö", "Välimuse eest hoolitsemine", "Lemmiklooma eest hoolitsemine", "Midagi muud");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA_Compatible" content="ie=edge">
	<title>Päeviku täitmine</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">	
	<script src="js/tree.js" defer></script>
</head>


	
<body>

<div id="sections" class="sections">

	<div id="section1" class="section">
		<h5 id="question1"> 1. Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all? </h5>

		<label for="answer11"> Üldse mitte </label><input type="radio" id="answer11" name="answer1" value="0" onclick="button1()">

		<label for="answer12"> Vähe </label><input type="radio" id="answer12" name="answer1" value="1" onclick="button1()">

		<label for="answer13"> Keskmiselt </label><input type="radio" id="answer13" name="answer1" value="2" onclick="button1()">

		<label for="answer14"> Vähe </label><input type="radio" id="answer14" name="answer1" value="3" onclick="button1()">

		<label for="answer15"> Täiesti </label><input type="radio" id="answer15" name="answer1" value="4" onclick="button1()">
		
	</div>
	
	<div id="start">

	<div id="section2" class="section">
		<h5 id="question2"> 2. Kui tugevalt hindan meelistegevust sooritada täna? </h5>

		<label for="answer21"> Olematu </label><input type="radio" id="answer21" name="answer2" value="0" onclick="button2()">

		<label for="answer22"> Nõrk </label><input type="radio" id="answer22" name="answer2" value="1" onclick="button2()">

		<label for="answer23"> Tavaline </label><input type="radio" id="answer23" name="answer2" value="2" onclick="button2()">

		<label for="answer24"> Kõrge </label><input type="radio" id="answer24" name="answer2" value="3" onclick="button2()">

		<label for="answer25"> Väga kõrge </label><input type="radio" id="answer25" name="answer2" value="4" onclick="button2()">

	</div>

	<div id="section3" class="section">
		<h5 id="question3"> 3. Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista? </h5>
			
		<label for="answer31"> Üldse mitte </label><input type="radio" id="answer31" name="answer3" value="0" onclick="button3()">

		<label for="answer32"> Vähe </label><input type="radio" id="answer32" name="answer3" value="1" onclick="button3()">

		<label for="answer33"> Keskmiselt </label><input type="radio" id="answer33" name="answer3" value="2" onclick="button3()">

		<label for="answer34"> Palju </label><input type="radio" id="answer34" name="answer3" value="3" onclick="button3()">

		<label for="answer35"> Täiesti </label><input type="radio" id="answer35" name="answer3" value="4" onclick="button3()">
		
	</div>

	<div id="section4" class="section">
		<h5 id="question4"> 4. Kas ma täna sooritasin oma meelistegevust? </h5>
			
		<label for="answer41"> Jah </label><input type="radio" id="answer41" name="answer4" value="0" onclick="button4()">
			
		<label for="answer42"> Ei </label><input type="radio" id="answer42" name="answer4" value="1" onclick="button4()">
			
	</div>
	
	<h5 id="end1"> Sa olid täna väga tubli, jätka samas vaimus!!! </h5>
	
	<button id="send1" type="button" value="<?php echo $_REQUEST["type"]; ?>">Saada andmed</button>

	<div id="section5" class="section">
		<h5 id="question5"> 5. Kui palju aega (tunde ja minuteid) ma seda tegevust sooritades veetsin? </h5>
	 
		<label> Ma kulutasin selle tegevuse peale aega </label><input id="hours" type="number" min="0" max="24" value="0">
	   
		<label> tundi ja </label><input id="minutes" type="number" min="0" max="59" value="0">
		
		<label> minutit. </label>
		
		<button class="fixButtons" id="button5" type="button" onclick="button5()">Fikseeri aeg</button>
	</div>
	
	<div id="section61" class="section">
		<h5 id="question61"> 6. Kas mul jäi selle tegevuse tõttu muud tegevused sooritamata või ma ei jõudnud neid õigeaegselt valmis? 
			Kui jah, siis millised muud tegevused seetõttu kannatasid? </h5>

		<?php

			for ($i = 0; $i < count($reasons); $i++) {
				if($i<count($reasons)-1){
					echo "<div>";
					echo "<input id='reasons".($i+1)."' type='checkbox' value='".$reasons[$i]."'>";
					echo "<label for='".$reasons[$i]."'>".$reasons[$i]."</label>";
					echo "</div>";
				}else{
					echo "<div>";
					echo "<input id='reasons".($i+1)."' type='checkbox' value='".$reasons[$i]."'>";
					echo "<label for='".$reasons[$i]."'>".$reasons[$i]."</label>";
					echo "<input id='otherValue' style='width: 15%' type='text' name='other'>";
					echo "</div>";
				}
			}

		?>
			
		<button class="fixButtons" id="button61" type="button">Fikseeri vastus</button>
	</div>
	
	<div id="section62" class="section">
	
		<h5 id="question62"> 6. Kui palju sa raha mängimisele kulutasid (välja arvatud võidud)? </h5>
		
		<label> Ma mängisin täna maha </label><input id="money" type="number" min="0" value="">
		<label> eurot. </label>
		
		<button class="fixButtons" id="button62" type="button">Fikseeri summa</button>
			
	</div>

	<div id="section7" class="section">
		<h5 id="question7"> 7. Kirjelda oma mõtteid ja tundeid ning nende muutumist päeva jooksul. </h5>

		<textarea id="answer7" type="text" rows="4" cols="50" value=""></textarea>
		
		<button class="fixButtons" id="button7" type="button">Fikseeri vastus</button>
	</div>
	
	<div id="section8" class="section">
		<h5 id="question8"> 8. Vali emotsioon, mis kirjeldab teie olekut kõige ilmekamalt. </h5>

		<label for="answer81"> Väga kurb </label><input type="radio" id="answer81" name="answer1" value="0" onclick="button8()">

		<label for="answer82"> Kurb </label><input type="radio" id="answer82" name="answer1" value="1" onclick="button8()">

		<label for="answer83"> Normaalne </label><input type="radio" id="answer83" name="answer1" value="2" onclick="button8()">

		<label for="answer84"> Rõõmus </label><input type="radio" id="answer84" name="answer1" value="3" onclick="button8()">

		<label for="answer85"> Väga rõõmus </label><input type="radio" id="answer85" name="answer1" value="4" onclick="button8()">
		
	</div>
	
	<h5 id="end2"> Sa andsid küll täna oma nõrkusele järele, aga püüa vähemalt homme tublim olla!!! </h5>
	
	<button id="send2" type="button" value="<?php echo $_REQUEST['type'] ?>">Saada andmed</button>

	</div>
	
</div>

</body>

</html>