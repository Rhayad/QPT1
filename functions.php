<?php

/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

	session_start();
		
	//allgemeine Datumsfunktion, die sowohl f�r die Merkliste, als auch f�r den Warenkorb. Die Variable "Zufall" wird sp�ter ben�tigt um die richtigen zu l�schenden 
	//Artikel vom Warenkorb zufinden. Da sie durch die Datenbank keine eindeutige ID bekommen wie bei der Merkliste wird ein Zufallswert im Artikelarray gespeichert, nach dem 
	//gezielt gesucht werden kann.
	
	$date = getdate();
	$datum = $date[mday].'.'.$date[mon].'.'.$date[year];
	$_SESSION['datum'] = $datum;
	$_SESSION['zufall'] = $date[0];
    
    include "config.php";
	
	//Datenbankerstellung

    if( ! $DB_NAME ) die('please create config.php, define $DB_NAME, $DB_USER, $DB_PASS there');

    $dbh = new PDO("mysql:host=localhost;dbname=$DB_NAME", $DB_USER, $DB_PASS);

    $dbh->exec('SET CHARACTER SET utf8'); 
    
	//�berpr�fung ob ein Username schon vorhanden ist
		
	function check_login($username, $passwort) {
		global $dbh;
		
		$test1 = $dbh->prepare ( "SELECT COUNT(*) as user FROM kunden WHERE username = ? AND pass = ?" );
		$test1->execute(array($username, $passwort));
		$login_user = $test1->fetch();
		if($login_user["user"] == 1)
			return true; 
		else
			return false;
	} 
	
	
	
	//Vollst�ndigkeitsabfrage f�r Profil und Register
	
	function check_email($email) {        
    if(preg_match('/^[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+(?:\.[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+)*\@[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+(?:\.[^\x00-\x20()<>@,;:\\".[\]\x7f-\xff]+)+$/i', $email)) return true;
    return false;
	}
	
	function check_string($username) {        
    if(preg_match('/^[a-zA-Z0-9\._]+$/i', $username)) return true;
    return false;
	}
	
	function check_length($username) {        
    if(strlen($username) > 5) return true;
    return false;
	}
	
	$vollstaendig = "";
	
	if (isset($_POST["abschicken"])) {
		
		if ($_POST['abschicken'] == "speichern") {
			
			if (!isset($_POST["uid"]) ||
				!is_string($_POST["uid"]) ||
				trim($_POST["uid"]) == "") {
					$vollstaendig .= "<li>Username</li>";
			}
			if (check_string($_POST['uid']) == false){
				$vollstaendig .= "<li>Username darf keine Sonderzeichen au&szlig;er \".\" und \"_\" enthalten</li>";
			}
			if (check_length($_POST['uid']) == false){
				$vollstaendig .= "<li>Username muss mindestens 5 Zeichen haben</li>";
			}
			if ($uid->uidvorhanden > 0) {
						$vollstaendig .="<li>Username ist bereits vergeben</li>";
			}
		}
		
		if ($_POST["pid1"] != $_POST["pid2"] || $_POST["pid1"] =="" || $_POST["pid2"] =="") {
			$vollstaendig .= "<li>Passw&ouml;rter sind nicht korrekt</li>";
		}
		if (!isset($_POST["isfemale"]) ||
			!is_string($_POST["isfemale"]) ||
			trim($_POST["isfemale"]) == "") {
				$vollstaendig .= "<li>Geschlecht</li>";
		}
		if (!isset($_POST["vorname"]) ||
			!is_string($_POST["vorname"]) ||
			trim($_POST["vorname"]) == "") {
				$vollstaendig .= "<li>Vorname</li>";
		}
		if (!isset($_POST["nachname"]) ||
			!is_string($_POST["nachname"]) ||
			trim($_POST["nachname"]) == "") {
				$vollstaendig .= "<li>Nachname</li>";
		}
		if (!isset($_POST["strasse"]) ||
			!is_string($_POST["strasse"]) ||
			trim($_POST["strasse"]) == "") {
				$vollstaendig .= "<li>Strasse</li>";
		}
		if (!isset($_POST["plz"]) ||
			!is_string($_POST["plz"]) ||
			trim($_POST["plz"]) == "") {
				$vollstaendig .= "<li>Postleitzahl</li>";
		}
		if (!isset($_POST["ort"]) ||
			!is_string($_POST["ort"]) ||
			trim($_POST["ort"]) == "") {
				$vollstaendig .= "<li>Stadt</li>";
		}
		if (!isset($_POST["email"]) ||
			!is_string($_POST["email"]) ||
			trim($_POST["email"]) == "" ||
			check_email($_POST["email"]) == false) {
				$vollstaendig .= "<li>E-Mail Adresse</li>";
		}
		if (!isset($_POST["land"]) ||
			!is_string($_POST["land"]) ||
			trim($_POST["land"]) == "") {
				$vollstaendig .= "<li>Land</li>";
		}
	
	}
?>
