<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

    $pagetitle = "Lex Corii";

    include "functions.php";
	
	//hier wird ein einzelner Artikel vom User im Warenkorb gelöscht

	if (isset($_POST['artikeldelete'])) {
		
		unset($_SESSION['warenkorb'][$_POST['artikeldelete']]);
		
		$geloescht = true;
		
	
		
		header("Loaction:warenkorb.php");
	}
	
	//Löschen des kompletten Warenkorbes. Damit das nicht aus versehen geschieht muss die Checkbox aktiviert sein.
	if (isset($_POST['wdelete']) && 
		$_POST['warenkorbdelete'] != '' &&
		isset($_SESSION['warenkorb'])) {
		
			$_SESSION['warenkorb'] = array();
			
		header("Location:warenkorb.php");
	}
	
	//Herausholen der letzten Rechnungsnummer aus der Datenbank und schreiben der Rechnungstabelle. Alle Artikel werden einzeln mit der gleichen Rechnungsnummer eingeschrieben
	//und können so leicht wieder ausgelesen werden.
	if (isset($_POST['warenkorb'])) {

				 header("Location:rechnungsadresse.php");
			
		}
	
	include "header.php";
	
?>
    
    <h1>Warenkorb von <?= $_SESSION['USER'] ?></h1>
    
    <?php if ($geloescht == true) :  ?>
    	<ul style="margin:10px 0 0 20px">
        	<li>Der Artikel wurde erfolgreich gel&ouml;scht</li>
        </ul>
    <?php endif ?>
    <?php if(count($_SESSION['warenkorb']) == 0) : ?>
    	<ul style="margin:10px 0 0 20px">
         	<li>Du hast leider keinen Artikel in deinem Warenkorb</li>
        </ul>
    <?php endif ?>
    
    <?php if ($_SESSION['warenkorb']) : ?>   
		<form method="post">
		<table>
			<?php foreach ($_SESSION['warenkorb'] as $warenkorbid => $artikel) : ?>
				<tr>
                	<td><a href="images/produktbilder/<?= $artikel[8] ?>.jpg" rel="lightbox-nieten"><img src="images/produktbilder/thn/<?= $artikel[8] ?>thn.jpg" alt="Produktbild" title="zum Vergr&ouml;&szlig;ern bitte klicken" class="artikelbilder1" /></a></td>
					<td style="text-align:left">
						<ul style="list-style:none">
							<li>
								<table style="vertical-align:top">
									<tr>
										<td style="max-width:80px; border:0px">
											<ul>
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
												<li><?= $artikel[1] ?></li>
												<li><?= $artikel[2] ?></li>
												<li><?= $artikel[3] ?></li>
												<li><?= $artikel[4] ?></li>
												<li><?= $artikel[5] ?></li>
												<li><?= $artikel[6] ?></li>                                                
												<li style="margin:10px 0 0 0"><?= sprintf("%01.2f", $artikel[7]) ?> Euro</li>
											</ul>
										 </td>
									 </tr>
									 <tr style="height:50px">
										<td colspan="2">
											<ul>
												<li style="text-align:center"><input type="checkbox" name="artikeldelete" value="<?= $warenkorbid ?>" style="margin:0 5px" /><input type="submit" name="delete" value="l&ouml;schen" /></li>
											</ul>
										</td>
									 </tr>
								 </table>
							 </li>
												
							
						</ul>
					</td>
				</tr>
			<?php endforeach ?>
			<?php if (count($_SESSION['warenkorb'] > 0)) : ?>
			<tr style="height:80px">
				<td colspan="2">
					<ul style="list-style:none">
						<li style="text-align:center"><input type="checkbox" name="wdelete" value="<?= $artikel->wid ?>" style="margin:0 5px" /><input type="submit" name="warenkorbdelete" value="Warenkorb l&ouml;schen" /></li>
						<li style="text-align:center; margin:10px 0 0 0"><input type="submit" name="warenkorb" value="weiter zur Lieferadresse" /></li>
					</ul>
				</td>
			 </tr>
			 <?php endif ?>
		</table>
		</form>
    <?php endif ?>
	
<?php include "footer.php"; ?>
