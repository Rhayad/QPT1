<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
	//einfache Datei für Skizzen
	$pagetitle = "Lex Corii";
	include "functions.php";
 	include "header.php";
	
?>

<h1>Logo-Designs</h1>

<div id="inhalt" >
    <ul>
        <?php for ($i = 1; $i < 6; $i++) : ?>
            
            <li class="img"><a href="images/design/design<?= $i ?>.jpg" rel="lightbox-design"><img src="images/design/thn/design<?= $i ?>thn.jpg" alt="...Logo Design Nr.<?= $i ?>..." /></a></li>
        
        <?php endfor ?>
    </ul>
</div>


    
<?php include "footer.php"; ?>