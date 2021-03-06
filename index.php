<?php
	require("functions/functions.php");
	
	if(isset($_SESSION["userid"])){
		header("location: main.php");
		exit();
	}

  $signupUserName = "";
	$signupEmail = "";
  $signupType = "";
	$signupPassword = "";
	$repeatPassword ="";

	$userid = "";
	$loginUserName = "";
	$notice = "";
  
  $signupUserNameError = "";
	$signupEmailError = "";
  $signupTypeError = "";
	$signupPasswordError = "";
	
	$loginUserNameError = "";
	//if log in button is set
	if(isset($_POST["loginButton"])){
		if (isset ($_POST["loginUserName"])){
			if (empty ($_POST["loginUserName"])){
				$loginUserNameError ="NB! Ilma selleta ei saa sisse logida!";
			} else {
				$loginUserName = $_POST["loginUserName"];
			}
		}
		if (!empty($loginUserName) and !empty ($_POST["loginPassword"])){
			$notice = signIn($loginUserName, $_POST["loginPassword"]);
		}
		if (($loginUserName) == "admin" and ($_POST["loginPassword"]) == "statistika"){
			header("location: statistics.php");
			exit ();
		}
	}//end on login button
	//if signup button is set
	if (isset($_POST["signupButton"])){
		
		if (isset($_POST["signupUserName"])){
			if (empty($_POST["signupUserName"])){
				$signupUserNameError ="NB! Väli on kohustuslik!";
			} else {
				$signupUserName = test_input($_POST["signupUserName"]);
			}
		}
		if (isset ($_POST["signupEmail"])){
			if (empty ($_POST["signupEmail"])){
				$signupEmailError ="NB! Väli on kohustuslik!";
			} else {
				$signupEmail = test_input($_POST["signupEmail"]);
				$signupEmail = filter_var($signupEmail, FILTER_SANITIZE_EMAIL);
				$signupEmail = filter_var($signupEmail, FILTER_VALIDATE_EMAIL);
			}
		}
    if (isset ($_POST["signupType"])){
      if (empty ($_POST["signupType"])){
        $signupTypeError ="NB! Väli on kohustuslik!";
      } else {
        $signupType = test_input($_POST["signupType"]);
      }
    }
		if (isset ($_POST["signupPassword"])){
			if (empty ($_POST["signupPassword"])){
				$signupPasswordError = "NB! Väli on kohustuslik!";
			} else {
				if (strlen($_POST["signupPassword"]) < 8){
					$signupPasswordError = "NB! Liiga lühike salasõna, vaja vähemalt 8 tähemärki!";
				}
			}
		}		
			//inserting to DB
		if(empty($signupUserNameError) and empty($signupFirstNameError) and empty($signupFamilyNameError) and empty($signupTypeError) and empty($signupPasswordError)) {
			$signupPassword = hash("sha512", $_POST["signupPassword"]);
			$signupEmail = hash("sha512", $_POST["signupEmail"]);
			signUp($signupUserName, $signupEmail, $signupType, $signupPassword);
		}
	} //end of signup button
	
	//if recovery button is set
	if(isset($_POST["recoveryButton"])){
		if (isset ($_POST["loginUserName"])){
			if (empty ($_POST["loginUserName"])){
				$loginUserNameError ="NB! Ilma selleta ei saa sisse logida!";
			} else {
				$loginUserName = $_POST["loginUserName"];
			}
		}
		if (!empty($loginUserName) and !empty ($_POST["loginEmail"])){
			$hash = hash("sha512", $_POST["loginEmail"]);
			$notice=recoverAccount($loginUserName, $hash);
			
		}
	}	

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script>
		var check = function() {
		if (document.getElementById('signupPassword').value ==
			document.getElementById('repeatPassword').value) {
			document.getElementById('message').style.color = 'green';
			document.getElementById('message').innerHTML = 'Salasõna korratud';
		} else {
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'Salasõna erinev';
		}
	}
	</script>
	<title>HMS</title>
</head>
<body>
<nav class="menu">
	<ul class="menu-list">
		<li class="menu-item menu-link active-menu" onclick="document.getElementById('id01').style.display='block'">Logi sisse</li>
		<li class="menu-item menu-link" onclick="document.getElementById('id02').style.display='block'">Registreeri</li>
		<li class="menu-item menu-link" onclick="document.getElementById('id03').style.display='block'">Taasta konto</li>
		<span style="color:red; font-size:20px; padding-top:20px;"><?php echo $notice; ?></span>
	</ul>
