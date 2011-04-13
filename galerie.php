<?php
/*Impressum:
	Multi Media Technology - Bachelor 2009
	
	Basisqualifikationsprojekt 1
	
	Marcus Kauth*/

	//einfacher Tabellenaufbau für die Galerie
    $pagetitle = "Lex Corii";

    include "functions.php";	
	include "header.php";
?>
<link href="style.css" rel="stylesheet" type="text/css" />

    
    <h1>Bildergalerie</h1>
    
<table> 
    <tr>
    	<td><img class="artikelbilder1" src="images/patrouille/thn/patrouille14thn.jpg" alt="...Die Elfenpatrouille..." /></td>
        <td><h3 style="text-decoration:underline">Die Elfenpatrouille</h3>
        	<p class="galerietext">Die heiligen W&auml;lder sind ihre Reiche und ihre Herschaftsgebiete. Ihre Ohren sind die Pflanzen, ihre Augen die Tiere
            zwischen den B&auml;umen. Sei gewarnt Wanderer, wenn Du in sie hineingehst. Die Patrouillen der Elfen schlafen niemals...
            </p>
            <a href="patrouille1.php">&lt; zur Galerie &gt;</a>
      </td>
	</tr>
    <tr>
    	<td><img class="artikelbilder1" src="images/assasine/thn/assasine8thn.jpg" alt="...Die Assasine..." /></td>
        <td><h3 style="text-decoration:underline">Die Assasine</h3>
        	<p class="galerietext">Am Tage h&auml;lt sie sich versteckt und kommt erst nach der D&auml;mmerung heraus. Der Schatten ist Gef&auml;hrte und
            mit dem Hinterhalt bringt sie den Tod. Ich kann nur f&uuml;r Dich hoffen, mein Freund, dass Du nicht der N&auml;chste bist auf ihrer Liste...
            </p>
            <a href="assasine.php">&lt; zur Galerie &gt;</a>
        </td>
	</tr>
    <tr>
    	<td><img class="artikelbilder1" src="images/magier/thn/magier4thn.jpg" alt="...Der Magier..." /></td>
        <td><h3 style="text-decoration:underline">Der Magier</h3>
        	<p class="galerietext">Der Weg des Magiers ist h&auml;ufig von B&uuml;chern ges&auml;umt. Aber nicht alle entscheiden sich f&uuml;r die Studien. Manche 
            widmen sich der Ausbildung, manche dem Schutz - und wieder andere widmen sich dem Kampf! Mit sowohl allem was ihnen die Magie zur Verf&uuml;gung stellt 
            als auch ihre Kampfkunst hergibt...
            </p>
            <a href="magier.php">&lt; zur Galerie &gt;</a>
        </td>
	</tr>
        <tr>
    	<td><img class="artikelbilder1" src="images/kundenbilder/thn/kundenbilder1thn.jpg" alt="...Kundengalerie..." /></td>
        <td><h3 style="text-decoration:underline">Kundengalerie</h3>
        	<p class="galerietext">Wenn Ihr Eure eigenen "Lex Corii" R&uuml;stungen oder Gewandungen pr&auml;sentieren wollt, so schickt einfach eine e-mail an:<br /></p>
        	<p style="text-align:center"><a href="mailto:rhayad@lex-corii.com">rhayad@lex-corii.com</a><br /><br />
        	</p>
            <a href="kundenbilder.php">&lt; zur Galerie &gt;</a>
        </td>
	</tr>
</table>


<?php include "footer.php"; ?>
