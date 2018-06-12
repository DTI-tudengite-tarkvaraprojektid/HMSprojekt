<?php
require("../../../../config.php");
require("functions.php");
$reasons = array("Töökohustused", "Suhted lähedastega", "Suhted sõpradega", "Koolitöö", "Välimuse eest hoolitsemine", "Lemmiklooma eest hoolitsemine", "Midagi muud");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA_Compatible" content="ie=edge">
	<title>Küsimuste puu</title>
	<script src="tree.js" defer></script>
	<link rel="stylesheet" type="text/css" href="style.css">	
</head>


	
<body>

<div id="sections" class="sections">

	<div id="section1" class="section">
		<h3 id="question1"> 1. Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all? </h3>

		<input type="radio" id="answer11" name="answer1" value="0">

		<p id="option11"> Üldse mitte </p>

		<input type="radio" id="answer12" name="answer1" value="1">

		<p id="option12"> Vähe </p>

		<input type="radio" id="answer13" name="answer1" value="2">

		<p id="option13"> Keskmiselt </p>

		<input type="radio" id="answer14" name="answer1" value="3"> 

		<p id="option14"> Palju </p>

		<input type="radio" id="answer15" name="answer1" value="4">

		<p id="option15"> Täiesti </p>
		
		<button id="button1" type="button">Fikseeri vastus</button>
	</div>
	
	<div id="start">

	<div id="section2" class="section">
		<h3 id="question2"> 2. Kui tugevalt hindan meelistegevust sooritada täna? </h3>

		<input type="radio" id="answer21" name="answer2" value="0">

		<p id="option21"> Olematu </p>

		<input type="radio" id="answer22" name="answer2" value="1">

		<p id="option22"> Nõrk </p>

		<input type="radio" id="answer23" name="answer2" value="2">

		<p id="option23"> Tavaline </p>

		<input type="radio" id="answer24" name="answer2" value="3"> 

		<p id="option24"> Kõrge </p>

		<input type="radio" id="answer25" name="answer2" value="4">

		<p id="option25"> Väga kõrge </p>

		<button id="button2" type="button">Fikseeri vastus</button> 
	</div>

	<div id="section3" class="section">
		<h3 id="question3"> 3. Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista? </h3>
			
		<input type="radio" id="answer31" name="answer3" value="0">
		
		<p id="option31"> Üldse mitte </p>
		
		<input type="radio" id="answer32" name="answer3" value="1">
		
		<p id="option32"> Vähe </p>
		
		<input type="radio" id="answer33" name="answer3" value="2">
		
		<p id="option33"> Keskmiselt </p>
		
		<input type="radio" id="answer34" name="answer3" value="3"> 
		
		<p id="option34"> Palju </p>
		
		<input type="radio" id="answer35" name="answer3" value="4">
		
		<p id="option35"> Täiesti </p>
		
		<button id="button3" type="button">Fikseeri vastus</button>
	</div>

	<div id="section4" class="section">
		<h3 id="question4"> 4. Kas ma täna sooritasin oma meelistegevust? </h3>
			
		<input type="radio" id="answer41" name="answer4"  value="0">
			
		<p id="option41"> Jah </p>
			
		<input type="radio" id="answer42" name="answer4" value="1">
			
		<p id="option42"> Ei </p>
		<button id="button4" type="button">Fikseeri vastus</button>
	</div>
	
	<h3 id="end1"> Sa olid täna väga tubli, jätka samas vaimus!!! </h3>
	
	<button id="send1" type="button" value="">Saada andmed</button>

	<div id="section5" class="section">
		<h3 id="question5"> 5. Kui palju aega (tunde ja minuteid) ma seda tegevust sooritades veetsin? </h3>
	 
		<p id="answer5start"> Ma kulutasin selle tegevuse peale aega </p>
		
		<input id="hours" type="number" min="0" max="24" value="0">
	   
		<p id="answer5center"> tundi ja </p>
			
		<input id="minutes" type="number" min="0" max="59" value="0">
		
		<p  id="answer5end"> minutit. </p>
		
		<button id="button5" type="button">Fikseeri vastus</button>
	</div>
	
	<div id="section61" class="section">
		<h3 id="question6"> 6. Kas mul jäi selle tegevuse tõttu muud tegevused sooritamata või ma ei jõudnud neid õigeaegselt valmis? 
			Kui jah, siis millised muud tegevused seetõttu kannatasid? </h3>

		<input type="radio" id="answer61" name="answer6"  value="0">
		
		<p id="option61"> Jah </p>
		
		<input type="radio" id="answer62" name="answer6" value="1">
		
		<p id="option62"> Ei </p>
		
		<button id="button61" type="button">Fikseeri vastus</button>
	</div>
		
	<div id="section62" class="section">
		<h3 id="what"> Millised tegevused kannatasid? </h3>
		
		<?php 
			echo "<select id='reasons'>";
			for ($i = 0; $i < count($reasons); $i++) {
				echo '<option value="' .$reasons[$i] .'">'.$reasons[$i] ."</option>";
			}
			echo "</select>";
		?>
			
		<button id="button62" type="button">Fikseeri vastus</button>
	</div>

	<div id="section63" class="section">
		<h3 id="whatnew"> Milline muu tegevus selle tõttu kannatas? </h3>
		
		<input id="newreason" type="text" value="" size="43px">
		
		<button id="button63" type="button">Fikseeri vastus</button>
	</div>

	<div id="section7" class="section">
		<h3 id="question7"> 7. Kirjelda oma mõtteid ja tundeid ning nende muutumist päeva jooksul. </h3>

		<textarea id="answer7" type="text" rows="4" cols="50" value=""></textarea>
		
		<button id="button7" type="button">Fikseeri vastus</button>
	</div>
	
	<h3 id="end2"> Sa andsid küll täna oma nõrkusele järele, aga püüa vähemalt homme tublim olla!!! </h3>
	
	<button id="send2" type="button" value="">Saada andmed</button>

	</div>
	
</div>

</body>

</html>