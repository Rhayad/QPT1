<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

	$pagetitle = "Lex Corii";

    include "functions.php";
	
	$bild = 1;
	$artikel = $_SESSION['artikel'];
	$preis = $_SESSION['preis'];	
	
	//Damit das richtige Nietenset aus der Datenbank herausgelesen wird, suche ich nach einem Teil des Artikelnamens und der entsprechenden Artikelgruppe
	$suche = substr($artikel[1],0,6);

	$sth =$dbh->prepare("SELECT * FROM artikel WHERE gid = :gid AND name LIKE :suche");
	$sth->execute(array(':gid'=>'12',
						':suche'=>'%'.$suche.'%'));
	$nieten = $sth->fetchAll(PDO::FETCH_OBJ);
	
	//Für die Art des Nietensets werden einfach 4 relevanten Modelle Modelle aus der Datenbank herausgeholt und als Nietenbeispiele herausgenommen	
	$sth =$dbh->prepare("SELECT * FROM artikel WHERE gid = ? LIMIT 0,4");
	$sth->execute(array('11'));
	$nietenart = $sth->fetchAll(PDO::FETCH_OBJ);
	
	//hier wird das Artikelarray weiter befüllt. Sollte kein Nietenset ausgewählt werden wird die Nietenart automatisch aufgefüllt
	if ($_POST["weiter"] == "weiter zu den Verzierungen" && $fehler == '') {
		$artikel[4] = $_POST['nietenset'];
		if ($_POST['nietenset'] == 'keine Nieten') {
			$artikel[5] = $_POST['nietenset'];
		} else {
			$artikel[5] = $_POST['nietensetart'];
		}
		
		//Preis für das Nietenset wird aus der Datenbank herausgeholt, zum bestehenden Preis addiert und beides wieder in die globalen Variablen/Arrays gesetzt
		$sth=$dbh->prepare("SELECT preis FROM artikel WHERE name LIKE ?");
		$sth->execute (array($_POST['nietenset']));
		$artikelpreis = $sth->fetchAll(PDO::FETCH_OBJ);
		
		foreach ($artikelpreis as $artpreis) {
				$zwischenpreis = $artpreis->preis;
			}

		$preis = $preis + $zwischenpreis;
		
		$_SESSION['preis'] = $preis;
		$_SESSION['artikel'] = $artikel;
		
		header("Location: verzierung.php");	
	}
	
    include "header.php";
?>

<table> 
	<tr style="height:25px">
    	<td colspan="2" style="border:0px">    
            <ul class="produktnavi">
                <li><?= '1. '.$_SESSION['link'] ?></li>
                <li><a href="lederauswahl.php">2. Leder</a></li>
                <li style="font-size:22px; margin:0 10px 0 0">3. Nieten</li>
            </ul>
       </td>
   </tr>
    

	<form method="post">
    		<tr style="height:70px">
            	<td></td>
                <td>
                	<input type="radio" name="nietenset" value="keine Nieten" checked="checked" /> keine Nieten
               	</td>
            </tr>
      	<?php foreach ($nieten as $niete): ?>
        	<tr>
            	<td><a href="images/produktbilder/<?= $niete->bild1 ?>.jpg" rel="lightbox-nieten"><img src="images/produktbilder/thn/<?= $niete->bild1 ?>thn.jpg" alt="Produktbild" title="zum Vergr&ouml;&szlig;ern bitte klicken" class="artikelbilder1" /></a></td>
                <td>
                	<input type="radio" name="nietenset" value="<?= $niete->name ?>" /> <?= $niete->name."<br /><br /><p style=\"margin:0 10px\">".$niete->beschreibung."</p><br /><p>Preis: + ".$niete->preis.",- Euro</p><br />" ?>
                    
                    <select name="nietensetart" >
        
                    	<?php foreach ($nietenart as $nieten2): ?>
                    
                        	<option value="<?= $nieten2->name ?>" > <?= $nieten2->name ?> </option>
                    
                    	<?php endforeach ?>       
                    </select>
                </td>
            </tr>
         <?php endforeach ?>
    <tr>
    	<td colspan="2">
        <ul>
			<?php foreach ($nietenart as $nieten2): ?>
                <li class="artikelbilder" ><a href="images/produktbilder/<?= $nieten2->bild1 ?>.jpg" rel="lightbox-nieten"><img src="images/produktbilder/thn/<?= $nieten2->bild1 ?>thn.jpg" alt="Produktbild" title="zum Vergr&ouml;&szlig;ern bitte klicken" style="border:2px solid #000" /></a></li>
            <?php endforeach ?> 
        </ul>
        </td>
    </tr>
    <tr>
    	<td colspan="2"><input type="submit" name="weiter" value="weiter zu den Verzierungen" /></td>
    </tr>
     </form>
</table>
	
	
<?php
    include "footerartikel.php";
?>
