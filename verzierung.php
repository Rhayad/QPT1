<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
	//Die Datei "Verzierung.php" funtkioniert genauso wie die Abfragen der Datenbank wie auf der Seite "Lederauswahl.php". Ich hoffe ich brauche die Seite nicht 
	//ebenfalls auskommentieren. ;-)
    $pagetitle = "Lex Corii";

    include "functions.php";
	
	$artikel = $_SESSION['artikel'];
	$preis = $_SESSION['preis'];

	$suche = substr($artikel[1],0,6);
	$sth =$dbh->prepare("SELECT * FROM artikel WHERE gid = :gid AND name LIKE :suche");
	$sth->execute(array(':gid'=>'14',
						':suche'=>'%'.$suche.'%'));
	$verzierung = $sth->fetchAll(PDO::FETCH_OBJ);

	if ($_POST['warenkorb'] != '' || $_POST['merkliste'] != '' || $_POST['berechne'] != '') {
		$artikel[6] = $_POST['verzierung'];

		$sth=$dbh->prepare("SELECT preis FROM artikel WHERE name LIKE ?");
		$sth->execute (array($_POST['verzierung']));
		$artikelpreis = $sth->fetchAll(PDO::FETCH_OBJ);
		
		foreach ($artikelpreis as $artpreis) {
				$zwischenpreis = $artpreis->preis;
		}

		$preis = $preis + $zwischenpreis;

		$artikel[7] = $preis;
		$_SESSION['preis'] = $preis;
		$_SESSION['artikel'] = $artikel;
		
		//==================================================================================================================================================
		//Merkliste
		
		if ($_POST['merkliste'] == 'auf die Merkliste' && $_SESSION['USER'] != '') {
			
			$sth=$dbh->prepare("SELECT bild1 as bild FROM artikel WHERE name LIKE ?");
			$sth->execute (array($artikel[1]));
			$merklistebild = $sth->fetchAll(PDO::FETCH_OBJ);
			
			foreach ($merklistebild as $bild) {
				$artikel[8] = $bild->bild;	
			}
			
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
		
		//==================================================================================================================================================
		//Warenkorb		
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
		
	}
	
    include "header.php";
?>
   
<table>
	<tr style="height:25px">
    	<td colspan="2" style="border:0px">
            <ul class="produktnavi">
                <li><?= '1. '.$_SESSION['link'] ?></li>
                <li><a href="lederauswahl.php">2. Leder</a></li>
                <li><a href="nietenset.php">3. Nieten</a></li>
                <li style="font-size:22px; margin:0 10px 0 0">4. Verzierung</li>
            </ul>
        </td>
    </tr> 
    

	<form method="post">
        <tr style="height:70px">
            <td></td>
            <td>
                <input type="radio" name="verzierung" value="keine Verzierung" checked="checked" /> keine Verzierung
            </td>
        </tr>
      <?php foreach ($verzierung as $verzierung): ?>
        	<tr>
            	<td><a href="images/produktbilder/<?= $verzierung->bild1 ?>.jpg" rel="lightbox-Verzierung"><img src="images/produktbilder/thn/<?= $verzierung->bild1 ?>thn.jpg" alt="Produktbild" title="zum Vergr&ouml;&szlig;ern bitte klicken" class="artikelbilder1" /></a></td>
                <td>
                	<input type="radio" name="verzierung" value="<?= $verzierung->name ?>" 
                    
					<?php if ($_POST['verzierung'] == $verzierung->name ) echo 'checked=\"checked\"'; ?>
                    
                    /> <?= $verzierung->name."<br /><br /><p>Preis: + ".$verzierung->preis.",- Euro</p><br />" ?>
                </td>
            </tr>
         <?php $bild++;
        	endforeach ?>
        <tr>
            <td colspan="2">
                <ul style="list-style:none">
                    <?php if ($_SESSION['USER'] == '' && ($_POST['merkliste'] == 'auf die Merkliste' || $_POST['warenkorb'] == 'in den Warenkorb')) : ?>
                        <li style="margin:0 0 10px 0">Bitte logge Dich zuerst ein</li>
                        <li style="margin:0 0 20px 0"><a href="register.php">registrieren</a> oder <a href="login.php">einloggen</a></li>
                    <?php endif ?>
                    <?php if ($merkliste_erfolg == true) :?>
                        <li style="margin:0 0 20px 0">Artikel wurde der Merkliste erfolgreich hinzugef&uuml;gt</li>
                    <?php endif ?>
                    <?php if ($vorhanden > '0') :?>
                        <li style="margin:0 0 20px 0">Der Artikel in der Ausf&uuml;hrung befindet sich bereits auf Deiner Merkliste</li>
                    <?php endif ?>
                    <?php if ($warenkorb_erfolg == true) :?>
                        <li style="margin:0 0 20px 0">Der Artikel befindet sich nun in Deinem Warenkorb</li>
                    <?php endif ?>
                    <li style="margin:5px 0;"><input type="submit" name="berechne" value="Artikel berechnen" /></li>
                    <li style="margin:5px 0;"><input type="submit" name="merkliste" value="auf die Merkliste" /></li>
                    <li style="margin:5px 0;"><input type="submit" name="warenkorb" value="in den Warenkorb" /></li>
                </ul>                    
            </td>
        </tr>
     </form>
</table>
	
	
<?php
    include "footerartikel.php";

?>
