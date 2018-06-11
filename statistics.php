<?php
require("../../../../config.php");
//require("entrys.php");
//require("userscount.php");
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

<button id="entrys1" type="button" onclick="entrys()">Fikseeri</button>

<p> Kasutajate arv lehel: </p>
<p id="usersCount"></p>
<button id="usersCount1" type="button" onclick="usersCount()">Fikseeri</button>

</body>
</html>