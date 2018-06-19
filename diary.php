<?php
require("../../config.php");
require("functions/functions.php");
$reasons = array("Ei kannatanud", "Töökohustused", "Suhted lähedastega", "Suhted sõpradega", 
	"Koolitöö", "Välimuse eest hoolitsemine", "Lemmiklooma eest hoolitsemine");

$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$id = $_SESSION["userid"];
	$result = $mysqli->prepare("SELECT answer61 FROM diary WHERE id=?");
	$result->bind_param("i", $id);
	$result->bind_result($answer61);
	
	$result->execute();
	
	while($result->fetch()){
		if(!in_array($answer61, $reasons)==true && $answer61!=NULL){
			array_push($reasons, $answer61);
		}
	}
	
	array_push($reasons, "Midagi muud");
	
	$result->close();
	$mysqli->close();
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

<button id="goBack" type="button">Tagasi</button>
<h3 id="header"></h3>

<div id="sections" class="sections">

	<div id="section1" class="section">
		<h5 id="question1"> Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all? </h5>

		<label for="answer11"> Üldse mitte </label><input type="radio" id="answer11" name="answer1" value="0" onclick="button1()">

		<label for="answer12"> Vähe </label><input type="radio" id="answer12" name="answer1" value="1" onclick="button1()">

		<label for="answer13"> Keskmiselt </label><input type="radio" id="answer13" name="answer1" value="2" onclick="button1()">

		<label for="answer14"> Vähe </label><input type="radio" id="answer14" name="answer1" value="3" onclick="button1()">

		<label for="answer15"> Täiesti </label><input type="radio" id="answer15" name="answer1" value="4" onclick="button1()">
		
	</div>

	<div id="section2" class="section">
		<h5 id="question2"> Kui tugevalt hindan meelistegevust sooritada täna? </h5>

		<label for="answer21"> Olematu </label><input type="radio" id="answer21" name="answer2" value="0" onclick="button2()">

		<label for="answer22"> Nõrk </label><input type="radio" id="answer22" name="answer2" value="1" onclick="button2()">

		<label for="answer23"> Tavaline </label><input type="radio" id="answer23" name="answer2" value="2" onclick="button2()">

		<label for="answer24"> Kõrge </label><input type="radio" id="answer24" name="answer2" value="3" onclick="button2()">

		<label for="answer25"> Väga kõrge </label><input type="radio" id="answer25" name="answer2" value="4" onclick="button2()">

	</div>

	<div id="section3" class="section">
		<h5 id="question3"> Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista? </h5>
			
		<label for="answer31"> Üldse mitte </label><input type="radio" id="answer31" name="answer3" value="0" onclick="button3()">

		<label for="answer32"> Vähe </label><input type="radio" id="answer32" name="answer3" value="1" onclick="button3()">

		<label for="answer33"> Keskmiselt </label><input type="radio" id="answer33" name="answer3" value="2" onclick="button3()">

		<label for="answer34"> Palju </label><input type="radio" id="answer34" name="answer3" value="3" onclick="button3()">

		<label for="answer35"> Täiesti </label><input type="radio" id="answer35" name="answer3" value="4" onclick="button3()">
		
	</div>

	<div id="section4" class="section">
		<h5 id="question4"> Kas ma täna sooritasin oma meelistegevust? </h5>
			
		<label for="answer41"> Jah </label><input type="radio" id="answer41" name="answer4" value="0" onclick="button4()">
			
		<label for="answer42"> Ei </label><input type="radio" id="answer42" name="answer4" value="1" onclick="button4()">
			
	</div>
	
	
	<div id="section5" class="section">
		<h5 id="question5"> Kui palju aega (tunde ja minuteid) ma seda tegevust sooritades veetsin? </h5>
	 
		<label> Ma kulutasin selle tegevuse peale aega </label><input id="hours" type="number" min="0" max="24" value="0">
	   
		<label> tundi ja </label><input id="minutes" type="number" min="0" max="59" value="0">
		
		<label> minutit. </label>
		
		<br><button class="fixButtons" id="button5" type="button" onclick="button5()">Järgmine küsimus</button>
	</div>
	
	<div id="section61" class="section">
		<h5 id="question61"> Kas mul jäi selle tegevuse tõttu muud tegevused sooritamata või ma ei jõudnud neid õigeaegselt valmis? 
			Kui jah, siis millised muud tegevused seetõttu kannatasid? </h5>

		<?php
		echo '<div class="checkboxQuestion">';
			echo "<div>";
			echo "<input id='".$reasons[0]."' type='checkbox' value='".$reasons[0]."' onclick='goneFunction()'>";
			echo "<label for='".$reasons[0]."'>".$reasons[0]."</label>";
			echo "</div>";
			
			for ($i = 1; $i < count($reasons); $i++) {
				if($i<count($reasons)-1){
					echo "<div>";
					echo "<input id='".$reasons[$i]."' type='checkbox' value='".$reasons[$i]."'>";
					echo "<label for='".$reasons[$i]."'>".$reasons[$i]."</label>";
					echo "</div>";
				}else{
					echo "<div>";
					echo "<input id='".$reasons[$i]."' type='checkbox' value='".$reasons[$i]."'>";
					echo "<label for='".$reasons[$i]."'>".$reasons[$i]."</label>";
					echo "<input id='otherValue' style='width: 15%' type='text' name='other'>";
					echo "</div>";
				}
			}
		echo "</div>";

		?>
			
			<br><button class="fixButtons" id="button61" type="button">Järgmine küsimus</button>
	</div>
	
	<div id="section62" class="section">
	
		<h5 id="question62"> Kui palju sa raha mängimisele kulutasid (välja arvatud võidud)? </h5>
		
		<label> Ma mängisin täna maha </label><input id="money" type="number" min="0" value="">
		<label> eurot. </label>
		
		<br><button class="fixButtons" id="button62" type="button">Järgmine küsimus</button>
			
	</div>

	<div id="section7" class="section">
		<h5 id="question7"> Kirjelda oma mõtteid ja tundeid ning nende muutumist päeva jooksul. </h5>

		<textarea id="answer7" type="text" rows="4" cols="50" value=""></textarea>
		
		<br><button class="fixButtons" id="button7" type="button">Järgmine küsimus</button>
	</div>
	
	<div id="section8" class="section">
		<h5 id="question8"> Vali emotsioon, mis kirjeldab teie olekut kõige ilmekamalt. </h5>

		<label for="answer81"><input type="radio" id="answer81" class="answer81" name="answer1" value="0" onclick="button8()"><img src="images/sadface.png"></label>

		<label for="answer82"><input type="radio" id="answer82" class="answer82" name="answer1" value="1" onclick="button8()"><img src="images/slightlysadface.png"></label>

		<label for="answer83"><input type="radio" id="answer83" class="answer83" name="answer1" value="2" onclick="button8()"><img src="images/mehface.png"></label>

		<label for="answer84"><input type="radio" id="answer84" class="answer84" name="answer1" value="3" onclick="button8()"><img src="images/happyface.png"></label>

		<label for="answer85"><input type="radio" id="answer85" class="answer85" name="answer1" value="4" onclick="button8()"><img src="images/reallyhappyface.png"></label>
		
	</div>
	
	<h5 id="end1"> Tänane sissekanne edukalt tehtud! </h5>
	<h5 id="end2"> Tänane sissekanne edukalt tehtud! </h5>

	<br><button id="send1" type="button" value="<?php echo $_REQUEST["type"]; ?>">Salvesta sissekanne</button>

	<br><button id="send2" type="button" value="<?php echo $_REQUEST['type'] ?>">Salvesta sissekanne</button>

	</div>

</body>

</html>