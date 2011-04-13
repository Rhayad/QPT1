<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

    $pagetitle = "Lex Corii";

    include "functions.php";
	
	$pid = $_SESSION['USER'];
	
	if(isset($_POST['adressedelete']) && 
		isset($_POST['delete'])) {
	
		$sth = $dbh->prepare("DELETE FROM lieferadressen WHERE lid = ?");
		$sth->execute(array($_POST['adressedelete']));
		$adressen = $sth->fetchAll(PDO::FETCH_OBJ);
		
		$geloescht = true;
		
		header("Loaction:lieferadressen.php");
	
	}
	
	 	if( isset($_POST['lieferadresse'])) {
	
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
			if (!isset($_POST["land"]) ||
				!is_string($_POST["land"]) ||
				trim($_POST["land"]) == "") {
					$vollstaendig .= "<li>Land</li>";
			}

		
		if ($vollstaendig == '' && isset($_POST['lieferadresse'])) {
					
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
			
			header("Location:lieferadressen.php");
			}
		}
		
	$sth = $dbh->prepare("SELECT * FROM lieferadressen WHERE username = ?");
	$sth->execute(array($pid));
	$adressen = $sth->fetchAll(PDO::FETCH_OBJ);
			  		
	include "header.php";
	
?>
    
    <h1>Lieferadressen von <?= $_SESSION['USER'] ?></h1>
    
        <?php if ($geloescht == true) :  ?>
            <ul style="margin:10px 0 0 20px">
                <li>Die Adresse wurde erfolgreich gel&ouml;scht</li>
            </ul>
    	<?php endif ?>
    
    <form method="post">
    
    <table style="margin: 0 auto">    	
		<?php foreach ($adressen as $key) : ?>
            <tr>
                <td style="text-align:right; width:150px; padding:0 10px 0 0">
                    <ul>
                        <li>Vorname: </li>
                        <li>Nachname: </li>
                        <li>Strasse: </li>
                        <li>Plz: </li>
                        <li>Stadt: </li>
                        <li>Land: </li>
                    </ul>
                </td>
                <td style="text-align:left; width:150px; padding:0 0 0 10px">
                	<ul>
                        <li><?= $key->vorname ?></li>
                        <li><?= $key->nachname ?></li>
                        <li><?= $key->strasse ?></li>
                        <li><?= $key->plz ?></li>
                        <li><?= $key->ort ?></li>
                        <li><?= $key->land ?></li>
                    </ul>
                </td>
            </tr>
            <tr style="height:auto">
            	<td colspan="2" style="border:none">
            		<input type="checkbox" name="adressedelete" value="<?= $key->lid ?>" style="margin:0 5px" /><input type="submit" name="delete" value="l&ouml;schen" />
                </td>
            </tr>    
        <?php endforeach ?>
    </table>
  
	</form>
    
    <div id="profil">
    
    <h2 style="text-align:center">Weitere Lieferdresse eingeben:</h2>
    
		<?php if ($vollstaendig != '') : ?>		
			<p>Folgende Angaben fehlen</p><br />
            <ul><?php print $vollstaendig; ?></ul>
        <?php endif ?>
        <?php if ($_POST['abschicken'] == 'speichern' && $vollstaendig == '') : ?>
        	<p>Danke, die Daten wurden gespeichert</p>    
		<?php endif ?>
        
        <form method="post">
    	<input type="hidden" name="from_form" value="1" />
        
   		       <p><label class="leftcol" for="vorname"> <span class="stern">*</span>  Vorname</label> <input name="vorname" value="<?= $profil->vorname; ?>" /></p>
 		       <p><label class="leftcol" for="nachname"><span class="stern">*</span>  Nachname </label> <input name="nachname" value="<?= $profil->nachname; ?>" /></p>
 		       <p><label class="leftcol" for="strasse"><span class="stern">*</span>  Strasse </label><input  name="strasse" value="<?= $profil->strasse; ?>" /></p>
 		       <p><label class="leftcol" for="plz"><span class="stern">*</span>  Plz </label><input  name="plz" value="<?= $profil->plz; ?>" /></p>
		       <p><label class="leftcol" for="ort"><span class="stern">*</span>  Stadt </label><input  name="ort" value="<?= $profil->ort; ?>" /></p>
		       <p><label class="leftcol" for="land"><span class="stern">*</span>  Land </label><input  name="land" value="<?= $profil->land; ?>" /></p>  
    		   <p><span class="leftcol"></span><input type="submit" name ="lieferadresse" value="neue Adresse speichern" style="margin:20px 0" /></p>

   		 </form>
          
	</div>

	
<?php include "footer.php"; ?>
