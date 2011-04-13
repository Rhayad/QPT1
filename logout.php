<?php

/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
	//logout indem das das Cookie in die Vergangenheit gesetzt wird
	
	$pagetitle = "Lex Corii";
	include "functions.php";
	
	if ($_POST["logout"] == "logout") {
	
	$_SESSION = array();
	
	if(isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-4200000, '/');
	}
	session_destroy();
	header("Location: index.php");
	}
	
    include "header.php";
?>

<div id="profil">
	<h3>Sind Sie sicher, dass Sie sich ausloggen m&ouml;chten ?</h3>
    
	<form action="logout.php" method="post">
    <p><input type="submit" name="logout" value="logout" /></p>
    </form>
</div>
	
<?php include "footer.php"; ?>