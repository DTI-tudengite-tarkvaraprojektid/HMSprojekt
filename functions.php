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

function deleteAccount($userid){
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("UPDATE userinfo SET status= 1 WHERE id= $userid");
	if ($stmt->execute()){
		echo "\n Õnnestus!";
		header("location: index.php");
	} else {
		echo "\n Tekkis viga : " .$stmt->error;
	}
	$stmt->close();
	$mysqli->close();
	
}
	
	
?>