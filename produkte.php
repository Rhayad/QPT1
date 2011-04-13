<?php

/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

    $pagetitle = "Lex Corii";

    include "functions.php";
    include "header.php";
?>  
    <h1>Produkte</h1>
    <div id="maintext">
        <p>Ich gr&uuml;&szlig;e Euch Wanderin !</p>
        <p>Ich bin hocherfreut, dass Ihr den Weg gefunden habt in meinen bescheidenen Laden. Nun ich bitte Euch, schaut Euch um ob Ihr unter
        meinen bereits fertigen Arbeiten etwas findet, was Eurem Geschmack entspricht.</p>
        <p>Ansonsten habe ich auch hier einige Muster, die ich speziell auf Euch zuschneiden kann. Ihr braucht mir lediglich sagen was Ihr ben&ouml;tigt.
        Schaut her, ich habe bestes, 4mm kr&auml;ftiges Blankleder in verschiedensten Farben aus denen Ihr w&auml;hlen k&ouml;nnt. Ebenso die Beschl&auml;
        oder aber die Verzierungen. Alles k&ouml;nnt Ihr so zusammenstellen wie es Eurem Geschmack und Vorstellungen entspricht.</p>
        
        <?php if (!isset($_SESSION['USER'])): ?>
        	<p style="text-align:center; margin:30px 0 0 0">Um den Shop optimal zu nutzen, logge Dich bitte erst ein:</p>
        	<p style="text-align:center"><a href="register.php">registrieren</a> oder <a href="login.php">einloggen</a></p>
        <?php endif ?>
	</div>
	
<?php
    include "footer.php";
?>
