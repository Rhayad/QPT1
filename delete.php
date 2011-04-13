<?php
	$pagetitle = "Delete";
	include "functions.php";

    include "header.php";
	
	$pid = $_POST['pid'];
	
	$person = $dbh->prepare("SELECT vorname, nachname FROM person WHERE pid = ?");
	$person->execute(array($pid));
	$ausgabe = $person->fetch(PDO::FETCH_OBJ);

	$sth = $dbh->prepare("DELETE FROM person WHERE pid = ?");
	$sth->execute(array($pid));
	
?>
	
	<h1>Herzlichen Gl&uuml;ckwunsch</h1>
    <p>Sie haben <span style="text-decoration:underline; font-style:italic"><?= "$ausgabe->vorname $ausgabe->nachname" ?></span> erfolgreich gel&ouml;scht !</p>
    
    
<?php include "footer.php"; ?>
