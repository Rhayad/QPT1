<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

    $pagetitle = "Lex Corii";
	$bild = 1;
	$preis = 0.0;

    include "functions.php";
	
	$_SESSION['link'] = "<a href=\"halsband.php\">Halsb&auml;nder</a>";
	
	$sth=$dbh->prepare("SELECT * FROM artikel WHERE gid = ?");
	$sth->execute (array('7'));
	$lederartikel = $sth->fetchAll(PDO::FETCH_OBJ);
	
	if ($_POST["weiter"] == "weiter zur Lederauswahl"
		   && $_POST['lederartikel'] != '') {
		$artikel[0] = $_SESSION['USER'];
		$artikel[1] = $_POST['lederartikel'];
		
		$sth=$dbh->prepare("SELECT preis FROM artikel WHERE name LIKE ?");
		$sth->execute (array($_POST['lederartikel']));
		$artikelpreis = $sth->fetchAll(PDO::FETCH_OBJ);
		
		foreach ($artikelpreis as $preis) {
				$zwischenpreis = $preis->preis;
			}
			
		$preis += $zwischenpreis-1;
		
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
    
	<form method="post">
    <?php if ($_POST['weiter'] == 'weiter zur Lederauswahl' &&
				$_POST['lederartikel'] == '') : ?>
			<ul style="margin:10px 0 0 20px" >
				<li>Bitte w&auml;hlen Sie ein Halsband aus</li>
            </ul>
    <?php endif ?>
				
        <?php foreach ($lederartikel as $art): ?>
        	<tr>
            	<td><a href="images/produktbilder/<?= $art->bild1 ?>.jpg" rel="lightbox"><img src="images/produktbilder/thn/<?= $art->bild1 ?>thn.jpg" alt="Produktbild" title="zum Vergr&ouml;&szlig;ern bitte klicken" class="artikelbilder1" /></a></td>
                <td>
                	<input type="radio" name="lederartikel" value="<?= $art->name ?>" /> <?= $art->name."<br /><br /><p style=\"margin:0 10px\">".$art->beschreibung."</p><br /><p>Grundpreis: ".$art->preis.",- Euro</p>" ?>
                </td>
            </tr>
         <?php $bild++;
        	endforeach ?>
    	<tr style="height:30px">
        	<td colspan="2"><input type="submit" name="weiter" value="weiter zur Lederauswahl" /></td>
		</tr>     
     </form>
</table>
	
	
<?php include "footerartikel.php"; ?>
