<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
    $pagetitle = "Lex Corii";

    include "functions.php";	
	include "header.php";
	
	//Einfach Galerieausgabe
?>
    <h1>Die Assaasine</h1>
		
		<div id="inhalt" >
			<ul>
            	<?php for ($i = 1; $i < 17; $i++) : ?>
					
                    <li class="img"><a href="images/assasine/assasine<?= $i ?>.jpg" rel="lightbox-assasine"><img src="images/assasine/thn/assasine<?= $i ?>thn.jpg" alt="...Die Assasine Nr.<?= $i ?>..." /></a></li>
				
                <?php endfor ?>
			</ul>
		</div>

<?php include "footer.php"; ?>