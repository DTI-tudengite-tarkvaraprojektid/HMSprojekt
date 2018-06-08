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
	
	function signUp($signupUserName, $signupFirstName, $signupFamilyName, $signupType, $signupPassword){
	//loome andmebaasiühenduse
		$database = "if17_HMS";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistame ette käsu andmebaasiserverile
		$stmt = $mysqli->prepare("INSERT INTO userinfo (username, firstname, lastname, type, password) VALUES (?, ?, ?, ?, ?)");
		echo $mysqli->error;
		//s - string
		//i - integer
		//d - decimal
		$stmt->bind_param("sssis", $signupUserName, $signupFirstName, $signupFamilyName, $signupType, $signupPassword);
		//$stmt->execute();
		if ($stmt->execute()){
			echo "\n Õnnestus!";
		} else {
			echo "\n Tekkis viga : " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
		
	}
		
	function signIn($username, $password){
			$notice = "";
			$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
			$stmt = $mysqli->prepare("SELECT username, firstname, lastname, type, password FROM userinfo WHERE username = ?");
			$stmt->bind_param("s",$username);
			$stmt->bind_result($usernameFromDb, $firstnameFromDb, $lastnameFromDb, $typeFromDB, $passwordFromDb);
			$stmt->execute();
			
			//kui vähemalt 1 tulemus
			if ($stmt->fetch()){
				$hash = hash("sha512", $password);
				if($hash == $passwordFromDb){
				$notice = "Sisse logitud";
				
				$_SESSION["username"] = $username;
				$_SESSION["firstname"] = $firstnameFromDb;
				$_SESSION["lastname"] = $lastnameFromDb;
				$_SESSION["usertype"] = $typeFromDb;
				
				//lähen pealehele
				header("location: main.php");
				exit ();
				
				} else {
				$notice = "Vale salasõna";	
				}	
			} else {
			$notice = "Sellise e-postiga kasutajat ei ole";	
			}
	
		$stmt->close();
		$mysqli->close();
		return $notice;
	}
	
	
?>