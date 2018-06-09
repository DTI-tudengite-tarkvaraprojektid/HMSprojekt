<?php
	require("functions.php");
	
	//kui on juba sisse loginud
	if(isset($_SESSION["userid"])){
		header("location: main.php");
		exit();
	}

  $signupUserName = "";
	$signupFirstName = "";
  $signupFamilyName = "";
  $signupType = "";
	$signupPassword = "";

	$userid = "";
	$loginUserName = "";
	$notice = "";
  
  $signupUserNameError = "";
	$signupFirstNameError = "";
  $signupFamilyNameError = "";
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
		//kontrollime, kas kirjutati eesnimi
		if (isset($_POST["signupFirstName"])){
			if (empty($_POST["signupFirstName"])){
				$signupFirstNameError ="NB! Väli on kohustuslik!";
			} else {
				$signupFirstName = test_input($_POST["signupFirstName"]);
			}
		}
		
		//kontrollime, kas kirjutati perekonnanimi
		if (isset ($_POST["signupFamilyName"])){
			if (empty ($_POST["signupFamilyName"])){
				$signupFamilyNameError ="NB! Väli on kohustuslik!";
			} else {
				$signupFamilyName = test_input($_POST["signupFamilyName"]);
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
			signUp($signupUserName, $signupFirstName, $signupFamilyName, $signupType, $signupPassword);
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

<h2>Mängusõltuvuse eneseseire keskkond</h2>

<button onclick="document.getElementById('id01').style.display='block'" class="btn" >Logi sisse</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <div class="container">
      <label for="loginUserName"><b>Kasutajanimi</b></label>
      <input type="text" placeholder="Sisesta kasutajanimi" name="loginUserName" value="<?php echo $loginUserName; ?>" required>

      <label for="loginPassword"><b>Salasõna</b></label>
      <input type="password" placeholder="Sisesta salasõna" name="loginPassword" required>
        
      <button type="submit" name="loginButton">Logi sisse</button> <span><?php echo $notice; ?></span>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Jäta mind meelde
      </label>
    
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Tühista</button>
      
    </div>
  </form>
</div>

<button onclick="document.getElementById('id02').style.display='block'" class="btn">Registreeri</button>

<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <div class="container">
      <h1>Registreeri</h1>
      <p>Palun täida allolevad lahtrid, et end kasutajaks registreerida.</p>
      <hr>
      <label for="signupUserName"><b>Kasutajanimi</b></label>
      <input type="text" placeholder="Kirjuta kasutajanimi" name="signupUserName" value="<?php echo $signupUserName; ?>" required>
			<span><?php echo $signupUserNameError; ?></span>

      <label for="signupFirstName"><b>Eesnimi</b></label>
		  <input name="signupFirstName" placeholder="Kirjuta oma eesnimi" type="text" value="<?php echo $signupFirstName; ?>" required>
		  <span><?php echo $signupFirstNameError; ?></span>
		  <br>
		  <label for="signupFamilyName"><b>Perekonnanimi</b></label>
		  <input name="signupFamilyName" placeholder="Kirjuta oma perekonnanimi" type="text" value="<?php echo $signupFamilyName; ?>" required>
		  <span><?php echo $signupFamilyNameError; ?></span>
		  <br>
      <label for="signupPassword"><b>Salasõna</b></label>
      <input type="password" placeholder="Kirjuta salasõna" name="signupPassword" minlength="8" value="<?php echo $signupPassword; ?>"required>
      <span><?php echo $signupPasswordError; ?></span>
      
			<label for="signupType"><b>Sõltuvuse tüüp</b></label><br><br>
      <input type="radio" name="signupType" value="1" <?php if ($signupType == '1') {echo 'checked';} ?> required><label>Hasartmängusõltuvus</label>
      <input type="radio" name="signupType" value="2" <?php if ($signupType == '2') {echo 'checked';} ?>><label>Arvutisõltuvus</label>
      <br><span><?php echo $signupTypeError; ?></span><br>
      
			<br><hr><br>
        <input type="checkbox" name="statistika" class="statistics" required>Olen teadlik, et minu poolt sisestatud andmeid kasutatakse üldistatud kujul statistika tegemiseks.
      </label>
      <br><br><hr>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Tühista</button>
        <button type="submit" class="signupbtn" name="signupButton">Registreeri kasutajaks</button>
      </div>
    </div>
  </form>
</div>


<div id="page" class="main-grid">
    <div id="item1" class="grid-item item1">
      <p>Lühike info <b>hasartmängusõltuvuse</b> kohta
        Hasartmängusõltuvus on sõltuvushäire, mille põhiliseks tunnuseks on võimetus vastu seista tungile mängida hasartmänge. 
        Selle tagajärjel kogeb inimene probleeme sotsiaalses, tööalases ja/või materiaalses toimetulekus, suhetes ja kohustuste täitmises.
        <hr> <a href="http://15410.ee/?t=test">Hasartmängusõltuvuse test</a>
        <hr> <a href="http://15410.ee/avaleht.php?c=27&h=111&a=195">Loe lisaks </a></p>
    </div>
    <div id="item2" class="grid-item item2">
    <p>Lühike info <b>digisõltuvuse</b> kohta
        Terve vs ebaterve, ülemäärase, patoloogilise, sõltuvusliku jne. arvutikasutamise vaheline piir läheb sealt, kus inimene hakkab seoses arvutikasutamisega eemalduma suhetest, töö või muud olulised eluvaldkonnad kannatavad ja tegevus arvutis saab kõikehõlmavaks teiste tegevuste ees.
        <hr> <a href="http://15410.ee/?t=test2">Digisõltuvuse test</a>
        <hr> <a href="http://15410.ee/avaleht.php?c=27&h=127&a=111">Loe lisaks</a></p>
    </div>
  </div>


</body>
</html>
