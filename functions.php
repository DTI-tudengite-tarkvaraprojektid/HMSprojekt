<?php
require("../../../../config.php");
$database = "if17_HMS";
//alustame sessiooni
session_start();

	


//sisestuse kontrollimise funktsioon
function test_input ($data){ //funktsiooni tegemine, esitatud andmete kontroll
			$data = trim($data); //eemaldab liigsed tühikud, TAB reavahetused jne.
			$data = stripslashes ($data); //eemaldab kaldkriipsud "\"
			$data = htmlspecialchars ($data); 
			return $data;
	}
	
	function signUp($signupUserName, $signupEmail, $signupType, $signupPassword){
	//loome andmebaasiühenduse
		$database = "if17_HMS";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistame ette käsu andmebaasiserverile
		$stmt = $mysqli->prepare("INSERT INTO userinfo (username, email, type, password) VALUES (?, ?, ?, ?)");
		echo $mysqli->error;
		//s - string
		//i - integer
		//d - decimal
		$stmt->bind_param("ssis", $signupUserName, $signupEmail, $signupType, $signupPassword);
		//$stmt->execute();
		if ($stmt->execute()){
			$notice = signIn($signupUserName, $_POST["signupPassword"]);
			exit ();
		} else {
			echo "\n Tekkis viga : " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
		
	}
		
	function signIn($username, $password){
			$notice = "";
			$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
			$stmt = $mysqli->prepare("SELECT id, username, email, type, password, status FROM userinfo WHERE username = ?");
			$stmt->bind_param("s",$username);
			$stmt->bind_result($id, $usernameFromDb, $emailFromDb, $typeFromDB, $passwordFromDb, $statusFromDB);
			$stmt->execute();
			
			//kui vähemalt 1 tulemus
			if ($stmt->fetch()){
				if($statusFromDB == NULL){
					$hash = hash("sha512", $password);
					if($hash == $passwordFromDb){
					
					$_SESSION["userid"] = $id;
					$_SESSION["username"] = $usernameFromDb;
					$_SESSION["usertype"] = $typeFromDb;
					
					//lähen pealehele
					header("location: main.php");
					exit ();
				
				} else {
				$notice = "Vale salasõna";	
				}	
			} else {
			$notice = "Sellise kasutajanimega kasutajat ei ole";	
			}
		}
		$stmt->close();
		$mysqli->close();
		return $notice;
	}

function recoverAccount($username, $email){
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("UPDATE userinfo SET status= NULL WHERE email= '$email'");
	if ($stmt->execute()){
		header("location: index.php");
		$notice = "Teretulemast tagasi! Saad nüüd uuesti sisse logida";
	} else {
		$notice= " Tekkis viga : " .$stmt->error;
	}
	$stmt->close();
	$mysqli->close();
	return $notice;
	}

function deleteAccount($userid){
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("UPDATE userinfo SET status= 1 WHERE id= $userid");
	if ($stmt->execute()){
		session_destroy();
		header("Location: index.php");
		$notice = "Sinu konto on nüüd kustutatud!";
	} else {
		echo "\n Tekkis viga : " .$stmt->error;
	}
	$stmt->close();
	$mysqli->close();
	return $notice;
}

function Email($username){
	// Multiple recipients
$to = 'julimai@tlu.ee'; // note the comma

// Subject
$subject = 'Testmail';

// Message
$message = '
<html>
<head>
  <title>Katse email arendatavalt lehelt</title>
</head>
<body>
  <p>$username</p>
  <p>Siin saab kuvada HTMLina igast asju</p>
  <table>
    <tr>
      <th>Isegi</th><th>mingi</th><th>tabeli</th><th>kujul</th>
    </tr>
    <tr>
      <td>tabelisse</td><td>saab</td><td>asju</td><td>panna</td>
    </tr>
    <tr>
      <td>kohe</td><td>mitu</td><td>mitu</td><td>rida</td>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';



// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));

}

//read all info funktsioon
function readInfo($userid){
	
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	
	$stmt=$mysqli->prepare("SELECT date FROM diary WHERE id = $userid"); 
	
	
	$stmt->bind_result($date);
	$stmt->execute();
	//$stmt->fetch();
	while ($stmt->fetch()){
		echo $date."<br>";
	}
		
	$stmt->close();
	$mysqli->close();
	
	
}

?>