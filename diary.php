<?php
require("../../../../config.php");
require("functions.php");
$reasons = array("Töökohustused", "Suhted lähedastega", "Suhted sõpradega", "Koolitöö", "Välimuse eest hoolitsemine", "Lemmiklooma eest hoolitsemine", "Midagi muud");
$ID = $_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA_Compatible" content="ie=edge">
	<title>Küsimuste puu</title>
	<script src="tree.js"></script>
	<link rel="stylesheet" type="text/css" href="disain.css">	
</head>


	
<body>

<div id="sections">

	<div id="section1">
		<p id="question1"> 1. Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all? </p>

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
		
		<button id="button1" type="button" onclick="button1()">Fikseeri vastus</button>
	</div>
	
	<div id="start">

	<div id="section2">
		<p id="question2"> 2. Kui tugevalt hindan meelistegevust sooritada täna? </p>

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

		<button id="button2" type="button" onclick="button2()">Fikseeri vastus</button> 
	</div>

	<div id="section3">
		<p id="question3"> 3. Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista? </p>
			
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
		
		<button id="button3" type="button" onclick="button3()">Fikseeri vastus</button>
	</div>

	<div id="section4">
		<p id="question4"> 4. Kas ma täna sooritasin oma meelistegevust? </p>
			
		<input type="radio" id="answer41" name="answer4"  value="0">
			
		<p id="option41"> Jah </p>
			
		<input type="radio" id="answer42" name="answer4" value="1">
			
		<p id="option42"> Ei </p>
		<button id="button4" type="button" onclick="button4()">Fikseeri vastus</button>
	</div>
	
	<p id="end1"> Sa olid täna väga tubli, jätka samas vaimus!!! </p>
	
	<input id="send1" type="button" value="Saada andmed" onclick="send1()" />

	<div id="section5">
		<p id="question5"> 5. Kui palju aega (tunde ja minuteid) ma seda tegevust sooritades veetsin? </p>
	 
		<p id="answer5start"> Ma kulutasin selle tegevuse peale aega </p>
		
		<input id="hours" type="number" min="0" max="24" value="0">
	   
		<p id="answer5center"> tundi ja </p>
			
		<input id="minutes" type="number" min="0" max="59" value="0">
		
		<p  id="answer5end"> minutit. </p>
		
		<button id="button5" type="button" onclick="button5()">Fikseeri vastus</button>
	</div>
	
	<div id="section61">
		<p id="question6"> 6. Kas mul jäi selle tegevuse tõttu muud tegevused sooritamata või ma ei jõudnud neid õigeaegselt valmis? 
			Kui jah, siis millised muud tegevused seetõttu kannatasid? </p>

		<input type="radio" id="answer61" name="answer6"  value="0">
		
		<p id="option61"> Jah </p>
		
		<input type="radio" id="answer62" name="answer6" value="1">
		
		<p id="option62"> Ei </p>
		
		<button id="button6" type="button" onclick="button61()">Fikseeri vastus</button>
	</div>
		
	<div id="section62">
		<p id="what"> Millised tegevused kannatasid? </p>
		
		<?php 
			echo "<select id='reasons'>";
			for ($i = 0; $i < count($reasons); $i++) {
				echo '<option value="' .$reasons[$i] .'">'.$reasons[$i] ."</option>";
			}
			echo "</select>";
		?>
			
		<button id="button8" type="button" onclick="button62()">Fikseeri vastus</button>
	</div>

	<div id="section63">
		<p id="whatnew"> Milline muu tegevus selle tõttu kannatas? </p>
		
		<input id="newreason" type="text" value="" size="43px">
		
		<button id="button9" type="button" onclick="button63()">Fikseeri vastus</button>
	</div>

	<div id="section7">
		<p id="question7"> 7. Kirjelda oma mõtteid ja tundeid ning nende muutumist päeva jooksul. </p>

		<input id="answer7" type="text" size="70px" value="">
		
		<button id="button7" type="button" onclick="button7()">Fikseeri vastus</button>
	</div>
	
	<p id="end2"> Sa andsid küll täna oma nõrkusele järele, aga püüa vähemalt homme tublim olla!!! </p>
	
	<input id="send2" type="button" value="Saada andmed" onclick="send2()" />

	</div>
	
</div>

</body>

</html>