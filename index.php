<?php
	require("functions.php");
	
	//kui on juba sisse loginud
	if(isset($_SESSION["userid"])){
		header("location: main.php");
		exit();
	}

  $signupUserName = "";
	$signupEmail = "";
  $signupType = "";
	$signupPassword = "";

	$userid = "";
	$loginUserName = "";
	$notice = "";
  
  $signupUserNameError = "";
	$signupEmailError = "";
  $signupTypeError = "";
	$signupPasswordError = "";
	
	$loginUserNameError = "";
	
	if(isset($_POST["loginButton"])){
		//kas on kasutajanimi sisestatud
		if (isset ($_POST["loginUserName"])){
			if (empty ($_POST["loginUserName"])){
				$loginUserNameError ="NB! Ilma selleta ei saa sisse logida!";
			} else {
				$loginUserName = $_POST["loginUserName"];
			}
		}
		if (!empty($loginUserName) and !empty ($_POST["loginPassword"])){
			//echo "Alustan sisselogimist";
			//$hash = hash("sha512", $_POST["loginPassword"]);
			$notice = signIn($loginUserName, $_POST["loginPassword"]);
			//$notice = signIn($loginEmail, $hash);
		}
		if (($loginUserName) == "admin" and ($_POST["loginPassword"]) == "statistika"){
			header("location: statistics.php");
			exit ();
		}
	}
	//kas klikiti kasutaja loomise nupul
	if (isset($_POST["signupButton"])){
			
		//kontrollime, kas kirjutati kasutajanimi
		if (isset($_POST["signupUserName"])){
			if (empty($_POST["signupUserName"])){
				$signupUserNameError ="NB! Väli on kohustuslik!";
			} else {
				$signupUserName = test_input($_POST["signupUserName"]);
				echo "sisestatud nimi on" .$signupUserName;
			}
		}
		//kontrollime, kas kirjutati kasutajanimeks email
		if (isset ($_POST["signupEmail"])){
			if (empty ($_POST["signupEmail"])){
				$signupEmailError ="NB! Väli on kohustuslik!";
			} else {
				$signupEmail = test_input($_POST["signupEmail"]);
				
				$signupEmail = filter_var($signupEmail, FILTER_SANITIZE_EMAIL);
				$signupEmail = filter_var($signupEmail, FILTER_VALIDATE_EMAIL);
				
			}
		}
		
    //kontrollime, kas kirjutati tyyp
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
				//polnud tühi
				if (strlen($_POST["signupPassword"]) < 8){
					$signupPasswordError = "NB! Liiga lühike salasõna, vaja vähemalt 8 tähemärki!";
				}
			}
		}
				
			//Kirjutan uue kasutaja andmebaasi
		if(empty($signupUserNameError) and empty($signupFirstNameError) and empty($signupFamilyNameError) and empty($signupTypeError) and empty($signupPasswordError)) {
			echo ("Hakkan salvestama");
			$signupPassword = hash("sha512", $_POST["signupPassword"]);
			//echo $signupPassword;
			signUp($signupUserName, $signupEmail, $signupType, $signupPassword);
		}
	} //kas vajutati loo kasutaja nuppu
	
	
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<!--<base target="_blank">-->
<title>HMS</title>
</head>
<body>
<nav class="menu">
	<ul class="menu-list">
		<li class="menu-item menu-link active-menu" onclick="document.getElementById('id01').style.display='block'">Logi sisse</li>
		<li class="menu-item menu-link" onclick="document.getElementById('id02').style.display='block'">Registreeri</li>
		<span style="color:red; text-align:center"><?php echo $notice; ?></span>
	</ul>
</nav>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <div class="container">
      <label for="loginUserName"><b>Kasutajanimi</b></label>
      <input type="text" placeholder="Sisesta kasutajanimi" name="loginUserName" value="<?php echo $loginUserName; ?>" required>

      <label for="loginPassword"><b>Salasõna</b></label>
      <input type="password" placeholder="Sisesta salasõna" name="loginPassword" required>
        
      <button type="submit" name="loginButton">Logi sisse</button> 
      
			
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Tühista</button>
      
    </div>
  </form>
</div>



<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <div class="container">
      <h2>Palun täida allolevad lahtrid, et end kasutajaks registreerida.</h2>
      <hr>
      <label for="signupUserName"><b>Kasutajanimi</b></label>
      <input type="text" placeholder="Kirjuta kasutajanimi" name="signupUserName" value="<?php echo $signupUserName; ?>" required>
			<span><?php echo $signupUserNameError; ?></span>

      <label for="signupEmail"><b>E-mail</b></label>
		  <input name="signupEmail" placeholder="Kirjuta oma e-maili aadress" type="email" value="<?php echo $signupEmail; ?>" required>
		  <span><?php echo $signupEmailError; ?></span>
		  
      <label for="signupPassword"><b>Salasõna</b></label>
      <input type="password" placeholder="Kirjuta salasõna" name="signupPassword" minlength="8" value="<?php echo $signupPassword; ?>"required>
      <span><?php echo $signupPasswordError; ?></span>
      
			<label for="signupType"><b>Vali oma mure</b></label>
      <input type="radio" name="signupType" value="1" <?php if ($signupType == '1') {echo 'checked';} ?> required><label>Hasartmängusõltuvus</label>
      <input type="radio" name="signupType" value="2" <?php if ($signupType == '2') {echo 'checked';} ?>><label>Arvutisõltuvus</label>
      <span><?php echo $signupTypeError; ?></span>
      
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


<div id="page" class="main-grid">
	<h2>Mängusõltuvuse eneseseire keskkond</h2>
    <div id="item1" class="grid-item item1">
		<h2>Hasartmängusõltuvus</h2>
      <p>Lühike info <b>hasartmängusõltuvuse</b> kohta
        Hasartmängusõltuvus on sõltuvushäire, mille põhiliseks tunnuseks on võimetus vastu seista tungile mängida hasartmänge. 
        Selle tagajärjel kogeb inimene probleeme sotsiaalses, tööalases ja/või materiaalses toimetulekus, suhetes ja kohustuste täitmises.
				<hr>
				<button onclick="window.location.href='http://15410.ee/avaleht.php?c=27&h=111&a=144'">Loe lisaks </button>
				<button onclick="window.location.href='http://15410.ee/?t=test'">Tee test</button></p>
    </div>
    <div id="item2" class="grid-item item2">
		<h2>Arvutisõltuvus</h2>
    <p>Lühike info <b>digisõltuvuse</b> kohta
        Terve vs ebaterve, ülemäärase, patoloogilise, sõltuvusliku jne. arvutikasutamise vaheline piir läheb sealt, kus inimene hakkab seoses arvutikasutamisega eemalduma suhetest, töö või muud olulised eluvaldkonnad kannatavad ja tegevus arvutis saab kõikehõlmavaks teiste tegevuste ees.
				<hr> 
				<button onclick="window.location.href='http://15410.ee/avaleht.php?c=27&h=127&a=111'">Loe lisaks</button>
				<button onclick="window.location.href='http://15410.ee/?t=test2'">Tee test</button></p>
    </div>
  </div>


</body>
</html>
