<?php
require("../../../config.php");
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
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistame ette käsu andmebaasiserverile
		$stmt = $mysqli->prepare("INSERT INTO userinfo (username, email, password) VALUES (?, ?, ?)");
		echo $mysqli->error;
		//s - string
		//i - integer
		//d - decimal
		$stmt->bind_param("sss", $signupUserName, $signupEmail, $signupPassword);
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
			$stmt = $mysqli->prepare("SELECT id, username, password, status FROM userinfo WHERE username = ?");
			$stmt->bind_param("s",$username);
			$stmt->bind_result($id, $usernameFromDb, $passwordFromDb, $statusFromDB);
			$stmt->execute();
			
			//kui vähemalt 1 tulemus
			if ($stmt->fetch()){
				if($statusFromDB === NULL){
					$hash = hash("sha512", $password);
					if($hash === $passwordFromDb){
					$_SESSION["userid"] = $id;
					$_SESSION["username"] = $usernameFromDb;
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
		$notice = "Tere tulemast tagasi! Saad nüüd uuesti sisse logida";
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
		//header("Location: index.php");
		echo "<script>alert('Sinu konto on nüüd kustutatud!');window.location.href='index.php';</script>";
		//$notice = "Sinu konto on nüüd kustutatud!";
	} else {
		echo "\n Tekkis viga : " .$stmt->error;
	}
	$stmt->close();
	$mysqli->close();
	return $notice;
}
/*
function Email($email, $text){
	// Multiple recipients
$to = $email; // note the comma

// Subject
$subject = 'Testmail';

// Message
$message = $text;

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));

}*/

//read all info funktsioon
function readInfo($userid, $type){
	
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	
	$stmt=$mysqli->prepare("SELECT date FROM diary WHERE id = $userid AND type = $type"); 
	
	
	$stmt->bind_result($date);
	$stmt->execute();
	//$stmt->fetch();
	while ($stmt->fetch()){
		echo '<input type="checkbox" id="'.$date.'" name="myInfo" class="diarySelection" value="'.$date.'">'.$date.'<br>';
		
	}
		
	$stmt->close();
	$mysqli->close();
	
}

/*
function answer1Data(){
	
	
}	

function answer2Data(){
	$dates2 = array();
	$values2 = array();
	$id = $_SESSION["userid"];
	
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$result = $mysqli->query("SELECT date, answer2 FROM diary WHERE id=".$id.";");
	
	while($row = $result->fetch_assoc()) {
		array_push($dates2, $row["date"]);
		array_push($values2, $row["answer2"]);
	}

	$mysqli->close();
}	

function answer3Data(){
	$dates3 = array();
	$values3 = array();
	$id = $_SESSION["userid"];
	
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$result = $mysqli->query("SELECT date, answer3 FROM diary WHERE id=".$id.";");
	
	while($row = $result->fetch_assoc()) {
		array_push($dates3, $row["date"]);
		array_push($values3, $row["answer3"]);
	}

	$mysqli->close();
}	

function answer4Data(){
	$dates4 = array();
	$values4 = array();
	$id = $_SESSION["userid"];
	
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$result = $mysqli->query("SELECT date, answer4 FROM diary WHERE id=".$id.";");
	
	while($row = $result->fetch_assoc()) {
		array_push($dates4, $row["date"]);
		array_push($values4, $row["answer4"]);
	}

	$mysqli->close();
}	

function answer5Data(){
	$dates5 = array();
	$values5 = array();
	$id = $_SESSION["userid"];
	
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$result = $mysqli->query("SELECT date, answer5 FROM diary WHERE id=".$id.";");
	
	while($row = $result->fetch_assoc()) {
		array_push($dates5, $row["date"]);
		if($row["answer5"]!=NULL){
			array_push($values5, $row["answer5"]);
		}else{
			array_push($values5, 0);
		}
	}
	
	for($i=0; $i<sizeof($dates5); $i++){
		echo $dates5[$i]."<br>";
	}
	
	for($i=0; $i<sizeof($values5); $i++){
		echo $values5[$i]."<br>";
	}

	$mysqli->close();
}	

function answer6Data(){
	$dates6 = array();
	$values6 = array();
	$id = $_SESSION["userid"];
	
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$result = $mysqli->query("SELECT date, answer6 FROM diary WHERE id=".$id.";");
	
	while($row = $result->fetch_assoc()) {
		array_push($dates6, $row["date"]);
		if($row["answer6"]!=NULL){
			array_push($values6, $row["answer6"]);
		}else{
			array_push($values5, "Ei mänginud");
		}
	}
	
	for($i=0; $i<sizeof($dates5); $i++){
		echo $dates5[$i]."<br>";
	}
	
	for($i=0; $i<sizeof($values5); $i++){
		echo $values5[$i]."<br>";
	}

	$mysqli->close();
}	
*/

?>