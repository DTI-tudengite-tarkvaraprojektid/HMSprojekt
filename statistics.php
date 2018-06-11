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

<select id='idchoice'>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
</select>

<button id="sendId" type="button" onclick="sendId()">Fikseeri ID</button><br>

Vali kuupäev:

<select id='date'>
	<option value="2018-06-10">2018-06-10</option>
	<option value="2018-06-11">2018-06-11</option>
</select>

<button id="sendDate" type="button" onclick="sendDate()">Fikseeri ID</button><br>

<p id="diaryAnswers"></p>

<button id="diaryEntry" type="button" onclick="diaryEntry()">Uuenda</button>

</body>
</html>