</nav>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <div class="container">
      <label for="loginUserName"><b>Kasutajanimi</b></label>
      <input type="text" class="longInput" placeholder="Sisesta kasutajanimi" name="loginUserName" value="<?php echo $loginUserName; ?>" required>

      <label for="loginPassword"><b>Salasõna</b></label>
      <input type="password" class="longInput" placeholder="Sisesta salasõna" name="loginPassword" required>
        
      <button type="submit" name="loginButton">Logi sisse</button> 
      
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Tühista</button>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <div class="container">
      <h3>Palun täida allolevad lahtrid, et end kasutajaks registreerida.</h3>
      <hr>
      <label for="signupUserName"><b>Kasutajanimi</b></label>
      <input type="text" class="longInput" placeholder="Kirjuta kasutajanimi" name="signupUserName" value="<?php echo $signupUserName; ?>" required>
			<span><?php echo $signupUserNameError; ?></span>

      <label for="signupEmail"><b>E-mail</b></label>
		  <input name="signupEmail" class="longInput" placeholder="Kirjuta oma e-maili aadress" type="email" value="<?php echo $signupEmail; ?>" required>
		  <span><?php echo $signupEmailError; ?></span>
		  
      <label for="signupPassword"><b>Salasõna</b></label>
      <input type="password" class="longInput" placeholder="Kirjuta salasõna" name="signupPassword" id="signupPassword"  minlength="8" value="<?php echo $signupPassword; ?>"required>
			<span><?php echo $signupPasswordError; ?></span>
			
			<label for="repeatPassword"><b>Korda salasõna</b></label>
      <input type="password" class="longInput" placeholder="Korda salasõna" name="repeatPassword" id="repeatPassword" onkeyup='check();' minlength="8" value="<?php echo $repeatPassword; ?>"required>
			
			<span id='message'></span>
      
			<br><hr>
        <input type="checkbox" name="statistika" class="statistics" required>Olen teadlik, et minu poolt sisestatud andmeid kasutatakse üldistatud kujul statistika tegemiseks.
      </label>
      <br><hr>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Tühista</button>
        <button type="submit" class="signupbtn" name="signupButton">Registreeri kasutajaks</button>
      </div>
    </div>
  </form>
</div>

<div id="id03" class="modal">
  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <div class="container">
		<h3>Konto taastamiseks sisesta oma kasutajanimi ja registreerimisel sisestatud e-maili aadress.</h3>
      <label for="loginUserName"><b>Kasutajanimi</b></label>
      <input type="text" class="longInput" placeholder="Sisesta kasutajanimi" name="loginUserName" value="<?php echo $loginUserName; ?>" required>

      <label for="loginEmail"><b>Email</b></label>
      <input type="email" class="longInput" placeholder="Sisesta oma e-maili aadress" name="loginEmail" required>
        
      <button type="submit" name="recoveryButton">Taasta konto</button> 
      
			
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Tühista</button>
      
    </div>
  </form>
</div>


<div id="page" class="main-grid">
	<div class=" heading">
		<h2>Tere tulemast eneseseire keskkonda</h2>
		<h3>Siin on teil võimalus jälgida oma igapäevast sõltuvuskäitumist täites selleks igapäevaselt päevikut.</h3>
		<h3>Registreeri, logi sisse ja alusta päeviku pidamisega</h3>
	</div>
    <div id="item1" class="grid-item item1">
		<h2>Hasartmängusõltuvus</h2>
      <p>Lühike info <b>hasartmängusõltuvuse</b> kohta
        Hasartmängusõltuvus on sõltuvushäire, mille põhiliseks tunnuseks on võimetus vastu seista tungile mängida hasartmänge. 
        Selle tagajärjel kogeb inimene probleeme sotsiaalses, tööalases ja/või materiaalses toimetulekus, suhetes ja kohustuste täitmises.
				
		</div>
		<div id="item1a" class="grid-item item1a">
			<button onclick="window.location.href='http://15410.ee/avaleht.php?c=27&h=111&a=144'">Loe lisaks </button>
			<button onclick="window.location.href='http://15410.ee/?t=test'">Tee test</button></p>
		</div>
		
    <div id="item2" class="grid-item item2">
		<h2>Arvutisõltuvus</h2>
    <p>Lühike info <b>digisõltuvuse</b> kohta
        Terve vs ebaterve, ülemäärase, patoloogilise, sõltuvusliku jne. arvutikasutamise vaheline piir läheb sealt, kus inimene hakkab seoses arvutikasutamisega eemalduma suhetest, töö või muud olulised eluvaldkonnad kannatavad ja tegevus arvutis saab kõikehõlmavaks teiste tegevuste ees.
		</div>
		<div id="item2a" class="grid-item item2a">
			<button onclick="window.location.href='http://15410.ee/avaleht.php?c=27&h=127&a=111'">Loe lisaks</button>
			<button onclick="window.location.href='http://15410.ee/?t=test2'">Tee test</button></p>
		</div>
		
</div>


</body>
</html>
