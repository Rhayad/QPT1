<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
    $pagetitle = "Lex Corii";

    include "functions.php";
	//erneutes Auslesen der Artikel und Preisvariablen.
	$artikel = $_SESSION['artikel'];
	$preis = $_SESSION['preis'];
	
	//Auslesen des Artikels
	$sth =$dbh->prepare("SELECT * FROM artikel WHERE gid = ?");
	$sth->execute(array('13'));
	$leder = $sth->fetchAll(PDO::FETCH_OBJ);
	
	//Durch den Artikelnamen wird hier überprüft ob eine 2. Lederfarbe gewählt werden kann oder nicht. Falls nicht, wird die 2. Farbe im Array mit "keine Nieten" gesetzt.
	if ($_POST["weiter"] == "weiter zur Nietenauswahl") {
		$artikel[2] = $_POST['leder'];
		if (preg_match('/doppelt/', $artikel[1]) || preg_match('/2farbig/', $artikel[1])) {
			$artikel[3] = $_POST['leder2'];
			$_SESSION['artikel'] = $artikel;
			
		} else {
				$artikel[3] = 'keine 2. Farbe';	
		}
		
			$_SESSION['artikel'] = $artikel;
			header("Location: nietenset.php");	
	}
	
	//setzen des Artikels auf die Merkliste. Es wird beim Absenden überprüft, ob schon ein identischer Artikel auf der Merkliste vorhanden ist um Redundanzen zu vermeiden.
	//Sollte dies der Fall sein, so wird der Artikel garnicht mehr auf die Merkliste gesetzt. Ist auch nur ein Nietenset oder eine Lederfarbe anders so wird es eingetragen
	//unter dem Usernamen.
	if (($_POST['merkliste'] == 'auf die Merkliste' || $_POST['warenkorb'] == 'in den Warenkorb') && $_SESSION['USER'] !='') {
	
			$sth=$dbh->prepare("SELECT bild1 as bild FROM artikel WHERE name LIKE ?");
			$sth->execute (array($artikel[1]));
			$merklistebild = $sth->fetchAll(PDO::FETCH_OBJ);
			
			foreach ($merklistebild as $bild) {
				$artikel[7] = $preis;
				$artikel[8] = $bild->bild;	
			}
		
			$artikel[2] = $_POST['leder'];
			$artikel[3] = $_POST['leder2'];
			$artikel[4] = 'kein Nietenset m&ouml;glich';
			$artikel[5] = 'keine Nietenart m&ouml;glich';
			$artikel[6] = 'keine Standardverzierung m&ouml;glich';
			
			if ($_POST['merkliste'] == 'auf die Merkliste') {
				
				$sth = $dbh->prepare( "SELECT COUNT(artikel) as da FROM merklisten WHERE artikel = ? AND 
																						zusatz1 = ? AND
																						zusatz2 = ? AND
																						zusatz3 = ? AND
																						zusatz4 = ? AND
																						zusatz5 = ?");
				$sth->execute(
							  array(
									$artikel[1],
									$artikel[2],
									$artikel[3],
									$artikel[4],
									$artikel[5],
									$artikel[6],
									)
							  );
				$merkliste_vorhanden = $sth->fetchAll(PDO::FETCH_OBJ);
				
				foreach ($merkliste_vorhanden as $da) {
						$vorhanden = $da->da;
					}
	
				if ($vorhanden == '0') {
					
					$sth = $dbh->prepare( "INSERT INTO merklisten (username, artikel, zusatz1, zusatz2, zusatz3, zusatz4, zusatz5, preis, bild, datum) VALUES
													   (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
					$sth->execute(
							  array(
									$artikel[0],
									$artikel[1],
									$artikel[2],
									$artikel[3],
									$artikel[4],
									$artikel[5],
									$artikel[6],
									$artikel[7],
									$artikel[8],
									$_SESSION['datum']
									)
								);
					$merkliste_erfolg = true;
				}
			}
		}
		
		//Speichern des Artikels im warenkorb mit der Zufallszahl, die praktisch die "MID" in der Datenbank wie bei der Merkliste ersetzt. So kann der Artikel leicht von dem
		//Warenkorb gelöscht werden.
		if (!isset($_SESSION['warenkorb'])) {
			$_SESSION['warenkorb'] = array();
		}
		
		if ($_POST['warenkorb'] == 'in den Warenkorb' && $_SESSION['USER'] != '') {
			
			$sth=$dbh->prepare("SELECT bild1 as bild FROM artikel WHERE name LIKE ?");
			$sth->execute (array($artikel[1]));
			$merklistebild = $sth->fetchAll(PDO::FETCH_OBJ);
			
			foreach ($merklistebild as $bild) {
				$artikel[8] = $bild->bild;	
			}
			
			$artikel[9] = $_SESSION['zufall'];
				
			array_push($_SESSION['warenkorb'], $artikel);
			
			$warenkorb_erfolg = true;
		}
	
	include "header.php";
?>

<table>
	<tr style="height:25px">
    <td colspan="2" style="border:0px">
        <ul class="produktnavi">
            <li><?= '1. '.$_SESSION['link'] ?></li>
            <li style="font-size:22px; margin:0 10px 0 0">2. Leder</li>
        </ul> 
	</td>
    </tr>

 
	<form method="post">
    <tr>
    	<td><a href="images/produktbilder/artikelnaturbraun.jpg" rel="lightbox-leder"><img src="images/produktbilder/thn/artikelnaturbraunthn.jpg" alt="Produktbild" title="zum Vergr&ouml;&szlig;ern bitte klicken" class="artikelbilder1" /></a></td>
        <td>Lederfarbe:
        <select name="leder" >       
        <?php foreach ($leder as $lederfarbe): ?>
        
            <option value="<?= $lederfarbe->farbe ?>" > <?= $lederfarbe->farbe ?> </option>
        
        <?php endforeach ?>       
        </select>
        <br />
        <?php if (preg_match('/doppelt/', $artikel[1]) || preg_match('/2farbig/', $artikel[1])) : ?>
       	<p style="margin:10px 0 0 0">2. Lederfarbe:
        <select name="leder2" >       
        	<?php foreach ($leder as $lederfarbe): ?>
        
            	<option value="<?= $lederfarbe->farbe ?>" > <?= $lederfarbe->farbe ?> </option>
        
        	<?php endforeach ?>       
        </select>
        </p>
        <?php endif ?>
        </td>
	</tr>
    <tr>
    	<td colspan="2">
        <ul>
        <?php foreach ($leder as $lederfarbe): ?>
        	<li class="artikelbilder" ><a href="images/produktbilder/<?= $lederfarbe->bild1 ?>.jpg" rel="lightbox-leder"><img src="images/produktbilder/thn/<?= $lederfarbe->bild1 ?>thn.jpg" alt="Produktbild" title="zum Vergr&ouml;&szlig;ern bitte klicken" style="border:2px solid #000" /></a></li>
        <?php endforeach ?> 
        </ul>
      </td>
    </tr>
    <tr>
    	<td colspan="2">
        <?php if (preg_match('/doppelt/', $artikel[1])) : ?>
        	<ul style="list-style:none">
            				<?php if ($_SESSION['USER'] == '' && ($_POST['merkliste'] == 'auf die Merkliste' || $_POST['warenkorb'] == 'in den Warenkorb')) : ?>
                        		<li style="margin:0 0 10px 0">Bitte logge Dich zuerst ein</li>
                                <li style="margin:0 0 20px 0"><a href="register.php">registrieren</a> oder <a href="login.php">einloggen</a></li>
                            <?php endif ?>
        					<?php if ($merkliste_erfolg == true && $_SESSION['USER'] =! '') :?>
                            	<li style="margin:0 0 20px 0">Artikel wurde der Merkliste erfolgreich hinzugef&uuml;gt</li>
                            <?php endif ?>
                            <?php if ($vorhanden > 0 && $_SESSION['USER'] =! '') :?>
                            	<li style="margin:0 0 20px 0">Der Artikel in der Ausf&uuml;hrung befindet sich bereits auf Deiner Merkliste</li>
                            <?php endif ?>
                            <?php if ($warenkorb_erfolg == true) :?>
                        		<li style="margin:0 0 20px 0">Der Artikel befindet sich nun in Deinem Warenkorb</li>
                    		<?php endif ?>
        					<li style="margin:5px 0;"><input type="submit" name="merkliste" value="auf die Merkliste" /></li>
                            <li style="margin:5px 0;"><input type="submit" name="warenkorb" value="in den Warenkorb" /></li>
        				</ul> 
        <?php else : ?>               
        	<input type="submit" name="weiter" value="weiter zur Nietenauswahl" />
        <?php endif ?>
        
        </td>
    </tr>
     </form>
</table>


<?php include "footerartikel.php"; ?>
