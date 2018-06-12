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
<body>

<p> Sissekannete arv lehel: </p>
<p id="entrys"></p>

<button id="entrys1" type="button" onclick="entrys()">Uuenda</button>

<p> Kasutajate arv lehel: </p>
<p id="usersCount"></p>
<button id="usersCount1" type="button" onclick="usersCount()">Uuenda</button>

<p> Päeviku sissekanne: </p>

Vali id:

<select id="idchoice">
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
</select>

Vali kuupäev:

<select id="date">
	<option value="2018-06-10">2018-06-10</option>
	<option value="2018-06-11">2018-06-11</option>
	<option value="2018-06-12">2018-06-12</option>
</select>

<p id="diaryAnswers"></p>

<button id="diaryEntry" type="button">Uuenda</button>

<p> Keskmise arvutamine: </p>

Vali küsimus:

<select id="answerNr">
	<option value="0">1. Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all?</option>
	<option value="1">2. Kui tugevalt hindan meelistegevust sooritada täna?</option>
	<option value="2">3. Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista?</option>
</select>

</body>
</html>