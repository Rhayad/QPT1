<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

    $pagetitle = "Lex Corii";

    include "functions.php";
	
	$sth = $dbh->prepare("SELECT * FROM lieferadressen WHERE lid = ?");
	$sth->execute(array($_SESSION['lieferadresse']));
	$adresse = $sth->fetchAll(PDO::FETCH_OBJ);
	
	$user = $_SESSION['USER'];
	
	if (isset($_POST['agb']) && isset($_POST['bestellen'])) {
		
		$sth = $dbh->prepare("INSERT INTO bestellungen (username, lid) VALUES (?, ?)");
		$sth->execute(array($_SESSION['USER'], $_SESSION['lieferadresse']));
		
		$sth=$dbh->query("SELECT MAX(bid) from bestellungen");
		$rechnung=$sth->fetch();
			
		foreach ($rechnung as $key) {
			$rechnungsnr = $key;
		}
		
		foreach ($_SESSION['warenkorb'] as $artikel) {
				
				$sth = $dbh->prepare( "INSERT INTO warenkorb (bid, username, artikel, zusatz1, zusatz2, zusatz3, zusatz4, zusatz5, preis, bild, bestelldatum, bezahlart) VALUES
												   (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
				$sth->execute(
						  array(
								$rechnungsnr,
								$artikel[0],
								$artikel[1],
								$artikel[2],
								$artikel[3],
								$artikel[4],
								$artikel[5],
								$artikel[6],
								$artikel[7],
								$artikel[8],
								$_SESSION['datum'],
								$_POST['bezahlart']
								)
							);
				}	
		
		
		$_SESSION['warenkorb'] = array();
			
		header("Location:danke.php");
		
	}
	
	include "header.php";
	
?>
    
    <h1>&Uuml;bersicht</h1>
    
	<?php if (!isset($_POST['agb']) && isset($_POST['bestellen'])) :  ?>
    	<ul style="margin:10px 0 0 20px">
        	<li>Zum Bestellen m&uuml;ssen die AGBs akzeptiert sein</li>
        </ul>
    <?php endif ?>
    
    <?php if ($_SESSION['warenkorb']) : ?>   
		<form method="post">
		<table>
			<?php foreach ($_SESSION['warenkorb'] as $warenkorbid => $artikel) : ?>
				<tr>
					<td><img src="images/produktbilder/thn/<?= $artikel[8] ?>thn.jpg" alt="Produktbild" title="zum Vergr&ouml;&szlig;ern bitte klicken" class="artikelbilder1" /></td>
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
								</table>
							 </li>
                         </ul>
					</td>
				</tr>
			<?php endforeach ?>
		
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
				<?php foreach ($adresse as $key) : ?>
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
                <?php endforeach ?>
            </tr>
      
            
			
			<tr style="height:80px">
				<td colspan="2">
					<ul style="list-style:none">
						

                        <li style="text-align:center; margin:10px 0 10px 0"><input type="checkbox" name="agb" value="gelesen" style="margin:0 5px" />AGB gelesen und akzeptiert</li>
						<li style="margin:10px 0 10px 0">Bezahlart:<select name="bezahlart" style="margin:0 5px">
								<option value="vorauskasse">Vorauskasse</option>
								<option value="nachname">Nachname +7,- Euro</option>
								<option value="rechnung">Rechnung</option>
							</select></li>
						
                        <li><input type="submit" name ="bestellen" value="bestellen" /></li>
					</ul>
				</td>
			 </tr>
			 
		</table>
		</form>
    <?php endif ?>
	
<?php include "footer.php"; ?>
