<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
	$pagetitle = "Profil";
	include "functions.php";
	
	//Datenbankabfrage nach bestehenden Adressdaten und laden in die Variablen
	
	$pid = $_SESSION['USER'];
	
	$sth = $dbh->prepare("SELECT pass, isfemale, vorname, nachname, strasse, plz, ort, email, gebdatum, telefon, land FROM kunden WHERE username = :pid");
	$sth->bindValue(':pid', $_SESSION['USER'], PDO::PARAM_INT);
	$sth->execute();
	$profil = $sth->fetchObject();
		
	$profil->pass = htmlspecialchars( $profil->pass );
	$profil->isfemale = htmlspecialchars( $profil->isfemale );
	$profil->vorname = htmlspecialchars( $profil->vorname );
	$profil->nachname = htmlspecialchars( $profil->nachname );
	$profil->strasse = htmlspecialchars( $profil->strasse );
	$profil->plz = htmlspecialchars( $profil->plz );
	$profil->ort = htmlspecialchars( $profil->ort );
	$profil->email = htmlspecialchars( $profil->email );
	$profil->gebdatum = htmlspecialchars( $profil->gebdatum );
	$profil->telefon = htmlspecialchars( $profil->telefon );
	$profil->land = htmlspecialchars( $profil->land );
	
	//Übernehmen der Änderungen und speichern in der Datenbank. Auch hier wird das Formular überprüft ob bestehende Daten falsch oder ungültig eingegeben wurden.
	//Werden ungültige Daten eingegeben, wie zum Beispiel leere Felder, werden die Eingaben auf den alten Stand zurückgesetzt.
 	if( isset($_POST['abschicken']) && $vollstaendig == '') {
		
		$sth = $dbh->prepare( "UPDATE kunden SET
							
							 pass = ?,
							 isfemale = ?,
							 vorname = ?,
							 nachname = ?,
							 strasse = ?,
							 plz = ?,
							 ort = ?,
							 email = ?,
							 gebdatum = ?,
							 telefon = ?,
							 land = ?
							 WHERE
							 username = ?");
		
		$sth->execute(
					  array(
							
							$_POST['pid1'],
							$_POST['isfemale'],
							$_POST['vorname'],
							$_POST['nachname'],
							$_POST['strasse'],
							$_POST['plz'],
							$_POST['ort'],
							$_POST['email'],
							$_POST['alter'],
							$_POST['telefon'],
							$_POST['land'],
							$_SESSION['USER']
							)
					  );		
		
		
		//Lieferadresse eintragen
		if ($vollstaendig == '') {
					
			$sth = $dbh->prepare( "INSERT INTO lieferadressen (vorname, nachname, strasse, plz, ort, land, username) VALUES
												   (?, ?, ?, ?, ?, ?, ?)");
			
			$sth->execute(
						  array(
								$_POST['vorname'],
								$_POST['nachname'],
								$_POST['strasse'],
								$_POST['plz'],
								$_POST['ort'],
								$_POST['land'],
								$_SESSION['USER']
								)
						  );
			
			header("Location:profil.php");
			}
	}
		
 	include "header.php";
	
?>
    
<div id="profil">

<h1><?php echo $pagetitle." von ".$_SESSION['USER'] ?></h1>
    
		<?php if ($vollstaendig != '') : ?>		
			<p>Folgende Angaben fehlten und wurden zur&uuml;ckgesetzt:</p><br />
            <ul><?php print $vollstaendig; ?></ul>
        <?php endif ?>
        <?php if (isset($_POST['abschicken']) && $vollstaendig == '') : ?>
        	<p>Danke, die Daten wurden gespeichert</p>    
		<?php endif ?>
		
		

    	<form method="post" action="profil.php">
    	<input type="hidden" name="from_form" value="1" />
   		  
  		      <p><label class="leftcol" for="pid1"> <span class="stern">*</span>  Passwort</label> <input type="password" name="pid1" value="<?= $profil->pass ?>" /></p>
  		      <p><label class="leftcol" for="pid2"> <span class="stern">*</span>  Passwort wiederholen</label> <input type="password" name="pid2" value="<?= $profil->pass ?>" /></p>
  		      <p><span class="leftcol"></span>
  		            <label><input type="radio" name="isfemale" value="1" 
					<?php 
							if ($profil->isfemale == 1) {
									print("checked=\"checked\"");
									}
                        ?>
                        ><span style="margin-left:5px">Frau</span></label>
  		            <label style="margin-left:5px"><input type="radio" name="isfemale" value="0"
                    <?php
							if ($profil->isfemale == 0) {
									print("checked=\"checked\"");
									}
                        ?>
                        ><span style="margin-left:5px">Mann</span></label></p>		
 		       <p><label class="leftcol" for="vorname"> <span class="stern">*</span>  Vorname</label> <input name="vorname" value="<?= $profil->vorname; ?>" /></p>
 		       <p><label class="leftcol" for="nachname"><span class="stern">*</span>  Nachname </label> <input name="nachname" value="<?= $profil->nachname; ?>" /></p>
 		       <p><label class="leftcol" for="strasse"><span class="stern">*</span>  Strasse </label><input  name="strasse" value="<?= $profil->strasse; ?>" /></p>
 		       <p><label class="leftcol" for="plz"><span class="stern">*</span>  Plz </label><input  name="plz" value="<?= $profil->plz; ?>" /></p>
		       <p><label class="leftcol" for="ort"><span class="stern">*</span>  Stadt </label><input  name="ort" value="<?= $profil->ort; ?>" /></p>
		       <p><label class="leftcol" for="land"><span class="stern">*</span>  Land </label><input  name="land" value="<?= $profil->land; ?>" /></p>
 		       <p><label class="leftcol" for="alter">Geburtstag</label><input  name="alter" value="<?= $profil->gebdatum; ?>" /></p>
 		       <p><label class="leftcol" for="email"><span class="stern">*</span>  E-mail Adresse </label><input  name="email" value="<?= $profil->email; ?>" /></p>
     		   <p><label class="leftcol" for="telefon">Telefon</label> <input  name="telefon" value="<?= $profil->telefon; ?>" /></p>    
    		   <p><span class="leftcol"></span><input type="submit" name ="abschicken" value="aktualisieren" /></p>
               <h3 style="margin:20px 0"><span class="leftcol"></span><a href="lieferadressen.php">andere Lieferadressen eingeben</a></h3>
          
   		 </form>
       
</div>
    
<?php include "footer.php"; ?>
