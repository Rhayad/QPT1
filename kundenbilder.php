<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

    $pagetitle = "Lex Corii";

    include "functions.php";	
	include "header.php";
?>
<link href="style.css" rel="stylesheet" type="text/css" />

    
    <h1>Kundengalerie</h1>
		
		<div id="inhalt" >
			<ul>
            	<?php for ($i = 1; $i < 4; $i++) : ?>
					
                    <li class="img"><a href="images/kundenbilder/kundenbilder<?= $i ?>.jpg" rel="lightbox-kundenbilder"><img src="images/kundenbilder/thn/kundenbilder<?= $i ?>thn.jpg" alt="...Kundenbilder Nr.<?= $i ?>..." /></a></li>
				
                <?php endfor ?>
			</ul>
		</div>

<?php include "footer.php"; ?>