<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
	//einfache Galerieseite in der die Bilder mit einer Schleife geladen werden.
    $pagetitle = "Lex Corii";

    include "functions.php";	
	include "header.php";
?>
<link href="style.css" rel="stylesheet" type="text/css" />

    
    <h1>Die Elfenpatrouille</h1>
		
		<div id="inhalt" >
			<ul>
            	<?php for ($i = 1; $i < 17; $i++) : ?>
					
                    <li class="img"><a href="images/patrouille/patrouille<?= $i ?>.jpg" rel="lightbox-patrouille"><img src="images/patrouille/thn/patrouille<?= $i ?>thn.jpg" alt="...Elfen-Patrouille Nr.<?= $i ?>..." /></a></li>
				
                <?php endfor ?>
                <?php for ($i = 1; $i < 5; $i++) : ?>
					
                    <li class="nodisplay"><a href="images/patrouille/patrouille<?= $i ?>.jpg" rel="lightbox-patrouille"><img src="images/patrouille/thn/patrouille<?= $i ?>thn.jpg" alt="...Elfen-Patrouille Nr.<?= $i ?>..." /></a></li>
				
                <?php endfor ?>
			</ul>
		</div>
		
		<div id="galerieseitenzahl">
			<ul>
			<li><a href="patrouille1.php?nr=<? echo $rndnum ?>" id="seitenlink">&lt;&nbsp;</a></li>
			<li><a href="patrouille1.php?nr=<? echo $rndnum ?>" id="seitenlink">&lt;1&gt;</a></li>
			<li><a href="patrouille2.php?nr=<? echo $rndnum ?>" id="seitenlink">2</a></li>
			<li><a href="patrouille2.php?nr=<? echo $rndnum ?>" id="seitenlink">&nbsp;&gt;</a></li>
			</ul>
		</div>


<?php include "footer.php"; ?>