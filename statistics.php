<?php
require("../../../../config.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="statistics.js" defer></script>
<!--<base target="_blank">-->
<title>HMS</title>
</head>
<body onload="starter()">

<p> Sissekannete arv kokku: </p>
<p id="entrys"></p>

<button id="entrys1" type="button">Uuenda</button>

<p> Kasutajate arv lehel: </p>
<p id="usersCount"></p>
<button id="usersCount1" type="button">Uuenda</button>

<p> Päeviku sissekanne: </p>

Vali id:

<select id="idchoice">
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="33">33</option>
</select>

Vali kuupäev:

<select id="date">
	<option value="2018-06-12">2018-06-12</option>
	<option value="2018-06-13">2018-06-13</option>
</select>

<p id="diaryAnswers"></p>

<button id="diaryEntry" type="button">Uuenda</button>

<p> Keskmise arvutamine: </p>

Vali küsimus:

<select id="answerNr1">
	<option value="0">1. Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all?</option>
	<option value="1">2. Kui tugevalt hindan meelistegevust sooritada täna?</option>
	<option value="2">3. Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista?</option>
</select><br>

Vali id:

<select id="idchoice2">
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="33">33</option>
</select><br><br>

<p id="average"></p>

<button id="sendAverage" type="button">Uuenda</button>

<p> Miinimumi arvutamine: </p>

Vali küsimus:

<select id="answerNr2">
	<option value="0">1. Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all?</option>
	<option value="1">2. Kui tugevalt hindan meelistegevust sooritada täna?</option>
	<option value="2">3. Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista?</option>
</select><br>

Vali id:

<select id="idchoice3">
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="33">33</option>
</select><br><br>

<p id="minimum"></p>

<button id="sendMinimum" type="button">Uuenda</button>

<p> Maksimumi arvutamine: </p>

Vali küsimus:

<select id="answerNr3">
	<option value="0">1. Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all?</option>
	<option value="1">2. Kui tugevalt hindan meelistegevust sooritada täna?</option>
	<option value="2">3. Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista?</option>
</select><br>

Vali id:

<select id="idchoice4">
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="33">33</option>
</select><br><br>

<p id="maximum"></p>

<button id="sendMaximum" type="button">Uuenda</button>

</body>
</html>