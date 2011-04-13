<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
    $pagetitle = "Lex Corii";

    include "functions.php";
	
	//Löschen der von einzelnen Artikeln aus der Merkliste. Auch hier muss die Checkbox aktiviert sein um versehentliches Löschen zu verhindern.
	if (isset($_POST['mdelete']) &&
		$_POST['delete'] != '') {

		$sth=$dbh->prepare("DELETE FROM merklisten WHERE mid = ?");
		$sth->execute(array($_POST['mdelete']));
		$sth->fetchAll(PDO::FETCH_OBJ);
		
		$geloescht = true;
		
		header("Loaction:merkliste.php");
	}
	
	//Schreiben von der Merkliste in den Warenkorb. Wenn der Artikel erfolgreich überschrieben wurde in das "Warenkorb - Array" wird er von der Merkliste gelöscht.
	if (isset($_POST['mwarenkorb']) &&
		$_POST['warenkorb'] != '') {
		
			foreach ($merkliste1 as $key) {
				if ($_POST['mwarenkorb'] == $key->mid) {
					$artikel[0] = $key->username;
					$artikel[1] = $key->artikel;
					$artikel[2] = $key->zusatz1;
					$artikel[3] = $key->zusatz2;
					$artikel[4] = $key->zusatz3;
					$artikel[5] = $key->zusatz4;
					$artikel[6] = $key->zusatz5;
					$artikel[7] = $key->preis;
					$artikel[8] = $key->bild;
					
					$letzte_Variable_fuer_das_qpt = true;
				}
				
			}
			
			//ACHTUNG    E A S T E R E G G - Variable   *muahahahahahaaaaaaaaaa* ein Brüller !!
			if ($letzte_Variable_fuer_das_qpt == true) {
				
				array_push($_SESSION['warenkorb'], $artikel);
		
				$sth=$dbh->prepare("DELETE FROM merklisten WHERE mid = ?");
				$sth->execute(array($_POST['mwarenkorb']));
				$sth->fetchAll(PDO::FETCH_OBJ);
				
				$warenkorbgeschickt = true;
				
				header("Loaction:merkliste.php");
			}
	}
	
	//Neuauslesen der Merkliste, damit die gelöschten Artikel von der Merkliste direkt wieder verschwinden.
	
	$sth=$dbh->prepare("SELECT * FROM merklisten WHERE username = ? ORDER BY mid DESC");
	$sth->execute(array($_SESSION['USER']));
	$merkliste = $sth->fetchAll(PDO::FETCH_OBJ);

	include "header.php";
	
?>
    
    <h1>Merkliste von <?= $_SESSION['USER'] ?></h1>
    
    <?php if ($geloescht == true) :  ?>
    	<ul style="margin:10px 0 0 20px">
        	<li>Der Artikel wurde erfolgreich gel&ouml;scht</li>
        </ul>
    <?php endif ?>
	
    <?php if (count($merkliste) == 0) : ?>
    	<ul style="margin:10px 0 0 20px">
         	<li>Du hast leider keinen Artikel auf deiner Merkliste</li>
        </ul>
    <?php endif ?>
    
    <?php if ($warenkorbgeschickt == true) : ?>
    	<ul style="margin:10px 0 0 20px">
         	<li>Der Artikel wurde in den Warenkorb gelegt</li>
        </ul>
    <?php endif ?>
    
    <form method="post" action="merkliste.php">
    <table>
    	<?php foreach ($merkliste as $artikel) : ?>
			<tr>
            	<td><a href="images/produktbilder/<?= $artikel->bild ?>.jpg" rel="lightbox-nieten"><img src="images/produktbilder/thn/<?= $artikel->bild ?>thn.jpg" alt="Produktbild" title="zum Vergr&ouml;&szlig;ern bitte klicken" class="artikelbilder1" /></a></td>
                <td style="text-align:left">
                	<ul style="list-style:none">
                    	<li>
                        	<table style="vertical-align:top">
                            	<tr>
                                	<td style="max-width:80px; border:0px">
                                    	<ul>
                                        	<li><p>hinzugef&uuml;gt:</p></li>
                                        	<li><p>Artikel:</p></li>
                                            <li><p>Farbe:</p></li>
                                            <li><p>2.Farbe:</p></li>
                                            <li><p>Nietenset:</p></li>
                                            <li><p>Nietenart:</p></li>
                                            <li><p>Verzierung:</p></li>
                                            <li style="margin:10px 0 0 0"><p>Preis:</p></li>   
                                        </ul>
                                    </td>
                                    <td style="max-width:200px; border:0px">
                                    	<ul>
                                        	<li><?= $artikel->datum ?></li>
                                        	<li><?= $artikel->artikel ?></li>
											<li><?= $artikel->zusatz1 ?></li>
                                            <li><?= $artikel->zusatz2 ?></li>
											<li><?= $artikel->zusatz3 ?></li>
											<li><?= $artikel->zusatz4 ?></li>
                                            <li><?= $artikel->zusatz5 ?></li>
											<li style="margin:10px 0 0 0"><?= sprintf("%01.2f", $artikel->preis) ?> Euro</li>
                                        </ul>
                                     </td>
                                 </tr>
                                 <tr style="height:50px">
                                 	<td colspan="2">
                                    	<ul>
                                        	<li style="text-align:center"><input type="checkbox" name="mdelete" value="<?= $artikel->mid ?>" style="margin:0 5px" /><input type="submit" name="delete" value="l&ouml;schen" /></li>
                        					<li style="text-align:center; margin:10px 0 0 0"><input type="checkbox" name="mwarenkorb" value="<?= $artikel->mid ?>" style="margin:0 5px" /><input type="submit" name="warenkorb" value="in den Warenkorb" /></li>
                                        </ul>
                                    </td>
                                 </tr>
                             </table>
                         </li>
                                            
                        
                    </ul>
                </td>
        	</tr>
        <?php endforeach ?>
	</table>
	</form>
	
<?php include "footer.php"; ?>