<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

    $pagetitle = "Lex Corii";

    include "functions.php";
	
	$pid = $_SESSION['USER'];
	
	if(isset($_POST['lieferadresse']) && 
		isset($_POST['senden'])) {
	
		$_SESSION['lieferadresse'] = $_POST['lieferadresse'];
	
		header("Location:uebersicht.php");
	
	}
	
	 	
		
	$sth = $dbh->prepare("SELECT * FROM lieferadressen WHERE username = ?");
	$sth->execute(array($pid));
	$adressen = $sth->fetchAll(PDO::FETCH_OBJ);
			  		
	include "header.php";
	
?>
    
    <h1>Lieferadresse</h1>
    
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
            		<input type="checkbox" name="lieferadresse" value="<?= $key->lid ?>" style="margin:0 5px 20px 5px" /><input type="submit" name="senden" value="diese Adresse verwenden" />
                </td>
            </tr>    
        <?php endforeach ?>
        
        <tr style="height:auto">
            	<td colspan="2" style="border:none">
            		<h3><a href="lieferadressen.php">neue Lieferadresse angeben</a></h3>
                </td>
            </tr> 
    </table>
  
	</form>

	
<?php include "footer.php"; ?>
