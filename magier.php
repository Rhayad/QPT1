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

    
    <h1>Der Magier</h1>
		
		<div id="inhalt" >
			<ul>
            	<?php for ($i = 1; $i < 13; $i++) : ?>
					
                    <li class="img"><a href="images/magier/magier<?= $i ?>.jpg" rel="lightbox-magier"><img src="images/magier/thn/magier<?= $i ?>thn.jpg" alt="...Der Magier Nr.<?= $i ?>..." /></a></li>
				
                <?php endfor ?>
			</ul>
		</div>

<?php include "footer.php"; ?>