<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
    $pagetitle = "Lex Corii";
	
	$bild = 1;
	$preis = 0.0;

    include "functions.php";
	
	//Speicherung der Seite um über die Produktschritte wieder zur Anfangsseite zurückkehren zu können
	$_SESSION['link'] = "<a href=\"armschienen.php\">Armschienen</a>";
	
	//Abfrage der Artikelgruppe
	$sth=$dbh->prepare("SELECT * FROM artikel WHERE gid = ?");
	$sth->execute (array('2'));
	$lederartikel = $sth->fetchAll(PDO::FETCH_OBJ);
	
	//sobald der Basisartikel ausgewählt wurde, wird das "Artikel-Array" befüllt. Dadurch, dass der Username mitgegeben wird, können Benutzer nicht aus versehen auf Artikel
	//fremder Benutzer zugreifen, oder diese einsehen. Außerdem wird der Artikelname mitgegeben. 
	if ($_POST["weiter"] == "weiter zur Lederauswahl"
		   && $_POST['lederartikel'] != '') {
		$artikel[0] = $_SESSION['USER'];
		$artikel[1] = $_POST['lederartikel'];
		
	//Außerdem wird der Preis mitgegeben, so dass im jeden Schritt zum fertigen Artikel, der Artikelpreis sich angleicht	
		$sth=$dbh->prepare("SELECT preis FROM artikel WHERE name LIKE ?");
		$sth->execute (array($_POST['lederartikel']));
		$artikelpreis = $sth->fetchAll(PDO::FETCH_OBJ);
		
		foreach ($artikelpreis as $preis) {
				$zwischenpreis = $preis->preis;
			}
			
		$preis += $zwischenpreis-1;
	//Der aktuelle Artikelstatus wird auch wieder durch das "SESSION-Array" an die weiteren Seiten übergeben
		$_SESSION['artikel'] = $artikel;
		$_SESSION['preis'] = $preis;
		
		header("Location: lederauswahl.php");	
	}
	
	
	include "header.php";
?>

<table>
	<tr style="height:25px">
        <td colspan="2" style="border:0px">
            <ul class="produktnavi">
                <li style="font-size:22px; margin:0 10px 0 0"><?= '1. '.$_SESSION['link'] ?></li>
            </ul>
        </td>
    </tr>
    
	<?php if ($_POST['weiter'] == 'weiter zur Lederauswahl' &&
                $_POST['lederartikel'] == '') : ?>
                <tr style="height:25px">
                    <td colspan="2" style="text-align:left">
                        <ul style="margin:10px 0 0 20px" >
                            <li>Bitte w&auml;hlen Sie eine Armschiene aus</li>
                        </ul>
                   </td>
               </tr>
    <?php endif ?>
    
	<form method="post">
        <?php foreach ($lederartikel as $art): ?>
        	<tr>
            	<td><a href="images/produktbilder/<?= $art->bild1 ?>.jpg" rel="lightbox"><img src="images/produktbilder/thn/<?= $art->bild1 ?>thn.jpg" alt="Produktbild" title="zum Vergr&ouml;&szlig;ern bitte klicken" class="artikelbilder1" /></a></td>
                <td>
                	<input type="radio" name="lederartikel" value="<?= $art->name ?>" /> <?= $art->name."<br /><br /><p style=\"margin:0 10px\">".$art->beschreibung."</p><br /><p>Grundpreis: ".$art->preis.",- Euro</p>" ?>
                </td>
            </tr>
         <?php endforeach ?>
    	<tr style="height:30px">
        	<td colspan="2"><input type="submit" name="weiter" value="weiter zur Lederauswahl" /></td>
		</tr>     
     </form>
</table>
	
	
<?php include "footerartikel.php"; ?>
