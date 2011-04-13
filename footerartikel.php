<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/
	
	//Spezielle "Footer - Seite" für die Artikelseiten. Es werden sowohl der Status des aktuellen Artikels ausgegeben, als auch wieviele Artikel sich bereits im Warenkorb befinden
	//Ich habe überlegt, ob ich die bereits im Warenkorb befindlichen Artikel komplett ausgebe, habe aber darauf verzichtet, da die "Div - Box" unter Umständen zu lang werden
	//könnte. 
?>
        
        </div>
        <div id="aktueller_artikel">
        	<h2>Aktueller Artikel</h2>
            
            <?php if ($artikel != '') :?>
                <ul style="list-style:none">
                    <li><span class="aartikel">Artikel:</span><?= ' '.$artikel[1] ?></li>
                    <li><span class="aartikel">1. Lederfarbe:</span><?= ' '.$artikel[2] ?></li>
                    <li><span class="aartikel">2. Lederfarbe:</span><?= ' '.$artikel[3] ?></li>
                    <li><span class="aartikel">Nietenset:</span><?= ' '.$artikel[4] ?></li>
                    <li><span class="aartikel">Nietenart:</span><?= ' '.$artikel[5] ?></li>
                    <li><span class="aartikel">Verzierung:</span><?= ' '.$artikel[6] ?></li>
                </ul>
            <?php endif?>  
         </div>
         <div id="preis">  	         
			<?php if ($preis != 0.0) {
            	echo ('<span style=\'font-style:italic; text-decoration:underline\'>Preis:</span> '.sprintf('%01.2f',$preis).' Euro'); } 
            ?>				
        </div>
        <div id="warenkorb">
    		<h2>Warenkorb</h2>
            
            <?php $artikelanzahl = count($_SESSION['warenkorb']); ?>
			
				<p>Es befinden sich <span style="font-weight:bold"><?= $artikelanzahl ?></span> Artikel im Warenkorb.</p>
            
            <?php if ($artikelanzahl > 0 && $_SESSION['USER'] != '') : ?>
            
            	<p style="margin:10px 0 0 0"><a href="warenkorb.php">zum Warenkorb</a></p>	
            
            <?php endif ?>		
            
    	</div>
	</div>
    
<div id="foot">
	<ul>
    	<li><a href="impressum.php" >Impressum</a></li>
        <li>AGB</li>
        <li>&copy; 2010 Marcus Kauth</li>
	</ul>
</div>
  </div>
</body>
</html>
